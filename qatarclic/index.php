<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
    </head>

    <body>
        <?php require 'header.php' ?>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <form action="index.php" method="post">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="Nombre de usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Enviar">
            <br><br>
            <a href="signup.php">Signup</a>
        </form>
    </body>
</html>

<?php
    require 'database.php';

    if (isset($_SESSION['user_id']))
    {
        header('Location: /qatarclic');
    }  
    
    if (!empty($_POST['username']) && !empty($_POST['password']))
    {
        $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');        
        $records->bindParam(':username', $_POST['username']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
        
        if (is_countable($results) > 0 && password_verify($_POST['password'], $results['password']))
        {
            session_start();
            $_SESSION['user_id'] = $results['id'];
            header("Location: /qatarclic/hincha.php");
        } 
        else 
        {
            $message = 'Nombre de usuario o contraseña incorrectos';
            echo($message);
        }
    }
?>