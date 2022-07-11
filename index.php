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

     <div class=fijo>
       <header class="header">
            <div class="wrapper">
                <img class="imagen_logo" src="images/copa.jpg.png">
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
    </div>
        </header>

        <div class ="cajas">
        <article class="caja_derecha">

          <h2 class="tu_seleccion">Tu seleccion:</h2>
             <ul class="lista_seleccion">
               <li>Noticias</li> 
               <li>11 inicial</li>
               <li>Partidos</li>
               <li>Grupo</li> 
             </ul>

        </article>

        <div class="articulo_imagen">
             <img class="caja_izquierda_imagen" src="images/noticias.jpg">
        </div>    

        <article class="caja_izquierda">

          <h2 class="noticias_principal">Noticias</h2>
             <!--<img class="caja_izquierda_imagen" src="images/noticias.jpg">-->
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1><h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
             <h1>hfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
        </article>

        
        </div>
    </body>
</html>