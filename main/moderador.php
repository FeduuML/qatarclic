<?php
    session_start();

    require '../account/database.php';

    $sql = "SELECT * FROM users";
    $query = $conn->prepare($sql);
    $query->execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
?>

<html>
<head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="moderador.css" rel="stylesheet" type="text/css">
        <link href="../styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>
    
    <body>
        <header class="header" id="header">
            <div class="wrapper">
                <div class="logo"><?php require '../header/header.php';?></div>
                <nav>
                    <?php 
                    if(isset($_SESSION['user_id'])){
                        echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                        if($_SESSION['rol_id'] == 1){
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/moderador.php'>Gestionar usuarios</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                        else{
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                    }
                    else{
                        echo("<a href='account/login.php'>Iniciar sesion</a>");
                    } ?>
                </nav>
            </div>
            <hr>
            <nav class="navegador_general" id="navbar">
                <div class="perfil">
                    <h1 class="text">Perfil</h1>
                </div>

                <div class="fixture">
                    <h1 class="text">Fixture</h1>
                </div> 
            
                <div class="calendario">
                   <h1 class="text" id="calendario" onclick="calendario()">Calendario</h1>
                </div>

                <div class="qatar">
                    <h1 class="text">Sobre Qatar<h1>
                </div>

                <div class="selecciones">
                    <h1 class="text">Selecciones<h1>
                </div>

                <div class="comunidad">
                    <h1 class="text">Comunidad<h1>
                </div>
            </nav>
        </header>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php
                        foreach($results as $result) {
                    ?>
                    <tr>
                        <th><?php echo $result -> id ?></th>
                        <th><?php echo $result -> email ?></th>
                        <th><?php echo $result -> username ?></th>
                        <th><?php echo $result -> rol_id ?></th>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>