<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
        <script src="selections.js"></script>
        <link href="selections.css" rel="stylesheet" type="text/css"> 
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
    </head> 

    <body>
    <nav class="navegador_general" id="navbar">
            <header class="header" id="header">
                <div class="wrapper">
                    <img id="logoheader"src="../../images/logo.png">
                    <div class="logo"><?php require '../../header/header.php';?></div>
                    <nav>
                        <?php 
                            if(isset($_SESSION['user_id'])){
                                echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                                if($_SESSION['rol_id'] == 1){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else if($_SESSION['rol_id'] == 2){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/administrarMundialito.php'>Gestionar mundialito</a><br><br><a href='main/special_users/administrador.php'>Gestionar noticias</a><br><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else{
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                                }
                            }
                            else{
                                echo("<a href='account/login.php'>Iniciar sesion</a>");
                            } 
                        ?>
                    </nav>
                </div>
        
                <div class="wrapper_nav">
                    <div class="first_element">
                        <img src="../../images/perfil.png" alt="Perfil" class="responsive" onclick="perfil()">
                        <span class="text">Perfil</span>
                    </div>

                    <div class="element">
                        <?php 
                            if(isset($_SESSION['user_id'])){ 
                        ?>
                        <img src="../../images/fixture_violeta.png" alt="Fixture" onclick="mundialito()" class="responsive">
                        <?php
                            }else{
                        ?>
                        <img src="../../images/fixture_violeta.png" alt="Fixture" onclick="notlogged()" class="responsive">
                        <?php
                            }
                        ?>
                        <span class="text">Mundialito</span>
                    </div> 
                
                    <div class="element">
                        <img src="../../images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
                        <span class="text">Calendario</span>
                    </div>

                    <div class="element">
                        <img src="../../images/qatar_rosa.png" alt="Qatar" onclick="SobreQatar()" class="responsive">
                        <span class="text">Sobre Qatar</span>
                    </div>

                    <div class="element">
                        <img src="../../images/teams.jpg" alt="Selecciones" onclick="selections()" class="responsive">
                
                        <span class="text">Equipos</span>
                    </div>

                    <div class="element">
                        <img src="../../images/selecciones.png" alt="Comunidad" class="responsive">
                        <span class="text">Comunidad</span>
                    </div>
                </div>
            </header>
        </nav>
        
        <div class="wrapper2">
            <div class="grupo" id='top'>
                <h1 class="title">Grupo A</h1>
                <hr>
                <div class="content">
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/qatar.jpg"><a class="pais" href="../../teams/qatar.php">Qatar</a></div>
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/ecuador.jpg"><a class="pais" href="../../teams/ecuador.php">Ecuador</a></div>
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/senegal.jpg"><a class="pais" href="../../teams/senegal.php">Senegal</a></div>
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/holanda.jpg"><a class="pais" href="../../teams/holanda.php">Holanda</a></div>
                </div>
            </div>

            <div class="grupo" id='top'>
                <h1 class="title">Grupo B</h1>
                <hr>
                <div class="content">
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/inglaterra.jpg"><a class="pais" href="../../teams/inglaterra.php">Inglaterra</a></div>
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/iran.jpg"><a class="pais" href="../../teams/iran.php">Iran</a></div>
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/eeuu.jpg"><a class="pais" href="../../teams/eeuu.php">Estados Unidos</a></div>
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/gales.jpg"><a class="pais" href="../../teams/gales.php">Gales</a></div>
                </div>
            </div> 

            <div class="grupo" id='top'>
                <h1 class="title">Grupo C</h1>
                <hr>
                <div class="content">
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/argentina.jpg"><a class="pais" href="../../teams/argentina.php">Argentina</a></div>  
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/arabia.jpg"><a class="pais" href="../../teams/arabia.php">Arabia Saudita</a></div>
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/mexico.jpg"><a class="pais" href="../../teams/mexico.php">Mexico</a></div>
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/polonia.jpg"><a class="pais" href="../../teams/polonia.php">Polonia</a></div>
                </div>
            </div>   

            <div class="grupo" id='top'>
                <h1 class="title">Grupo D</h1>
                <hr>
                <div class="content">
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/francia.jpg"><a class="pais" href="../../teams/francia.php">Francia</a></div>   
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/australia.jpg"><a class="pais" href="../../teams/australia.php">Australia</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/dinamarca.jpg"><a class="pais" href="../../teams/dinamarca.php">Dinamarca</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/tunez.jpg"><a class="pais" href="../../teams/tunez.php">Tunez</a></div> 
                </div>
            </div>

            <div class="grupo" id='bottom'>
                <h1 class="title">Grupo E</h1>
                <hr>
                <div class="content">
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/españa.jpg"><a class="pais" href="../../teams/españa.php">España</a></div>   
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/costa_rica.jpg"><a class="pais" href="../../teams/costa rica.php">Costa Rica</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/alemania.jpg"><a class="pais" href="../../teams/alemania.php">Alemania</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/japon.jpg"><a class="pais" href="../../teams/japon.php">Japon</a></div> 
                </div>
            </div>

            <div class="grupo"id='bottom'>
                <h1 class="title">Grupo F</h1>
                <hr>
                <div class="content">
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/belgica.jpg"><a class="pais" href="../../teams/belgica.php">Belgica</a></div>   
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/canada.jpg"><a class="pais" href="../../teams/canada.php">Canada</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/marruecos.jpg"><a class="pais" href="../../teams/marruecos.php">Marruecos</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/croacia.jpg"><a class="pais" href="../../teams/croacia.php">Croacia</a></div> 
                </div>
            </div>

            <div class="grupo"id='bottom'>
                <h1 class="title">Grupo G</h1>
                <hr>
                <div class="content">
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/brasil.jpg"><a class="pais" href="../../teams/brasil.php">Brasil</a></div>   
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/serbia.jpg"><a class="pais" href="../../teams/serbia.php">Serbia</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/suiza.jpg"><a class="pais" href="../../teams/suiza.php">Suiza</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/camerun.jpg"><a class="pais" href="../../teams/camerun.php">Camerun</a></div> 
                </div>
            </div>

            <div class="grupo"id='bottom'>
                <h1 class="title">Grupo H</h1>
                <hr>
                <div class="content">
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/portugal.jpg"><a class="pais" href="../../teams/portugal.php">Portugal</a></div>   
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/ghana.jpg"><a class="pais" href="../../teams/ghana.php">Ghana</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/uruguay.jpg"><a class="pais" href="../../teams/uruguay.php">Uruguay</a></div> 
                    <div class="wrap"><img class="imagen_bandera" src="../../images/flags/korea.jpg"><a class="pais" href="../../teams/corea.php">Corea del Sur</a></div> 
                </div>
            </div>
        </div>
    </body>
</html>