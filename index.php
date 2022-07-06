<?php
    session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="styles/main.css" rel="stylesheet" type="text/css">
        <link href="styles/header.css" rel="stylesheet" type="text/css">
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

            <nav class="navegacion">
                <ul class="menu">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Comunidad</a></li>
                    <li><a href="#">Fixture</a></li>
                    <li><a href="main/calendario.php">Calendario</a></li>
                    <li><a href="#">Selecciones</a></li>
                    <li><a href="#">Sobre Qatar</a></li>
                    <li><a href="#">Mundial</a></li>
                    <?php
                    if(isset($_SESSION['user_id'])){
                        if($_SESSION['rol_id'] == 1){
                            echo('<li><a href="main/moderador.php">Panel de control</a></li>');
                        }
                        else if($_SESSION['rol_id'] == 2){
                            echo('<li><a href="main/administrador.php">Panel de noticias</a></li>');
                        }
                        echo('<li><a href="account/logout.php">Cerrar sesion</a></li>');
                    }?>
                </ul> 
            </nav>
        </header>
        
        <div class="contenedor">
            
            <div class="noticias">
                <center><h1>Noticias</h1></center>
                <br>
                <h2>Hola2</h2>  
                <p>En los primeros días del diseño web, las páginas se diseñaban para llenar un tamaño de pantalla en particular. Si el usuario tenía una pantalla más grande o más pequeña que la del diseñador, los resultados esperados iban desde barras de desplazamiento no deseadas hasta longitudes de línea excesivamente largas y un mal uso del espacio. A medida que estuvieron disponibles tamaños de pantalla más diversos, apareció el concepto de diseño web responsivo (RWD, responsive web design), un conjunto de prácticas que permite a las páginas web alterar su diseño y apariencia para adaptarse a diferentes anchos de pantalla, resoluciones, etc. Es una idea que cambió la forma en que diseñamos para una web multidispositivo, y en este artículo te ayudaremos a comprender las principales técnicas que necesitas saber para dominarlo.</p>
                <p>En los primeros días del diseño web, las páginas se diseñaban para llenar un tamaño de pantalla en particular. Si el usuario tenía una pantalla más grande o más pequeña que la del diseñador, los resultados esperados iban desde barras de desplazamiento no deseadas hasta longitudes de línea excesivamente largas y un mal uso del espacio. A medida que estuvieron disponibles tamaños de pantalla más diversos, apareció el concepto de diseño web responsivo (RWD, responsive web design), un conjunto de prácticas que permite a las páginas web alterar su diseño y apariencia para adaptarse a diferentes anchos de pantalla, resoluciones, etc. Es una idea que cambió la forma en que diseñamos para una web multidispositivo, y en este artículo te ayudaremos a comprender las principales técnicas que necesitas saber para dominarlo.</p>
            
            </div>

            <div class="partidos">
                <center><h1>Partidos:</h1></center>
                <br>
                <h2>Hola2</h2>  
                <p>En los primeros días del diseño web, las páginas se diseñaban para llenar un tamaño de pantalla en particular. Si el usuario tenía una pantalla más grande o más pequeña que la del diseñador, los resultados esperados iban desde barras de desplazamiento no deseadas hasta longitudes de línea excesivamente largas y un mal uso del espacio. A medida que estuvieron disponibles tamaños de pantalla más diversos, apareció el concepto de diseño web responsivo (RWD, responsive web design), un conjunto de prácticas que permite a las páginas web alterar su diseño y apariencia para adaptarse a diferentes anchos de pantalla, resoluciones, etc. Es una idea que cambió la forma en que diseñamos para una web multidispositivo, y en este artículo te ayudaremos a comprender las principales técnicas que necesitas saber para dominarlo.</p>
                <p>En los primeros días del diseño web, las páginas se diseñaban para llenar un tamaño de pantalla en particular. Si el usuario tenía una pantalla más grande o más pequeña que la del diseñador, los resultados esperados iban desde barras de desplazamiento no deseadas hasta longitudes de línea excesivamente largas y un mal uso del espacio. A medida que estuvieron disponibles tamaños de pantalla más diversos, apareció el concepto de diseño web responsivo (RWD, responsive web design), un conjunto de prácticas que permite a las páginas web alterar su diseño y apariencia para adaptarse a diferentes anchos de pantalla, resoluciones, etc. Es una idea que cambió la forma en que diseñamos para una web multidispositivo, y en este artículo te ayudaremos a comprender las principales técnicas que necesitas saber para dominarlo.</p>
            </div>

        </div>
            
    </body>
</html>