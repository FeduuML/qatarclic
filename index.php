<?php
    session_start();
    require 'account/database.php';

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
        <link href="styles/main.css" rel="stylesheet" type="text/css">
        <link href="styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>
   
    <body>
        <div id="wrapper">
            <header class="header" id="header">
                <div class="wrapper">
                    <div class="logo"><?php require 'header/header.php';?></div>
                    <nav>
                        <?php 
                        if(isset($_SESSION['user_id'])){
                            echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                            if($_SESSION['rol_id'] == 1){
                                echo("<div id='user_options' style='height:80%;' class='user_options'><h1>$username</h1><hr><br><a href='main/moderador.php'>Gestionar usuarios</a><br><br><a href='account/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                            }
                            else{
                                echo("<div id='user_options' style='height:60%;' class='user_options'><h1>$username</h1><hr><br><a href='account/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                            }
                        }
                        else{
                            echo("<a href='account/login.php'>Iniciar sesion</a>");
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
     
        <content>
            <aside>
                <h2 class="title">Seleccion</h2>
                <p>Hola</p>
            </aside>

            <section class="news">
                <h2 class="title">Noticias</h2>
                <hr>
                <div class="news_image_box">
                    <img class="news_image" src="images/fixture.jpg">
                </div>
                <hr>
                 
                <div class="text_news">
                    <p>¿Cuales seran los equipos que pasaran a la siguiente ronda?</p>
                </div>
            </section>
        </content>
        <script src="js/scroll.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>

<?php
require 'account/database.php';
$desde = @$_GET['pag'] * 20;
            $hasta = (@$_GET['pag'] * 20) + 20;
            $news = $conn->prepare("SELECT id,title,content, image FROM news LIMIT $desde,$hasta");
            $news->execute();

        while($news1 = $news->fetch(PDO::FETCH_ASSOC)):
            echo '<h1>'.$news1['title'].'</h1>';
            echo '<h2>'.$news1['content'].'</h2>';
            echo '<img src="data:image/jpg;base64,'.base64_encode($news1['image']).'"/>';
        endwhile;
?>

<script>
    function calendario(){
        window.location.href="main/calendario.php";
    }
</script>