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
        <header class="header" id="header">
            <div class="wrapper">
                <div class="logo"><?php require 'header/header.php';?></div>
                <nav>
                    <?php 
                    if(isset($_SESSION['user_id'])){
                        echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                        if($_SESSION['rol_id'] == 1){
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                        else{
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                    }
                    else{
                        echo("<a href='account/login.php'>Iniciar sesion</a>");
                    } ?>
                </nav>
            </div>
        </header>

        <div class="margin"></div>

        <nav class="navegador_general" id="navbar">
            <h1 class="text_nav">Mundial de Qatar 2022</h1>

            <div class="wrapper_nav">
                <div class="first_element">
                    <img src="images/fixture_violeta.png" alt="Perfil" class="responsive">
                    <span class="text">Perfil</span>
                </div>

                <div class="element">
                    <img src="images/fixture_violeta.png" alt="Fixture" class="responsive">
                    <span class="text">Fixture</span>
                </div> 
            
                <div class="element">
                    <img src="images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
                    <span class="text">Calendario</span>
                </div>

                <div class="element">
                    <img src="images/qatar_rosa.png" alt="Qatar" class="responsive">
                    <span class="text">Sobre Qatar</span>
                </div>

                <div class="element">
                    <img src="images/selecciones.png" alt="Selecciones" onclick="selections()" class="responsive">
                    <span class="text">Equipos</span>
                </div>

                <div class="element">
                    <img src="images/fixture_violeta.png" alt="Comunidad" class="responsive">
                    <span class="text">Comunidad</span>
                </div>
            </div>
        </nav>
 
        <div class="margin2"></div>

        <content>
            <aside>
                <h2 class="title">Seleccion</h2>
                <br>
                <p>Mi seleccion:</p>
                <br><br><br>
                <p>Goleador de mi seleccion:</p>
                <br><br><br>
                <p>Proximo partido:
            </aside>

            <section class="news">
                <h2 class="title">Noticias</h2>
                <hr>
                <?php 
			        $stmt=$conn->prepare('SELECT * FROM news ORDER BY id DESC');
				    $stmt->execute();
				    if($stmt->rowCount()>0)
				    {
					    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					    {
						    extract($row);
				?>
			    <div class="col-sm-3">
                    <p><?php echo '<h1><center>'.$title.'</center></h1>'?></p>			
                    <p><?php echo '<h4>'.$date.'</h4>' ?></p>
                    <p><?php echo '<h4>'.$row['user'].'</h4>' ?></p>
                    <p><?php echo '<h3><center>'.$content.'</center></h3>' ?></p>
			        <?php echo '<center><img src="uploads/'.$row['image'].'"</center><br><br>'?>		
			    </div>
			    <?php 
				        }
			        }
			    ?>
            </section>
            <a class="twitter-timeline" href="https://twitter.com/fifaworldcup_es">Tweets by @fifaworldcup_es</a>
        </content>

        <script src="js/scroll.js"></script>
        <script src="js/index.js"></script>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </body>
</html>

<script>
    function calendario(){
        window.location.href="main/calendario/calendario.php";
    }
    
    function selections(){
        window.location.href="main/grupos/selections.php";
    }

    twttr.widgets.createTimeline({sourceType: "profile",screenName: "fifaworldcup_es"},
        document.getElementById("twitter-timeline")
    );
</script>