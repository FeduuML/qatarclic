<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="../styles/signup.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>

    <body>
        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <section>
            <form action="#" method="post" id="formulario" class="formulario" autocomplete="off">
                <h1>Iniciar sesion</h1>

                <div class="formulario__grupo" id="grupo__username">
				    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="text" name="username" id="username" placeholder="Nombre de usuario">
				    </div>
			    </div>

                <br>

                <div class="formulario__grupo" id="grupo__password">
				    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="password" name="password" id="password" placeholder="Contraseña">
				    </div>
			    </div>

                <br>

                <div class="formulario__grupo" id="formulario__grupo-btn-enviar">
				    <button type="button" onclick="Validar()" class="formulario__btn">Enviar</button>
			    </div>

                <div class="formulario__mensaje" id="formulario__mensaje">
				    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			    </div>

                <br>

                <p class="alternative"> ¿No tenes cuenta? <a href="signup.php">Registrarse</a></p>
            </form>
        </section>
    </body>
</html>

<script>
    function Validar(){
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if(username.length == 0){
            document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo'); //Muestro mensaje de error
		    setTimeout(() => { //Solo lo muestro por 5 segundos
			    document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo'); 
		    }, 5000);
        }
        else
            formulario.submit();
    }
</script>

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
    $username = $_POST['username'];
    $sql = "SELECT u.id, r.name AS rol_id, password FROM users u INNER JOIN roles r ON r.id = u.rol_id WHERE username = '$username'";
    if (isset($_SESSION['user_id'])){
        switch($_SESSION['user_id']){
        case 1:
            'rol_id' == '1';
            header("Location: ../main/moderador.php");
        break;
        case 2:
            'rol_id' == '2';
            header("Location: ../main/administrador.php");
        break;
        default:
            header("Location ../main/hincha.php");
    }
    }
?>