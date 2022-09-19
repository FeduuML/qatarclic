<html>
<head>
    <title>Sobre Qatar</title>
</head>
<title>Qatar clic</title>
        <link href="SobreQatar.css" rel="stylesheet" type="text/css">
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../../header.css" rel="stylesheet" type="text/css">
<body>
    <!--navegador-->
<nav class="navegador_general" id="navbar">
            <h1 class="text_nav">Mundial de Qatar 2022</h1>

            <div class="wrapper_nav">
                <div class="first_element">
                    <img src="../../images/perfil.png" alt="Perfil" class="responsive">
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
                    <img src="../../images/qatar_rosa.png" alt="Qatar" class="responsive">
                    <span class="text">Sobre Qatar</span>
                </div>

                <div class="element">
                    <img src="../../images/teams.jpg" alt="Selecciones" onclick="selections()" class="responsive">
                    <span class="text">Equipos</span>
                </div>

                <div class="element">
                    <img src="../../images/selecciones.png" alt="Comunidad" class="responsive">
                    <span class="text">Comunidad</span>
                </div>
            </div>
        </nav>
<!--navegador-->
    

<!--<section>
        <div class="infobox">
        <img id="flagphoto" src="photos/flag.png">
        <h2>Esta edición se realizará desde el 21 de noviembre al 18 de diciembre de 2022 en Catar,<br> que consiguió los derechos de organización el<br> 2 de diciembre de 2010.</h2>
<div>
    </section>-->



    <section>
        <div class="box" id="box1">
            <h1>INFO</h1>
        <!--<h2>La Copa Mundial de Fútbol de la FIFA Catar 2022 será la XXII vigésimo segunda edición de la Copa Mundial de Fútbol masculino organizada por la FIFA.</h2>-->
        </div>
    
        <div class="box" id="box2">
            <h1>ESTADIOS</h1>
        <!---->
        </div>
    
        <div class="box" id="box3">
            <h1>FIFA</h1>
        <!--<h2>Qatar un Estado soberano árabe ubicado en el oeste de Asia y que ocupa la pequeña península de Catar en el este de la península arábiga.</h2>-->
        </div>
        <div class="box" id="box4">
            <h1>

        </div>
    </section>
</body>
</html>