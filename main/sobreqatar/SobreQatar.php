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
        <div class="container">
            <div class="box" id="box1" onclick="info()">
                <h1 class="label">INFO</h1>
            </div>
        
            <div class="box" id="box2" onclick="estadio()">
                <h1 class="label">ESTADIOS</h1>
            </div>
        
            <div class="box" id="box3" onclick="fifa()">
                <h1 class="label">FIFA</h1>
            </div>

            <div class="box" id="box4" onclick="volver()">
                <h1 class="label">VOLVER</h1>
            </div>
        </div>
    </body>
</html>

<script src="../../js/scroll.js"></script>
<script src="../../js/index.js"></script>

<script>
    function info(){
        window.open('https://www.datosmundial.com/asia/catar/index.php', '_blank');
    }

    function estadio(){
        window.location.href="estadios/estadios.php";
    }

    function fifa(){
        window.open('https://www.fifa.com/es', '_blank');
    }

    function volver(){
        window.location.href="../../index.php";
    }
</script>