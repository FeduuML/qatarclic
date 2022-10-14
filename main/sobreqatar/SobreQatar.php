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
        <link href="SobreQatar.css" rel="stylesheet" type="text/css">
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../../header.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="margin"></div>

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
                        <?php
                            if(isset($_SESSION['user_id'])){
                        ?>
                            <img src="../../images/perfil.png" alt="Perfil" class="responsive" onclick="perfil()">
                        <?php
                            }else{
                        ?>
                            <img src="../../images/perfil.png" alt="Perfil" class="responsive" onclick="notlogged()">
                        <?php
                            }
                        ?>
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
                        <img src="../../images/selecciones.png" alt="Comunidad" onclick="community()" class="responsive">
                        <span class="text">Comunidad</span>
                    </div>
                </div>
            </header>
        </nav>
        <div class="margin2"></div>
                        </body>
    
        <script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>

    <body>
        <section>
            <div class="box" id="box1">
                <h1>INFO</h1>
            </div>
        
            <div class="box" id="box2" onclick="estadio()" class="responsive">
                <h1>ESTADIOS</h1>
            </div>
        
            <div class="box" id="box3" >
                <a href="https://www.fifa.com/es" target="blank">
                <h1>FIFA</h1> </a>
            </div>

            <div class="box" id="box4">
                <h1>VOLVER</h1>
            </div>

        </section>
    </body>
</html>
<script src="../../js/scroll.js"></script>
<script src="../../js/index.js"></script>
<script>
    function SobreQatar(){
        window.location.href="SobreQatar.php";
    }

    function calendario(){
        window.location.href="../calendario/calendario.php";
    }
    
    function selections(){
        window.location.href="../grupos/selections.php";
    }

    function estadio(){
        window.location.href="estadios/estadios.php";
    }

    function perfil(){
        window.location.href="estadios/estadios.php";
    }

    function mundialito(){
        window.location.href="../mundialito/mundialito.php";
    }

    function community(){
        window.location.href="../community/community.php";
    }

    function notlogged(){
        window.location.href="../../account/login.php";
    }
</script>