<?php
    require 'database.php';

    $message = '';

    if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) //Validacion de campos completos desde PHP
    {
        //Envio del formulario a la base de datos
        $sql = "INSERT INTO users (username, email, password, rol_id) VALUES (:username, :email, :password, '0')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':username', $_POST['username']);
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); //Encriptado de la contraseña
        $stmt->bindParam(':password', $password);

        if($stmt->execute()) //Si el envio se realiza correctamente
        {
            $message = 'Cuenta creada exitosamente';
        }
        else //Si el envio no se realiza correctamente
        {
            $message = 'Ha ocurrido un error';
        }
    }
?>
