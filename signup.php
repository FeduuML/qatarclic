<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
    </head>

    <body>
        <?php require 'header.php'?>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <form action="signup.php" method="post">
            <h1>Signup</h1>
            <input type="text" name="username" placeholder="Nombre de usuario">
            <input type="text" name="email" placeholder="Correo electronico">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="password" name="confirm_password" placeholder="Confirmar contraseña">
            <input type="submit" value="Registrarse">
            <br><br>
            <a href="index.php">Iniciar sesion</a>
        </form>
    </body>
</html>

<?php
    require 'database.php';

    $message = '';

    if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':username', $_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($_POST["password"] == $_POST["confirm_password"]){
            if($stmt->execute()) {
                $message = 'La cuenta ha sido exitosamente creada';
            }else{
                $message = 'Ha ocurrido un error al crear la cuenta';
            }
        }else{
            $message = 'Las contraseñas no coinciden';
        }
        echo $message;
    }
?>