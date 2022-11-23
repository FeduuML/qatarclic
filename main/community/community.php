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
        $email = $results['email'];
    }
?> 

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <link href="community.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
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
                                echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user'></i></div>");

                                if($_SESSION['rol_id'] == 1){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else if($_SESSION['rol_id'] == 2){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../special_users/administrarMundialito.php'>Gestionar mundialito</a><br><br><a href='../special_users/administrador.php'>Gestionar noticias</a><br><br><a href='../special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else{
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                                }
                            }
                            else{
                                echo("<a href='../../account/login.php'>Iniciar sesion</a>");
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

        <?php
            $stmt=$conn->prepare("SELECT p.user_id, p.datetime, p.content, u.username FROM posts p INNER JOIN users u ON p.user_id = u.id");

            if($stmt->execute()){
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $username = $row['username'];
                    $id = $row['user_id'];

                    if($id == $_SESSION['user_id']){
                        echo '<div style="float:right; background-color: rgb(185, 240, 185); border-top-right-radius: 0px; border-top-left-radius: 12px; border-bottom-left-radius: 12px; border-bottom-right-radius: 0px;" class="container">';
                        echo '<span class="datetime">'.$row['datetime'].'</span>';
    
                        $sql = $conn->prepare("SELECT id FROM users WHERE username = '$username'");
                        $sql->execute();
                        $result = $sql->fetch(PDO::FETCH_ASSOC);
            
                        echo '<a class="username" href="../profiles/profiles.php?id='.$result['id'].'">'.$username.'</a>';
                        echo '<p class="content"><br><br>'.$row['content'].'</p>';
                        echo '<i class="trash fa fa-trash" aria-hidden="true" onclick="remove()"></i>';
                        echo '</div>';
                    }
                    else{
                        echo '<div style="float:left" class="container">';
                        echo '<span class="datetime">'.$row['datetime'].'</span>';
    
                        $sql = $conn->prepare("SELECT id FROM users WHERE username = '$username'");
                        $sql->execute();
                        $result = $sql->fetch(PDO::FETCH_ASSOC);
            
                        echo '<a class="username" href="../profiles/profiles.php?id='.$result['id'].'">'.$username.'</a>';
                        echo '<p class="content"><br><br>'.$row['content'].'</p>';
                        if($_SESSION['rol_id'] == 1 || $_SESSION['rol_id'] == 2){
                            echo '<i class="trash fa fa-trash" aria-hidden="true" onclick="remove()"></i>';
                            echo '</div>';
                        }
                    }
                }
            }
        ?>

        <script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
    </body>
</html>
<script>
    function calendario(){
        window.location.href="../../main/calendario/calendario.php";
    }

    function selections(){
        window.location.href="../grupos/selections.php";
    }

    function SobreQatar(){
        window.location.href="../sobreqatar/sobreqatar.php"
    }

    function perfil(){
        window.location.href="../../main/profiles/profiles.php";
    }

    function community(){
        window.location.href="../../main/community/community.php";
    }

    function mundialito(){
        window.location.href="../../main/mundialito/mundialito.php";
    }
</script>