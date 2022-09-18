<?php
	require ('../../account/database.php');
    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);
        
        $username = $results['username'];
    }

    if(isset($_POST['btn-add'])){
        date_default_timezone_set('America/Buenos_Aires');
        $fecha = date('Y-m-d H:i:s', strtotime($_POST['deadline']));
        $title=$_POST['title'];

        $stmt=$conn->prepare("INSERT INTO encuestas(title, deadline) VALUES (:utitl, '$fecha')");
        $stmt->bindParam(':utitl', $title);

        if($stmt->execute()){
            $stmt=$conn->prepare("SELECT * FROM encuestas");
            $stmt->execute();
            $count = $stmt->rowCount();
            
            if($stmt->execute()){
                $i = 0;
                foreach($_POST['content'] AS $content){
                    $result['content'] = $content;
                    if(isset($_POST['select'])){
                        $select = $_POST['select'];
                        $result['select'] = $select[$i];
                        $tipo = $result['select'];
                        $i++;
                        if(!empty($content)){
                            $stmt=$conn->prepare("INSERT INTO preguntas(id_encuesta, pregunta, tipo, respuesta) VALUES ('$count', '$content', '$tipo', NULL)");
                            if($stmt->execute()){
                                echo("<script>alert('Encuesta cargada exitosamente');</script>");
                                echo("<script>window.location.href = '../../index.php'</script>");
                            }
                            else{
                                echo("<script>alert('Ha ocurrido un error');</script>");
                            }
                        }
                    }
                }
            }
        }
    }
?>


<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="administrarMundialito.css" rel="stylesheet" type="text/css">
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>

	<body>
		<header class="header" id="header">
            <div class="wrapper">
                <div class="logo"><?php require '../../header/header.php';?></div>
                <nav>
                    <?php 
                    if(isset($_SESSION['user_id'])){
                        echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                        if($_SESSION['rol_id'] == 1){
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                        else if($_SESSION['rol_id'] == 2){
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/administrador.php'>Gestionar noticias</a><br><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                        else{
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                    }
                    else{
                        echo("<a href='account/login.php'>Iniciar sesion</a>");
                    } ?>
                </nav>
            </div>
        </header>

		<div class="container">
            <p class="title">Crear encuesta</p>
            <form method="post" class="upload" autocomplete="off">
                <div class="titulo">
                    <label class="label">Titulo (max. 50 caracteres)</label>
                    <input type="text" name="title" class="form-control" maxlength=50 required>
                </div>
                <div class="content">
                    <label class="label">Primera pregunta (obligatoria)</label>
                    <input type="text" id="content1" name="content[]" class="form-control-content" required></input>
                    <select class="select" name="select[]">
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content" id="question2">
                    <label class="label">Segunda pregunta<i id="add2" class="navicon fas fa-solid fa-plus" onclick="enable2()"></i></label>
                    <input type="text" id="content2" name="content[]" class="form-control-content" disabled required></input>
                    <select id="select2" class="select" name="select[]" disabled>
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content" id="question3" style="display:none">
                    <label class="label">Tercera pregunta<i id="add3" class="navicon fas fa-solid fa-plus" onclick="enable3()"></i></label>
                    <input type="text" id="content3" name="content[]" class="form-control-content" disabled required></input>
                    <select id="select3" class="select" name="select[]" disabled>
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content" id="question4" style="display:none">
                    <label class="label">Cuarta pregunta<i id="add4" class="navicon fas fa-solid fa-plus" onclick="enable4()"></i></label>
                    <input type="text" id="content4" name="content[]" class="form-control-content" disabled required></input>
                    <select id="select4" class="select" name="select[]" disabled>
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content" id="question5" style="display:none">
                    <label class="label">Quinta pregunta<i id="add5" class="navicon fas fa-solid fa-plus" onclick="enable5()"></i></label>
                    <input type="text" id="content5" name="content[]" class="form-control-content" disabled required></input>
                    <select id="select5" class="select" name="select[]" disabled>
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content">
                    <label class="label">Fecha limite a completar</label>
                    <input type="datetime-local" id="deadline" name="deadline" class="form-control-content" required></input>
                </div>
                <div class="button">
                    <button type="submit" class="btn" name="btn-add"><p class="btn_label">Subir</p></button>	
                </div>			
            </form>
		</div>
		<script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
	</body>
</html>

<script>
    var select2 = document.getElementById("select2");
    var select3 = document.getElementById("select3");
    var select4 = document.getElementById("select4");
    var select5 = document.getElementById("select5");

    var question3 = document.getElementById("question3");
    var question4 = document.getElementById("question4");
    var question5 = document.getElementById("question5");

    var add2 = document.getElementById("add2");
    var add3 = document.getElementById("add3");
    var add4 = document.getElementById("add4");
    var add5 = document.getElementById("add5");

    var content2 = document.getElementById("content2");
    var content3 = document.getElementById("content3");
    var content4 = document.getElementById("content4");
    var content5 = document.getElementById("content5");

    add2.addEventListener("click", () => {
        content2.focus();
        question3.style.display = "block";
    });

    add3.addEventListener("click", () => {
        content3.focus();
        question4.style.display = "block";
    });

    add4.addEventListener("click", () => {
        content4.focus();
        question5.style.display = "block";
    });

    add5.addEventListener("click", () => {
        content5.focus();
    });

    function enable2(){
        if(content2.disabled == false){
            content2.disabled = true;
            content2.value = "";
            content2.style.backgroundColor = 'gray';
            select2.disabled = true;
        }
        else if(content2.disabled == true){
            content2.disabled = false;
            content2.style.backgroundColor = 'rgba(128, 124, 124, 0.432)';
            select2.disabled = false;
        }
    }

    function enable3(){
        if(content3.disabled == false){
            content3.disabled = true;
            content3.value = "";
            content3.style.backgroundColor = 'gray';
            select3.disabled = true;
        }
        else if(content3.disabled == true){
            content3.disabled = false;
            content3.style.backgroundColor = 'rgba(128, 124, 124, 0.432)';
            select3.disabled = false;
        }
    }

    function enable4(){
        if(content4.disabled == false){
            content4.disabled = true;
            content4.value = "";
            content4.style.backgroundColor = 'gray';
            select4.disabled = true;
        }
        else if(content4.disabled == true){
            content4.disabled = false;
            content4.style.backgroundColor = 'rgba(128, 124, 124, 0.432)';
            select4.disabled = false;
        }
    }

    function enable5(){
        if(content5.disabled == false){
            content5.disabled = true;
            content5.value = "";
            content5.style.backgroundColor = 'gray';
            select5.disabled = true;
        }
        else if(content5.disabled == true){
            content5.disabled = false;
            content5.style.backgroundColor = 'rgba(128, 124, 124, 0.432)';
            select5.disabled = false;
        }
    }
</script>