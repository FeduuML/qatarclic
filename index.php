<?php
    session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="styles/main.css" rel="stylesheet" type="text/css">
        <link href="styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>
   
    <body>
       <header class="header">
            <div class="wrapper">
                <div class="logo"><?php require 'header/header.php';?></div>
                <nav>
                    <?php 
                    if(isset($_SESSION['user_id'])){
                        echo("<i class='navicon fas fa-solid fa-user fa-2x'></i>");
                    }
                    else{
                        echo("<a href='account/login.php'>Iniciar sesion</a>");
                    } ?>
                </nav>
            </div>
        </header>
        
        <article class="navegador_general">
            <div class="noticias">
                <h1 class="text">Noticias</h1>
            </div>

            <div class="fixture">
                <h1 class="text">Fixture</h1>
            </div> 
            
            <div class="calendario">
                <h1 class="text">Calendario</h1>
            </div>

            <div class="qatar">
                <h1 class="text">Sobre Qatar<h1>
            </div>

            <div class="selecciones">
                <h1 class="text">Selecciones<h1>
            </div>

            <div class="comunidad">
                <h1 class="text">Comunidad<h1>
            </div>
        </article>   
        
        <article class="partidos">
          <h2>Partidos</h2>
        </article>
        
    </body>
</html>