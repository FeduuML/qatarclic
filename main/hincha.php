<?php
    session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="../styles/main.css" rel="stylesheet" type="text/css">
        <link href="../styles/header.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>
    
    <body>
        <header>
            <div class="wrapper">
                <div class="logo"><?php require '../header/header.php';?></div>
                <nav>
                    <?php 
                    if(isset($_SESSION['user_id'])){
                        echo("<i class='navicon fas fa-solid fa-user fa-2x'></i>");
                    }
                    else{
                        echo("<a href='../'>Salir del modo invitado</a>");
                    } ?>
                </nav>
            </div>

            <nav class="navegacion">
                <ul class="menu">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Comunidad</a></li>
                    <li><a href="#">Fixture</a></li>
                    <li><a href="calendario.php">Calendario</a></li>
                    <li><a href="#">Selecciones</a></li>
                    <li><a href="#">Sobre Qatar</a></li>
                    <li><a href="#">Mundial</a></li>
                    <?php
                    if(isset($_SESSION['user_id'])){
                        if($_SESSION['rol_id'] == 1){
                            echo('<li><a href="moderador.php">Panel de control</a></li>');
                        }
                        else if($_SESSION['rol_id'] == 2){
                            echo('<li><a href="administrador.php">Panel de noticias</a></li>');
                        }
                        echo('<li><a href="../account/logout.php">Cerrar sesion</a></li>');
                    } ?>
                </ul> 
            </nav>
        </header>
    </body>
</html>