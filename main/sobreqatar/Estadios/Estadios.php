<html>
    <head>
        <title>Qatar clic</title>
        <link href="Estadios.css" rel="stylesheet" type="text/css">
        <link href="../../../styles/header.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
    </head>
     
    <body>
        <!--navegador
    <header>
    <div class="margin"></div>

    <nav class="navegador_general" id="navbar">
        <header class="header" id="header">
        <div class="wrapper">
            <img id="logoheader"src="../../../images/logo.png">
            <div class="logo"><?php require '../../../header/header.php';?>
        
        </div>
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
            } ?>
        </nav>
    </div>


    <div class="wrapper_nav">
        <div class="first_element">
            <img src="../../../images/perfil.png" alt="Perfil" class="responsive">
            <span class="text">Perfil</span>
        </div>

        <div class="element">
            <?php 
                if(isset($_SESSION['user_id'])){ 
            ?>
            <img src="../../../images/fixture_violeta.png" alt="Fixture" onclick="mundialito()" class="responsive">
            <?php
                }else{
            ?>
            <img src="../../../images/fixture_violeta.png" alt="Fixture" onclick="notlogged()" class="responsive">
            <?php
                }
            ?>
            <span class="text">Mundialito</span>
        </div> 
    
        <div class="element">
            <img src="../../../images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
            <span class="text">Calendario</span>
        </div>

        <div class="element">
            <img src="../../../images/qatar_rosa.png" alt="Qatar" onclick="SobreQatar()" class="responsive">
            <span class="text">Sobre Qatar</span>
        </div>

        <div class="element">
            <img src="../../../images/teams.jpg" alt="Selecciones" onclick="selections()" class="responsive">
            <span class="text">Equipos</span>
        </div>

        <div class="element">
            <img src="../../../images/selecciones.png" alt="Comunidad" class="responsive">
            <span class="text">Comunidad</span>
        </div>
        </div>
    </nav>
    </header>
navegador-->
        

    <div>
        <div class="caja">
            <div class="caja-slider" id="slider">
 
                <div class="slider-section">
                    <img id=photo src="qatar-fotos/lusail_estadio2.jpg" alt="" class="slider-img"> 
                </div>
                <div class="slider-section">
                    <img id=photo src="qatar-fotos/lusail_estadio3.jpg" alt="" class="slider-img"> 
                </div>
                <div class="slider-section">
                    <img id=photo src="qatar-fotos/lusail_estadio.jpg" alt="" class="slider-img"> 
                </div>

        </div>
            <div class="slider-btn slider-btn-right" id="btn-right">&#62</div>
            <div class="slider-btn slider-btn-left" id="btn-left">&#60</div>
            <h2>Estadio Lusail</h2>
            <p> Estadio con capacidad para 80,000 espectadores,<br> que albergará la final <br>de la Copa Mundial de la FIFA Catar 2022™.</p>
        </div>
        
                
        <div class="caja" id="right">
            <img id=photo src="qatar-fotos/al_bait_estadio.jpg">
            <h2>Estadio Al Bait</h2>
            <p> Estadio con capacidad para 80,000 espectadores,<br> que albergará la final <br>de la Copa Mundial de la FIFA Catar 2022™.</p>
        </div>

    </div>

    <section>
        <div class="caja" id="left">
            <img id=photo src="qatar-fotos/974_estadio.jpg"> 
            <h2>Estadio 974</h2>
            <p> Un estadio con capacidad para 40,000 espectadores que rinde homenaje a la tradición marítima de Catar.</p>
        </div>
        
        <div class="caja" id="right">
            <img id=photo src="qatar-fotos/khalifa_estadio.jpg">
            <h2>Estadio Khalifa</h2>
            <p> Estadio con capacidad para 40,000 espectadores, que ha sido la piedra angular de los deportes en Catar desde 1976.</p>
        </div>
    </section>
    <section>
        <div class="caja" id="left">
            <img id=photo src="qatar-fotos/educity_estadio.jpg"> 
            <h2>Estadio Educational City</h2>
            <p> Estadio con capacidad para 40,000 espectadores rodeado por las instituciones educativas de primer nivel de Catar.</p>
        </div>
        
        <div class="caja" id="right">
            <img id=photo src="qatar-fotos/aljanoub_estadio.jpg">
            <h2>Estadio Al Janoub</h2>
            <p> Estadio con capacidad para 40,000 espectadores en la ciudad sureña de Al Wakrah, uno de los asentamientos humanos más antiguos de Catar.</p>
        </div>
    </section>

    <section>
        <div class="caja" id="left">
            <img id=photo src="qatar-fotos/althumama_estadio.jpg"> 
            <h2>Estadio Al Thumama</h2>
            <p> Estadio con capacidad para 40,000 espectadores, inspirado en la tradicional "gahfiya", ubicado a 12 km al sur de Doha</p>
        </div>
        
        <div class="caja" id="right">
            <img id=photo src="qatar-fotos/ahmadbinali_estadio.jpg">
            <h2>Estadio Ahmad Bin Ali</h2>
            <p> Estadio con capacidad para 40,000 espectadores situado en los terrenos del antiguo estadio Ahmad bin Ali.</p>
        </div>
    </section>

    </body>
</html>
<script>
    function estadio(){
        window.location.href="estadios.php";
    }
</script>
<script src="estadios.js"></script>