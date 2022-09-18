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
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="mundialito.css" rel="stylesheet" type="text/css">
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

        <div class="big_container">
            <div class="mundialito">
                <h1 class="title">Mundialito</h1>
                <hr><br>
                <p class="description">Completa las siguentes encuestas y compite con otros usuarios para ganar premios</p>
                <br>
                
                <?php
                    $stmt = $conn->prepare("SELECT * FROM encuestas ORDER BY id");
                    $stmt->execute();
                    $count = $stmt->rowCount();

                    if($count > 0){
                        echo "<div class='quiz_wrapper'>";
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            echo "<div class='quiz'>";
                            // echo "<input type text value $idpregunta hidden>";
                            echo "<button class='start' onclick='quiz(".$id.")'>Completar encuesta $title</button>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        
            <div class="small_container">
                <div class="container1">
                    <p class="warning">Haz clic <a href="answers.php">aqui</a> para ver tus respuestas</p>
                </div>

                <div class="container2">
                    <p class="warning">Los resultados estarán disponibles en 12:08:54</p>
                </div>
            </div>
        </div>

        <script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
    </body>
</html>

<script>
    function quiz(id){
        window.location.href="quiz.php?id=" + id;
    }
</script>