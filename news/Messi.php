<?php
    session_start();
    require '../account/database.php';

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);
        $username = $results['username'];

        $stmt = $conn->prepare("SELECT * FROM `seleccion` s INNER JOIN teams t ON t.id = seleccion_id WHERE s.user_id = $user_id");
        if($stmt->execute()){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(is_countable($row)){
                $seleccion = $row['seleccion_id'];
                $seleccion_nombre = $row['nombre'];
                $seleccion_imagen = $row['imagen'];
            }
        }

        $stmt = $conn->prepare("SELECT min(id) AS min FROM news");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $last = $row['min'];

        $stmt = $conn->prepare("SELECT max(id) AS max FROM news");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $first = $row['max'];
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="news.css" rel="stylesheet" type="text/css">
        <link href="../styles/main.css" rel="stylesheet" type="text/css">
        <link href="../styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    </head>
   
    <body>
        <div class="margin"></div>

        <nav class="navegador_general" id="navbar">
            <header class="header" id="header">
                <div class="wrapper">
                    <img id="logoheader"src="../images/logo.png">
                    <div class="logo"><?php require '../header/header.php';?></div>
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
                                echo("<a href='../account/login.php'>Iniciar sesion</a>");
                            } 
                        ?>
                    </nav>
                </div>
        

                <div class="wrapper_nav">
                    <div class="first_element">
                        <?php
                            if(isset($_SESSION['user_id'])){
                        ?>
                            <img src="../images/perfil.png" alt="Perfil" class="responsive" onclick="perfil()">
                        <?php
                            }else{
                        ?>
                            <img src="../images/perfil.png" alt="Perfil" class="responsive" onclick="notlogged()">
                        <?php
                            }
                        ?>
                        <span class="text">Perfil</span>
                    </div>

                    <div class="element">
                        <?php 
                            if(isset($_SESSION['user_id'])){ 
                        ?>
                        <img src="../images/fixture_violeta.png" alt="Fixture" onclick="mundialito()" class="responsive">
                        <?php
                            }else{
                        ?>
                        <img src="../images/fixture_violeta.png" alt="Fixture" onclick="notlogged()" class="responsive">
                        <?php
                            }
                        ?>
                        <span class="text">Mundialito</span>
                    </div> 
                
                    <div class="element">
                        <img src="../images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
                        <span class="text">Calendario</span>
                    </div>

                    <div class="element">
                        <img src="../images/qatar_rosa.png" alt="Qatar" onclick="SobreQatar()" class="responsive">
                        <span class="text">Sobre Qatar</span>
                    </div>

                    <div class="element">
                        <img src="../images/teams.jpg" alt="Selecciones" onclick="selections()" class="responsive">
                
                        <span class="text">Equipos</span>
                    </div>

                    <div class="element">
                        <img src="../images/selecciones.png" alt="Comunidad" onclick="community()" class="responsive">
                        <span class="text">Comunidad</span>
                    </div>


                </div>
            </header>
        </nav>

        <div class="margin2"></div>

        <div class="caja">
            <div class="perfil">
                <div class="grid_image">
                    <img src="../images/messi_perfil.png" alt="Qatar" class="imagen_jugador">
                    <h1 class="image_text">Lionel Messi</h1>
                </div>
                <div class="grid_description">
                    <h2 class="descripcion">Lionel Andrés Messi Cuccittini (Rosario, 24 de junio de 1987), conocido como Leo Messi, es un futbolista argentino que juega como delantero o centrocampista. Jugador histórico del Fútbol Club Barcelona, al que estuvo ligado veinte años, desde 2021 integra el plantel del Paris Saint-Germain de la Ligue 1 de Francia. Es también internacional con la selección de Argentina, equipo del que es capitán.<br>Considerado con frecuencia el mejor jugador del mundo y uno de los mejores de todos los tiempos,9​ es el único futbolista en la historia que ha ganado, entre otras distinciones, siete veces el Balón de Oro, seis premios de la FIFA al mejor jugador del mundo y seis Botas de Oro. En 2020, se convirtió en el primer futbolista y el primer argentino en recibir un premio Laureus, además de ser incluido en el Dream Team del Balón de Oro.</h2>
                </div>
            </div>

            <div class="image">
                <div class="grid_images"><img src="../images/Messi/1.png" class="images_propiedades" alt="Qatar"></div>
                <div class="grid_images"><img src="../images/Messi/2.png" class="images_propiedades" alt="Qatar"></div>
                <div class="grid_images"><img src="../images/Messi/3.png" class="images_propiedades" alt="Qatar"></div>
                <div class="grid_images"><img src="../images/Messi/3.png" class="images_propiedades" alt="Qatar"></div>
            </div>
        </div>

        <script src="../js/scroll.js"></script>
        <script src="../js/index.js"></script>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </body>
</html>

<script>
    function perfil(){
        window.location.href = "../main/profiles/profiles.php";
    }

    function notlogged(){
        window.location.href="../account/login.php";
    }

    function calendario(){
        window.location.href="../main/calendario/calendario.php";
    }

    function SobreQatar(){
        window.location.href="../main/sobreqatar/sobreqatar.php";
    }

    function selections(){
        window.location.href="../main/grupos/selections.php";
    }

    function mundialito(){
        window.location.href="../main/mundialito/mundialito.php";
    }

    function community(){
        window.location.href="../main/community/community.php";
    }

    <?php
        if(isset($id)){
    ?>
        var id = <?php echo($id); ?>;
    <?php
        }
    ?>

    <?php
        if(isset($last)){
    ?>
        var last = <?php echo($last); ?>;
        if(id == last){
            document.getElementById('next').disabled = true;
        }
    <?php
        }
    ?>

    <?php
        if(isset($first)){
    ?>
        var first = <?php echo($first); ?>;
        if(id == first){
            document.getElementById('previous').disabled = true;
        }
    <?php
        }
    ?>

    function next(id){
        var parametros = {id};

        $.ajax({
		    data:parametros,
		    url:'next.php',
		    type:'GET',
            success:function(data){
                $("#new_container").html(data);
            }
	    });
    }

    function previous(id){
        var parametros = {id};

        $.ajax({
            data:parametros,
            url:'previous.php',
            type:'GET',
            success:function(data){
                $("#new_container").html(data);
            }
        })
    }
</script>