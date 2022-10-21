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

        $stmt = $conn->prepare("SELECT seleccion_id FROM seleccion WHERE user_id = $user_id");
        if($stmt->execute()){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(isset($row['seleccion_id'])){
                $seleccion = $row['seleccion_id'];
            }
        }
        $stmt = $conn->prepare("SELECT id FROM teams WHERE nombre = 'IRAN'");
        if($stmt->execute()){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $pais_id = $row['id'];
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="../styles/header.css" rel="stylesheet" type="text/css">
        <link href="teams.css" rel="stylesheet" type="text/css">
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
                    <img id="logoheader"src="../images/logo.png">
                    <div class="logo"><?php require '../header/header.php';?></div>
                    <nav>
                        <?php 
                            if(isset($_SESSION['user_id'])){
                                echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                                if($_SESSION['rol_id'] == 1){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../main/settings/settings.php'>Ajustes</a><br><br><a href='../account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else if($_SESSION['rol_id'] == 2){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../main/special_users/administrarMundialito.php'>Gestionar mundialito</a><br><br><a href='../main/special_users/administrador.php'>Gestionar noticias</a><br><br><a href='../main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../main/settings/settings.php'>Ajustes</a><br><br><a href='../account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else{
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../main/settings/settings.php'>Ajustes</a><br><br><a href='../account/logout.php'>Cerrar sesion</a></div>");
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
                        <img src="../images/perfil.png" alt="Perfil" class="responsive">
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
                        <img src="../images/qatar_rosa.png" alt="Qatar" onclick="sobreqatar()" class="responsive">
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

        <div class="big-container" id="blur">
            <div class="container" style="width:40%;">
                <div class="wrap">
                    <div class="col">
                        <img class="imagen_bandera" src="../images/shields/IRAN.png">
                    </div>

                    <div class="col">
                        <span class="pais">IRAN</span>
                    </div>
                    
                    <div class="col">
                        <i id="icon" class="icon fas fa-solid fa-plus" onclick="display()"></i>
                        <i id="icon2" class="icon2 fas fa-solid fa-check" title="Te has suscrito a esta seleccion" onclick="display2()"></i>
                        <i id="icon3" class="icon3 fas fa-solid fa-plus" onclick="notlogged()"></i>
                        <?php
                            if(isset($user_id)){
                                if(isset($seleccion)){
                                    if($seleccion == $pais_id){
                                        echo '<script>document.getElementById("icon2").classList.toggle("active");</script>';
                                    }
                                    else{
                                        echo '<script>document.getElementById("icon").classList.toggle("active");</script>';
                                    }
                                }
                                else{
                                    echo '<script>document.getElementById("icon").classList.toggle("active");</script>';
                                }
                            }
                            else{
                                echo '<script>document.getElementById("icon3").classList.toggle("active");</script>';
                            }
                        ?>
                    </div>
                </div>

                <div class="table-container">
                    <table>
                        <?php
                            $stmt = $conn->prepare("SELECT * FROM players WHERE pais = 'IRAN'");
                            $stmt->execute();
                            echo"<th>Jugador</th><th>Numero</th><th>Edad</th>";
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                                echo"<tr>";
                                echo"<td>".$nombre."</td>";
                                echo"<td>".$numero."</td>";
                                echo"<td>".$edad."</td>";
                                echo"</tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>

            <div class="small-container">
                <div class="formacion-div">
                    <img class="formacion" src="../images/formaciones/IRAN.jpg">
                    <h2 class="leyenda">Formación de Iran</h2> 
                </div>

                <div class="twitter-div">
                    <a class="twitter-timeline" href="https://twitter.com/teammelliiran?lang=es">Tweets by @TeamMelliIran</a>
                </div>
            </div>
        </div>

        <div id="popup">
            <h1>¿Quieres suscribirte a esta selección?</h1>
            <button class="button" onclick='subscription("<?php echo $pais_id; ?>" , "<?php echo $user_id; ?>")'>Si</button>
            <button class="button" onclick="display()">No</button>
        </div>

        <div id="popup2">
            <h1>¿Quieres eliminar tu suscripción a esta selección?</h1>
            <button class="button" onclick='delete_subscription("<?php echo $user_id; ?>")'>Si</button>
            <button class="button" onclick="display2()">No</button>
        </div>

        <script src="../js/scroll.js"></script>
        <script src="../js/index.js"></script>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </body>
</html>

<script>
    function mundialito(){
        window.location.href = "../main/mundialito/mundialito.php";
    }
    
    function calendario(){
        window.location.href = "../main/calendario/calendario.php";
    }

    function sobreqatar(){
        window.location.href = "../main/sobreqatar/sobreqatar.php";
    }

    function selections(){
        window.location.href = "../main/grupos/selections.php";
    }

    function display(){
        document.getElementById('popup').classList.toggle('active');
        document.getElementById('blur').classList.toggle('active');
    }

    function display2(){
        document.getElementById('popup2').classList.toggle('active');
        document.getElementById('blur').classList.toggle('active');
    }

    function subscription(pais_id, user_id){
        var parametros = {pais_id, user_id};

        $.ajax({
		    data:parametros,
		    url:'subscription.php',
		    type:'GET',
            success:function(data){
                $("#icon").html(data);
            }
	    });
        display();
    }

    function delete_subscription(user_id){
        var parametros = {user_id};

        $.ajax({
		    data:parametros,
		    url:'delete_subscription.php',
		    type:'GET',
            success:function(data){
                $("#icon").html(data);
            }
	    });
        display2();
    }

    function notlogged(){
        window.location.href="../account/login.php";
    }
    function community(){
        window.location.href="../main/community/community.php";
    }
</script>