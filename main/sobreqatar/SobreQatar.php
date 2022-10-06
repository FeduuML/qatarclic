<html>
    <head>
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
    </head>

    <body>
        <section>
            <div class="box" id="box1">
                <h1>INFO</h1>
            </div>
        
            <div class="box" id="box2" onclick="estadio()" class="responsive">
                <h1>ESTADIOS</h1>
            </div>
        
            <div class="box" id="box3" >
                <a href="https://www.fifa.com/es" target="blank">
                <h1>FIFA</h1> </a>
            </div>

            <div class="box" id="box4">
                <h1>VOLVER</h1>
            </div>

        </section>
    </body>
</html>

<script>
    function SobreQatar(){
        window.location.href="SobreQatar.php";
    }

    function calendario(){
        window.location.href="../calendario/calendario.php";
    }
    
    function selections(){
        window.location.href="../grupos/selections.php";
    }

    function estadio(){
        window.location.href="estadios/estadios.php";
    }
</script>