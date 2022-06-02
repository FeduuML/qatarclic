<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <link href="../styles/signup.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <section>
            <form action="" method="post" id="formulario" class="formulario" autocomplete="off">
                <h1 class="signup">Signup</h1>

                <div class="formulario__grupo" id="grupo__username">
				    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="text" name="username" id="username" placeholder="Nombre de usuario">
					    <i class="formulario__validacion-estado fas fa-times-circle"></i>
				    </div>
				    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			    </div>

                <br>

                <div class="formulario__grupo" id="grupo__email">
				    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="text" name="email" id="email" placeholder="Correo electronico">
					    <i class="formulario__validacion-estado fas fa-times-circle"></i>
				    </div>
				    <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			    </div>

                <br>

                <div class="formulario__grupo" id="grupo__password">
				    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="password" name="password" id="password" placeholder="Contraseña">
					    <i class="formulario__validacion-estado fas fa-times-circle"></i>
				    </div>
				    <p class="formulario__input-error">La contraseña tiene que ser de 8 a 20 dígitos.</p>
			    </div>

                <br>

                <div class="formulario__grupo" id="grupo__confirm_password">
				    <div class="formulario__grupo-input">
                    <input class="formulario__input" type="password" name="confirm_password" id="confirm_password" placeholder="Confirmar contraseña">
					    <i class="formulario__validacion-estado fas fa-times-circle"></i>
				    </div>
				    <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
			    </div>

                <br>

                <div class="formulario__grupo" id="formulario__grupo-btn-enviar">
				    <button type="submit" class="formulario__btn">Enviar</button>
                    <br>
				    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Cuenta creada exitosamente</p>
			    </div>

                <div class="formulario__mensaje" id="formulario__mensaje">
				    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			    </div>

                <br>
                
                <p class="iniciar_sesion"> ¿Ya tenes cuenta? <a href="login.php">Iniciar sesion</a></p>
            </form>
        </section>
        <script src="../js/formulario.js"></script> <!--Script de validacion de datos-->
	    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </body>
</html>

<?php
    require 'database.php';

    $message = '';

    if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) //Validacion de campos completos desde PHP
    {
        //Envio del formulario a la base de datos
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':username', $_POST['username']);
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