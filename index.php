<?php
    session_start();
    if(isset($_SESSION['user_id']))
    {
        header("Location: /qatarclic/hincha.php");
        die() ;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
    <head>
    <body>
        <?php require 'header.php';?>
        
        <?php if(!empty($user)): ?>
            <?php header('Location: qatarclic/hincha.php'); ?>
        <?php else: ?>
            <h1>Por favor, ingrese o registrese</h1>
            <a href="login.php">Ingresar</a> o
            <a href="signup.php">Registrarse</a>
        <?php endif; ?>
    </body>
</html>

<?php
    require 'database.php';

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id,, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if(count($results) > 0){
            $user = $results;
        }
    }
?>