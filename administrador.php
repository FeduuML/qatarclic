<?php
    session_start();
    $var = $_SESSION['user_id'];
    echo($var);
?>

<html>
    <body>
        <h1>Administrador</h1>
        <a href="logout.php">Cerrar sesion</a>
    </body>
</html>