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
        $time_password = $results['cooldown_password'];
        $time_username = $results['cooldown_username'];
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
        <div id="wrapper">
            <header class="header" id="header">
                <div class="wrapper">
                    <div class="logo"><?php require '../../header/header.php';?></div>
                    <nav>
                        <?php 
                        if(isset($_SESSION['user_id'])){
                            echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                            if($_SESSION['rol_id'] == 1){
                                echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                            }
                            else{
                                echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                            }
                        }
                        else{
                            echo("<a href='../../login.php'>Iniciar sesion</a>");
                        } ?>
                    </nav>
                </div>

                <nav class="navegador_general" id="navbar">
                    <div class="perfil">
                        <h1 class="text">Perfil</h1>
                    </div>

                    <div class="fixture">
                        <h1 class="text">Fixture</h1>
                    </div> 
                
                    <div class="calendario">
                    <h1 class="text" id="calendario" onclick="calendario()">Calendario</h1>
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
                </nav>
            </header>
        </div>
        <script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>

        <div class="wrap">
            <div class="changename">
                <h1>Cambiar nombre de usuario</h1>
                <button id="changename" onclick="changename()">Cambiar nombre de usuario</button>
                <br><br>
                <span id="changedname">No podrás cambiarlo de nuevo en 48 horas</span>
            </div>

            <div class="changepass">
                <h1>Cambiar contraseña</h1>
                <button id="changepass" onclick="changepass()">Cambiar contraseña</button>
                <br><br>
                <span id="changedpass">No podrás cambiarla de nuevo en 30 minutos</span>
            </div>
        </div>
    </body>
</html>

<script>
    function calendario(){
        window.location.href="../calendario/calendario.php";
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