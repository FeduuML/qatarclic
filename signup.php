<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <link href="signup.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        
        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        
        <section class="registro">
        <form action="signup.php" method="post">
            <h1 class="signup">Signup</h1>
            <input class="controls" type="text" name="username" placeholder="Nombre de usuario">
            <br>
            <input class="controls" type="text" name="email" placeholder="Correo electronico">
            <br>
            <input class="controls" type="password" name="password" placeholder="Contraseña">
            <br>
            <input class="controls" type="password" name="confirm_password" placeholder="Confirmar contraseña">
            <br>
            <br>
            <input class="control_registrarse" type="submit" value="Registrarse">
            <br><br>
            <p class="iniciar_sesion"> ¿Ya tenes cuenta? <a href="index.php">Iniciar sesion</a></p>
        </form>
        </section>
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