<?php
    session_start();
    require 'account/database.php';

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = $conn->prepare("CALL sp_user(?)");
        $sql->bindParam(1, $user_id, PDO::PARAM_INT);
        $sql->execute();
        $results = $sql -> fetch(PDO::FETCH_ASSOC);
        $username = $results['username'];
        $sql->closeCursor();

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
        <link href="styles/main.css" rel="stylesheet" type="text/css">
        <link href="styles/header.css" rel="stylesheet" type="text/css">
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
                    <img id="logoheader"src="images/logo.png">
                    <div class="logo"><?php require 'header/header.php';?></div>
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
                            <img src="images/perfil.png" alt="Perfil" class="responsive" onclick="perfil()">
                        <?php
                            }else{
                        ?>
                            <img src="images/perfil.png" alt="Perfil" class="responsive" onclick="perfil_notlogged()">
                        <?php
                            }
                        ?>
                        <span class="text">Perfil</span>
                    </div>

                    <div class="element">
                        <?php 
                            if(isset($_SESSION['user_id'])){ 
                        ?>
                        <img src="images/fixture_violeta.png" alt="Fixture" onclick="mundialito()" class="responsive">
                        <?php
                            }else{
                        ?>
                        <img src="images/fixture_violeta.png" alt="Fixture" onclick="mundialito_notlogged()" class="responsive">
                        <?php
                            }
                        ?>
                        <span class="text">Mundialito</span>
                    </div> 
                
                    <div class="element">
                        <img src="images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
                        <span class="text">Calendario</span>
                    </div>

                    <div class="element">
                        <img src="images/qatar_rosa.png" alt="Qatar" onclick="SobreQatar()" class="responsive">
                        <span class="text">Sobre Qatar</span>
                    </div>

                    <div class="element">
                        <img src="images/teams.jpg" alt="Selecciones" onclick="selections()" class="responsive">
                
                        <span class="text">Equipos</span>
                    </div>

                    <div class="element">
                        <?php 
                            if(isset($_SESSION['user_id'])){ 
                        ?>
                        <img src="images/selecciones.png" alt="Comunidad" onclick="community()" class="responsive">
                        <?php
                            }else{
                        ?>
                        <img src="images/selecciones.png" alt="Comunidad" onclick="community_notlogged()" class="responsive">
                        <?php
                            }
                        ?>
                        <span class="text">Comunidad</span>
                    </div> 
                </div>
            </header>
        </nav>
        
        <div class="margin2"></div>

        <div class="big_container">
            <div class="news">
                <h2 class="title">Noticias</h2>
                <hr>
                <?php 
			        $stmt=$conn->prepare('SELECT * FROM `news` ORDER BY id DESC LIMIT 1');
				    $stmt->execute();
				    if($stmt->rowCount()>0)
				    {
                        $sql=$conn->prepare('SELECT * FROM `news`');
                        $sql->execute();
                        $count = $sql->rowCount();

					    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					    {
						    extract($row);
                            $id = $row['id'];
				?>
			    <div id="new_container" class="new_container">
                    <p><?php echo '<h1 class="new_title">'.$title.'</h1>'?></p>			
                    <p><?php echo '<h4 class="new_userdata">Subido por '.$row['user'].' el '.$row['datetime'].'</h4>' ?></p>
                    <div class="new_image_container"><?php echo '<center><img class="new_image" src="uploads/'.$row['image'].'"></center>'?></div>
                    <p><?php echo '<h3 class="new_content">'.$content.'</h3>' ?></p>	
                    <div class="new_btn_container">
                        <center>
                            <button onclick="previous(<?php echo($id); ?>)" id="previous" class="previous" disabled>Anterior</button>
                            <button onclick="next(<?php echo($id); ?>)" id="next" class="next">Siguiente</button>
                        </center>
                    </div>
			    </div>
			    <?php 
				        }
			        }
			    ?>
            </div>

            <div class="small_container">
                <div class="container1">
                    <?php
                        if(!isset($user_id)){
                    ?>
                        <span class="warning">Debes iniciar sesión para suscribirte a selecciones</span>
                    <?php
                        }
                        else{
                            if(!isset($seleccion)){
                    ?>
                        <span class="warning">Aun no te has suscrito a ninguna seleccion</span>
                    <?php
                            }else{
                                $stmt = $conn->prepare("SELECT t.nombre AS rival, t.imagen, p.grupo, p.fecha, p.hora, p.estadio FROM seleccion s INNER JOIN partidos_grupos p ON s.seleccion_id = p.pais INNER JOIN teams t ON p.rival = t.id WHERE s.user_id = $user_id AND p.fecha > NOW() LIMIT 1");
                                if($stmt->execute()){
                                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                        extract($row);
                    ?>
                        <?php echo '<center><h1 class="seleccion_title">'.$seleccion_nombre.'</h1></center>'?>
                        <?php echo '<center><p class="seleccion_group">Grupo '.$grupo.'</p></center>'?>
                        <?php echo '<div class="wrap">'?>
                            <?php echo '<center><p class="seleccion_match">Proximo partido: '.$fecha.' a las '.$hora.' en el Estadio '.$estadio.'</p></center>'?>
                            <?php echo '<div class="wrap2">'?>
                                <?php echo '<center><img class="flag" src="images/flags/'.$seleccion_imagen.'"></center>'?>
                                <?php echo '<center><h3 class="seleccion_nombre">'.$seleccion_nombre.'</h3></center>'?>
                            <?php echo '</div>'?>
                            <?php echo '<div class="wrap2">'?>
                                <?php echo '<center><img class="flag" src="images/flags/'.$imagen.'"></center>'?>
                                <?php echo '<center><h3 class="seleccion_nombre">'.$rival.'</h3></center>'?>
                            <?php echo '</div>'?>
                        <?php echo '</div>'?>
                    <?php
                                    }
                                }
                            }
                        }
                    ?>
                </div>

                <div class="container2">
                    <a class="twitter-timeline" href="https://twitter.com/fifaworldcup_es">Tweets by @fifaworldcup_es</a>
                </div>
            </div>
        </div>

        <div class="margin3"></div>
    
        <div class="more_news">
        <div class="margin4"><h1 class="text1">Más informacion sobre...</h1></div>
              <br>
              <div class="element_more_news1">
                <img src="images/campeones.png" alt="Qatar" class="responsive2">
                <a href="https://www.livefutbol.com/ganador/wm/" class=text>Campeones</a>
              </div>
              <div class="element_more_news2">
                <img src="images/campeon_de_america.png" alt="Qatar" class="responsive2">
                <a href="https://www.espn.com.ar/futbol/copa-america/nota/_/id/10617462/seleccion-argentina-lionel-messi-scaloni-di-maria-campeon-copa-america-2021-brasil-maracana" class=text>Campeón de America</a>
              </div>
              <div class="element_more_news2">
                <img src="images/afuera.png" alt="Qatar" class="responsive2">
                <a href="https://www.infobae.com/america/deportes/2022/10/26/que-paises-no-jugaran-el-mundial-de-qatar/" class=text>Afuera de Qatar</a>
              </div>
              <div class="element_more_news3">
                <img src="images/panini.png" alt="Qatar" class="responsive2">
                <a href="https://cnnespanol.cnn.com/2022/10/11/album-virtual-del-mundial-2022-de-panini-como-descargarlo-conseguirlo-y-obtener-sobres-gratuitos-orix/" class=text>Panini</a>
              </div>
              <!--Cajas de abajo -->
              <div class="margin4"><h1 class="text1">Los mejores de Argentina</h1></div>
              <br>
              <div class="element_more_news4">
                <img src="images/kempes.png" alt="Qatar" class="responsive2">
                <a href="https://es.wikipedia.org/wiki/Mario_Alberto_Kempes" class=text>Mario Kempes</a>
              </div>
              <div class="element_more_news4">
                <img src="images/maradona.png" alt="Qatar" class="responsive2">
                <a href="https://es.wikipedia.org/wiki/Diego_Maradona" class=text>Diego Armando Maradona</span>
              </div>
              <div class="element_more_news4">
                <img onclick="messi()" src="images/messi.png" alt="Qatar" class="responsive2">
                <a href="https://es.wikipedia.org/wiki/Lionel_Messi" class=text>Lionel Messi</a>
              </div>
        </div>

        <script src="js/scroll.js"></script>
        <script src="js/index.js"></script>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </body>
</html>

<script>
    function perfil(){
        window.location.href = "main/profiles/profiles.php";
    }

    function perfil_notlogged(){
        window.location.href="account/login.php?id=1";
    }

    function calendario(){
        window.location.href="main/calendario/calendario.php";
    }

    function SobreQatar(){
        window.location.href="main/sobreqatar/sobreqatar.php";
    }

    function selections(){
        window.location.href="main/grupos/selections.php";
    }

    function mundialito(){
        window.location.href="main/mundialito/mundialito.php";
    }

    function mundialito_notlogged(){
        window.location.href="account/login.php?id=2";
    }

    function community(){
        window.location.href="main/community/community.php";
    }
    
    function community_notlogged(){
        window.location.href="account/login.php?id=3";
    }

    function messi(){
        window.location.href="news/Messi.php";
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