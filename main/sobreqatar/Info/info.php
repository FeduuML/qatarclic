<html>
    <head>
        <title>Qatar clic</title>
        <link href="info.css" rel="stylesheet" type="text/css">
        <link href="../../../styles/header.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        
    </head>
    

    <body>
    <nav class="navegador_general" id="navbar">
            <header class="header" id="header">
                <div class="wrapper">
                    <img id="logoheader"src="../../../images/logo.png">
                    <div class="logo"><?php require '../../../header/header.php';?></div>
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
                        <img src="../../../images/perfil.png" alt="Perfil" class="responsive" onclick="perfil()">
                        <span class="text">Perfil</span>
                    </div>

                    <div class="element">
                        <?php 
                            if(isset($_SESSION['user_id'])){ 
                        ?>
                        <img src="../../../images/fixture_violeta.png" alt="Fixture" onclick="mundialito()" class="responsive">
                        <?php
                            }else{
                        ?>
                        <img src="../../../images/fixture_violeta.png" alt="Fixture" onclick="notlogged()" class="responsive">
                        <?php
                            }
                        ?>
                        <span class="text">Mundialito</span>
                    </div> 
                
                    <div class="element">
                        <img src="../../../images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
                        <span class="text">Calendario</span>
                    </div>

                    <div class="element">
                        <img src="../../../images/qatar_rosa.png" alt="Qatar" onclick="SobreQatar()" class="responsive">
                        <span class="text">Sobre Qatar</span>
                    </div>

                    <div class="element">
                        <img src="../../../images/teams.jpg" alt="Selecciones" onclick="selections()" class="responsive">
                
                        <span class="text">Equipos</span>
                    </div>

                    <div class="element">
                        <img src="../../../images/selecciones.png" alt="Comunidad" class="responsive">
                        <span class="text">Comunidad</span>
                    </div>
                </div>
            </header>
        </nav>
        
       

    </body>

</html>
 