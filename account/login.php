<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="../styles/login.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <section>
            <form action="login.php" method="post">
                <h1 class="titulo_login">Login</h1>
                <input class="formulario__input" type="text" name="username" placeholder="Nombre de usuario" required>
                <br><br>
                <input class="formulario__input" type="password" name="password" placeholder="Contraseña" required>
                <br><br>
                <button class="control_login" type="submit">Enviar</button>
                <br><br>
                <p class="signup"> ¿No tenes cuenta? <a href="signup.php">Registrarse</a></p>
            </form>
        </section>

    </body>

</html>

<?php
    require 'database.php';

    if (isset($_SESSION['user_id']))
    {
        header('Location: /qatarclic');
    }
    else if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');        
        $records->bindParam(':username', $_POST['username']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
        
        if (is_countable($results) > 0 && password_verify($_POST['password'], $results['password']))
        {
            session_start();
            $sql = $conn->query= "SELECT * from users u inner join roles r on r.id=u.rol_id";
            $_SESSION['user_id'] = $results['id'];
            header("Location: ../main/hincha.php");
        }
        else
        {
            $message = 'Nombre de usuario o contraseña incorrectos';
            echo($message);
        }
    }
     
    $sql = $conn->query= "SELECT * from users u join roles r on r.id=u.rol_id";
    if (isset($_SESSION['user_id'])){
        switch($_SESSION['user_id']){
        case 1:
            'rol_id' == '1';
            header("Location: ../main/administrador.php");
        break;
        case 2:
            'rol_id' == '2';
            header("Location: ../main/moderador.php");
        break;
        default:
            header("Location ../main/hincha.php");
    }
    }
?>