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
                   <h1 class="text" id="calendario">Calendario</h1>
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

        <div id="blur">
            <center><table class="table" id="table"></center>
                <tr>
                    <th onclick="sortTable(0)">ID</th>
                    <th onclick="sortTable(1)">Correo electronico</th>
                    <th onclick="sortTable(2)">Usuario</th>
                    <th onclick="sortTable(3)">Rol</th>
                    <th>Acciones</th>
                </tr>
        
                <?php
                    foreach($results as $result) {
                ?>
                <tr>
                    <td><?php echo $result -> id ?></td>
                    <td><?php echo $result -> email ?></td>
                    <td><?php echo $result -> username ?></td>
                    <td><?php echo $result -> rol_id ?></td>
                    <td>
                        <?php echo('<button onclick="areYouSure()">Eliminar</button>');?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
        <script src="../js/scroll.js"></script>
        <script src="../js/index.js"></script>

        <div id="popup">
            <h1>¿Estas seguro de querer eliminar esta cuenta permanentemente?</h1>
            <br>
            <p>No hay vuelta atras!</p>
            <button class="aceptar" onclick="aceptar()">Aceptar</button>
            <button class="cancelar" onclick="areYouSure()">Cancelar</button>
        </div>
    </body>
</html>

<script>
    var blur=document.getElementById('blur');
    var popup = document.getElementById('popup');

    function aceptar(){
        
    }

    function areYouSure() {
        blur.classList.toggle('active');
        popup.classList.toggle('active');
    }

    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("table");
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                    break;
                    }
                } 
                else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                    break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;
            } 
            else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>