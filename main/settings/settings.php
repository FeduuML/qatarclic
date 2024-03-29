<?php
    session_start();
    require '../../account/database.php';

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);
        
        $username = $results['username'];

        $stmt = $conn->prepare("SELECT * FROM cooldown_username WHERE user_id = $user_id");
        if($stmt->execute()){
            if($stmt->rowCount() > 0){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $time_username = $row['cooldown'];
            }
        }

        $stmt = $conn->prepare("SELECT * FROM cooldown_password WHERE user_id = $user_id");
        if($stmt->execute()){
            if($stmt->rowCount() > 0){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $time_password = $row['cooldown'];
            }
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="settings.css" rel="stylesheet" type="text/css">
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
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
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
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

        <script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>

        <div class="wrap">
            <div class="changename">
                <h1 class="changetitle">Cambiar nombre de usuario</h1>
                <button id="changename" onclick="changename()"><p class="btn">Cambiar</p></button>
                <br><br>
                <span id="changedname">No podrás cambiarlo de nuevo en 48 horas</span>
            </div>

            <div class="changepass">
                <h1 class="changetitle">Cambiar contraseña</h1>
                <button id="changepass" onclick="changepass()"><p class="btn">Cambiar</p></button>
                <br><br>
                <span id="changedpass">No podrás cambiarla de nuevo en 30 minutos</span>
            </div>
        </div>
    </body>
</html>

<script>
    function perfil(){
        window.location.href="../profiles/profiles.php";
    }

    function mundialito(){
        window.location.href="../mundialito/mundialito.php";
    }

    function SobreQatar(){
        window.location.href="../sobreqatar/SobreQatar.php";
    }

    function selections(){
        window.location.href="../grupos/selections.php";
    }

    function calendario(){
        window.location.href="../calendario/calendario.php";
    }

    function community(){
        window.location.href="../community/community.php";
    }

    function changename(){
        window.location.href="changename.php";
    }

    function changepass(){
        window.location.href="changepass.php";
    }
</script>

<?php
    if(isset($time_password)){
        if(((time() - strtotime($time_password)) - 18000) < 1800){
            $cooldown = round((19800 - (time() - strtotime($time_password)))/60);
            echo('<script>document.getElementById("changedpass").innerHTML="Te quedan '.$cooldown.' minutos";</script>');
            echo "<script>var boton = document.getElementById('changepass'); boton.disabled=true;</script>";
            echo "<script>boton.style.backgroundColor = 'gray';</script>";
            echo "<script>boton.style.cursor = 'default';</script>";
            echo "<script>boton.style.pointerEvents = 'none';</script>";
        }
        else{
            echo('<script>document.getElementById("changedpass").innerHTML="No podrás cambiarla de nuevo en 30 minutos";</script>');
            echo "<script>var boton = document.getElementById('changepass'); boton.disabled=false;</script>";
            echo "<script>boton.style.backgroundColor = 'rgb(217, 217, 217)';</script>";
        }
    }

    if(isset($time_username)){
        if(((time() - strtotime($time_username)) - 18000) < 172800){
            $cooldown = round((190800 - (time() - strtotime($time_username)))/3600);
            echo('<script>document.getElementById("changedname").innerHTML="Te quedan '.$cooldown.' horas";</script>');
            echo "<script>var boton = document.getElementById('changename'); boton.disabled=true;</script>";
            echo "<script>boton.style.backgroundColor = 'gray';</script>";
            echo "<script>boton.style.cursor = 'default';</script>";
            echo "<script>boton.style.pointerEvents = 'none';</script>";
        }
        else{
            echo('<script>document.getElementById("changedname").innerHTML="No podrás cambiarla de nuevo en 30 minutos";</script>');
            echo "<script>var boton = document.getElementById('changename'); boton.disabled=false;</script>";
            echo "<script>boton.style.backgroundColor = 'rgb(217, 217, 217)';</script>";
        }
    }

    if(isset($_GET['val'])){
        if($_GET['val']==1){
            echo('<script>document.getElementById("changedpass").innerHTML="La contraseña ha sido cambiada";</script>');
        }
        else if($_GET['val']==2){
            echo('<script>document.getElementById("changedname").innerHTML="El nombre de usuario ha sido cambiado";</script>');
        }
    }
?>