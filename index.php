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

        $stmt = $conn->prepare("SELECT u.seleccion, t.nombre FROM users u INNER JOIN teams t ON u.seleccion = t.id WHERE u.id = $user_id");
        if($stmt->execute()){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(is_countable($row)){
                $seleccion = $row['seleccion'];
                $seleccion_nombre = $row['nombre'];
            }
        }
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
                        <img src="images/perfil.png" alt="Perfil" class="responsive" onclick="perfil()">
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
                        <img src="images/fixture_violeta.png" alt="Fixture" onclick="notlogged()" class="responsive">
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
                        <img src="images/selecciones.png" alt="Comunidad" class="responsive">
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
                    <div class="new_image_container"><?php echo '<center><img class="new_image" src="uploads/'.$row['image'].'"</center>'?></div>
                    <p><?php echo '<h3 class="new_content">'.$content.'</h3>' ?></p>	
                    <div class="new_btn_container">
                        <center>
                            <button onclick="previous()" id="previous" class="previous" disabled>Anterior</button>
                            <button onclick="next()" id="next" class="next">Siguiente</button>
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
                                $stmt = $conn->prepare("SELECT t.nombre AS rival, p.grupo, p.fecha, p.hora, p.estadio FROM users u INNER JOIN partidos_grupos p ON u.seleccion = p.pais INNER JOIN teams t ON p.rival = t.id WHERE u.id = $user_id AND p.fecha > NOW() LIMIT 1;");
                                if($stmt->execute()){
                                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                        extract($row);
                    ?>
                        <?php echo '<center><h1 class="seleccion_title">'.$seleccion_nombre.'</h1></center>'?>
                        <?php echo '<center><p class="seleccion_group">Grupo '.$grupo.'</p></center><br><br>'?>
                        <?php echo '<p class="seleccion_match">Proximo partido: '.$fecha.' a las '.$hora.' en el Estadio '.$estadio.' contra '.$rival.'</p>'?>
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
            <div class="more_news_elements">
                <img src="images/campeones.png" alt="Qatar" class="responsive">
                <span class=text>Campeones</span>
            </div>
            <div>Argentina y la historia en los mundiales</div>
            <div>Los más destacados de cada seleccion</div>


        </div>

        <script src="js/scroll.js"></script>
        <script src="js/index.js"></script>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    
    </body>
</html>

<script>
    function perfil(){
        window.location.href = "main/profile/profile.php";
    }

    function notlogged(){
        window.location.href="account/login.php";
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

    var id = <?php echo($id); ?>;
    var count = <?php echo($count); ?>;

    if(id == count-(count-1)){
        document.getElementById('next').disabled = true;
    }

    function next(){
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

    function previous(){
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