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
        $content1=$_POST['content1'];
        $content2=$_POST['content2'];
        $content3=$_POST['content3'];
        $content4=$_POST['content4'];
        $content5=$_POST['content5'];

        $stmt=$conn->prepare("INSERT INTO preguntas_mundialito(pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, title, deadline) VALUES (:ucont1, :ucont2, :ucont3, :ucont4, :ucont5, :utitl, '$fecha')");
        $stmt->bindParam(':ucont1', $content1);
        $stmt->bindParam(':ucont2', $content2);
        $stmt->bindParam(':ucont3', $content3);
        $stmt->bindParam(':ucont4', $content4);
        $stmt->bindParam(':ucont5', $content5);
        $stmt->bindParam(':utitl', $title);

		if($stmt->execute()){
?>
			<script>
				alert("Encuesta cargada exitosamente");
				window.location.href=('../../index.php');
			</script>

			<?php
		}
		else{
			?>
			<script>
				alert("Error en la carga de la encuesta");
				window.location.href=('../../index.php');
			</script>

			<?php
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

        <div class="margin"></div>

        <nav class="navegador_general" id="navbar">
            <h1 class="text_nav">Mundial de Qatar 2022</h1>

            <div class="wrapper_nav">
                <div class="first_element">
                    <img src="../../images/fixture_violeta.png" alt="Perfil" class="responsive">
                    <span class="text">Perfil</span>
                </div>

                <div class="element">
                    <img src="../../images/fixture_violeta.png" alt="Fixture" class="responsive">
                    <span class="text">Fixture</span>
                </div> 
            
                <div class="element">
                    <img src="../../images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
                    <span class="text">Calendario</span>
                </div>

                <div class="element">
                    <img src="../../images/qatar_rosa.png" alt="Qatar" class="responsive">
                    <span class="text">Sobre Qatar</span>
                </div>

                <div class="element">
                    <img src="../../images/selecciones.png" alt="Selecciones" onclick="selections()" class="responsive">
                    <span class="text">Equipos</span>
                </div>

                <div class="element">
                    <img src="../../images/fixture_violeta.png" alt="Comunidad" class="responsive">
                    <span class="text">Comunidad</span>
                </div>
            </div>
        </nav>
 
        <div class="margin2"></div>

		<div class="container">
            <p class="title">Crear encuesta</p>
            <form method="post" class="upload" autocomplete="off">
                <div class="titulo">
                    <label class="label">Titulo (max. 50 caracteres)</label>
                    <input type="text" name="title" class="form-control" maxlength=50 required>
                </div>
                <div class="content">
                    <label class="label">Primera pregunta (obligatoria)</label>
                    <input type="text" id="content1" name="content1" class="form-control-content" required></input>
                    <select class="select">
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content">
                    <label class="label">Segunda pregunta<i id="add2" class="navicon fas fa-solid fa-plus" onclick="enable2()"></i></label>
                    <input type="text" id="content2" name="content2" class="form-control-content" disabled required></input>
                    <select id="select2" class="select" disabled>
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content">
                    <label class="label">Tercera pregunta<i id="add3" class="navicon fas fa-solid fa-plus" onclick="enable3()"></i></label>
                    <input type="text" id="content3" name="content3" class="form-control-content" disabled required></input>
                    <select id="select3" class="select" disabled>
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content">
                    <label class="label">Cuarta pregunta<i id="add4" class="navicon fas fa-solid fa-plus" onclick="enable4()"></i></label>
                    <input type="text" id="content4" name="content4" class="form-control-content" disabled required></input>
                    <select id="select4" class="select" disabled>
                        <option value="paises">Paises</option>
                        <option value="jugadores">Jugadores</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="content">
                    <label class="label">Quinta pregunta<i id="add5" class="navicon fas fa-solid fa-plus" onclick="enable5()"></i></label>
                    <input type="text" id="content5" name="content5" class="form-control-content" disabled required></input>
                    <select id="select5" class="select" disabled>
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
    document.getElementById("add2").addEventListener("click", () => {
        document.getElementById("content2").focus();
        document.getElementById("select2").disabled = false;
    });

    document.getElementById("add3").addEventListener("click", () => {
        document.getElementById("content3").focus();
        document.getElementById("select3").disabled = false;
    });

    document.getElementById("add4").addEventListener("click", () => {
        document.getElementById("content4").focus();
        document.getElementById("select4").disabled = false;
    });

    document.getElementById("add5").addEventListener("click", () => {
        document.getElementById("content5").focus();
        document.getElementById("select5").disabled = false;
    });

    function enable2(){
        if(document.getElementById("content2").disabled == false){
            document.getElementById("content2").disabled = true;
            document.getElementById("content2").value = "";
            document.getElementById("content2").style.backgroundColor = 'gray';
            document.getElementById("select2").disabled = true;
        }
        else if(document.getElementById("content2").disabled == true){
            document.getElementById("content2").disabled = false;
            document.getElementById("content2").style.backgroundColor = 'rgba(128, 124, 124, 0.432)';
            document.getElementById("select2").disabled = false;
        }
    }

    function enable3(){
        if(document.getElementById("content3").disabled == false){
            document.getElementById("content3").disabled = true;
            document.getElementById("content3").value = "";
            document.getElementById("content3").style.backgroundColor = 'gray';
        }
        else if(document.getElementById("content3").disabled == true){
            document.getElementById("content3").disabled = false;
            document.getElementById("content3").style.backgroundColor = 'rgba(128, 124, 124, 0.432)';
            document.getElementById("select3").disabled = true;
        }
    }

    function enable4(){
        if(document.getElementById("content4").disabled == false){
            document.getElementById("content4").disabled = true;
            document.getElementById("content4").value = "";
            document.getElementById("content4").style.backgroundColor = 'gray';
        }
        else if(document.getElementById("content4").disabled == true){
            document.getElementById("content4").disabled = false;
            document.getElementById("content4").style.backgroundColor = 'rgba(128, 124, 124, 0.432)';
            document.getElementById("select4").disabled = true;
        }
    }

    function enable5(){
        if(document.getElementById("content5").disabled == false){
            document.getElementById("content5").disabled = true;
            document.getElementById("content5").value = "";
            document.getElementById("content5").style.backgroundColor = 'gray';
        }
        else if(document.getElementById("content5").disabled == true){
            document.getElementById("content5").disabled = false;
            document.getElementById("content5").style.backgroundColor = 'rgba(128, 124, 124, 0.432)';
            document.getElementById("select5").disabled = true;
        }
    }
</script>