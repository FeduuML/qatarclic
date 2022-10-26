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
       
    </head>

    <body>
        <section>
            <div class="box" id="box1">
            <a href="https://www.datosmundial.com/asia/catar/index.php" target="blank">
                <h1>INFO</h1> </a>
            </div>
        
            <div class="box" id="box2" onclick="estadio()" class="responsive">
                <h1>ESTADIOS</h1>
            </div>
        
            <div class="box" id="box3" >
                <a href="https://www.fifa.com/es" target="blank">
                <h1>FIFA</h1> </a>
            </div>

            <div class="box" id="box4">
                <a href="../../index.php">
                <h1>VOLVER</h1></a>
            </div>

        </section>
    </body>
</html>
<script src="../../js/scroll.js"></script>
<script src="../../js/index.js"></script>
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

    function perfil(){
        window.location.href="estadios/estadios.php";
    }

    function mundialito(){
        window.location.href="../mundialito/mundialito.php";
    }

    function community(){
        window.location.href="../community/community.php";
    }

    function notlogged(){
        window.location.href="../../account/login.php";
    }
</script>