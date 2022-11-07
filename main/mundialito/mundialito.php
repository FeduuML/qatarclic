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
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="mundialito.css" rel="stylesheet" type="text/css">
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
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
                                echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                            }
                            else if($_SESSION['rol_id'] == 2){
                                echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../special_users/administrarMundialito.php'>Gestionar mundialito</a><br><br><a href='main/special_users/administrador.php'>Gestionar noticias</a><br><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                            }
                            else{
                                echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                            }
                        }
                        else{
                            echo("<a href='../../account/login.php'>Iniciar sesion</a>");
                        } ?>
                    </nav>
                </div>
        

                <div class="wrapper_nav">
                    <div class="first_element">
                        <img src="../../images/perfil.png" alt="Perfil" onclick="perfil()" class="responsive">
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

        <div class="big_container" id="blur">
            <div class="mundialito">
                <h1 class="title">Mundialito</h1>
                <hr><br>
                <p class="description">Completa las siguentes encuestas</p>
                <br>
                
                <?php
                    $stmt = $conn->prepare("SELECT * FROM encuestas ORDER BY id");
                    $stmt->execute();
                    $count = $stmt->rowCount();

                    if($count > 0){
                        echo "<div class='quiz_wrapper'>";
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            echo "<div class='quiz'>";
                            echo "<button class='start' id='start(".$id.")' onclick='quiz(".$id.")'><span id='quiz_text(".$id.")' class='quiz_text'>Completar encuesta<br> <br><span class='quiz_title'>$title</span></i></span></button>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        
            <div class="small_container">
                <div class="container1">
                    <p class="warning">Haz clic <a href="answers.php">aqui</a> para ver tus respuestas</p>
                </div>

                <div class="container2">
                    <div class="deadlines">
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM encuestas ORDER BY id");
                        $stmt->execute();
                        $count = $stmt->rowCount();

                        if($count > 0){
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                                echo "<span class='deadline'><br>Fin de la encuesta -<span class='quiz_title'>$title</span>: $deadline</span><br>";
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
    </body>
</html>

<script>
    function calendario(){
        window.location.href="../../main/calendario/calendario.php";
    }

    function SobreQatar(){
        window.location.href="../../main/sobreqatar/sobreqatar.php";
    }

    function selections(){
        window.location.href="../../main/grupos/selections.php";
    }

    function perfil(){
        window.location.href="../../main/profiles/profiles.php";
    }

    function community(){
        window.location.href="../../main/community/community.php";
    }
    
    function quiz(id){
        window.location.href="quiz.php?id=" + id;
    }
</script>

<?php
    $stmt = $conn->prepare("SELECT p.id_encuesta FROM respuestas r JOIN preguntas p ON r.id_pregunta = p.id WHERE id_usuario = $user_id GROUP BY p.id_encuesta");
    $stmt->execute();
    $count = $stmt->rowCount();
    
    if($count>0){
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $encuesta = $row['id_encuesta'];
            echo "<script>var boton = document.getElementById('start(".$encuesta.")'); boton.disabled=true;</script>";
            echo "<script>boton.style.backgroundColor = 'gray';</script>";
            echo "<script>boton.style.cursor = 'default';</script>";
            echo "<script>boton.style.pointerEvents = 'none';</script>";
            echo "<script>document.getElementById('quiz_text(".$encuesta.")').innerHTML = 'Ya has respondido';</script>";
        }
    }
?>