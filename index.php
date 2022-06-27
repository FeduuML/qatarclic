<?php
    require 'account/database.php';

    session_start();
    if(isset($_SESSION['user_id'])){
        header("Location: main/hincha.php");
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="styles/signup.css" rel="stylesheet" type="text/css">
        <link href="styles/header.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>

    <body>
        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <header>
            <div class="wrapper">
                <div class="logo"><?php require 'header/header.php';?></div>
                <nav>
                    <a href="main/hincha.php">Ingresar en modo invitado</a></li>
                </nav>
            </div>
        </header>
        
        <div class="container">
            <section class="form" id="bloque">
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
				        <button type="submit" class="formulario__btn">Enviar</button>
			        </div>

                    <div class="formulario__mensaje" id="formulario__mensaje">
				        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			        </div>

                    <br>

                    <p class="alternative"> ¿No tenes cuenta? <a href="account/signup.php">Registrarse</a></p>
                    <br>
                    <p class="alternative"> ¿Olvidaste tu contraseña? <a href="account/forgotpass.php">Clic aqui</a></p>
                </form>
            </section>
        </div>
    </body>
</html>

<script>
    const formulario = document.getElementById('formulario'); //Llamo al formulario

    formulario.addEventListener('submit', (e) => { //Se lleva a cabo lo siguiente si le doy al boton
        e.preventDefault();

        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if(username.length == 0 || password.length == 0){
            document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo'); //Muestro mensaje de error
		    setTimeout(() => { //Solo lo muestro por 5 segundos
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo'); 
		    }, 5000);
        }
        else
            formulario.submit();
    });
</script>

<?php
    require 'account/database.php';

    $message = '';

    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $records = $conn->prepare('SELECT * FROM users WHERE username = :username OR email = :username');        
        $records->bindParam(':username', $_POST['username']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        if (is_countable($results) > 0 && password_verify($_POST['password'], $results['password']))
        {
            if($results['rol_id'] == 1){
                session_start();
                $_SESSION['user_id'] = $results['id'];
                $_SESSION['rol_id'] = $results['rol_id'];
            }
            else if($results['rol_id'] == 2){
                session_start();
                $_SESSION['user_id'] = $results['id'];
                $_SESSION['rol_id'] = $results['rol_id'];
            }
            else{
                session_start();
                $_SESSION['user_id'] = $results['id'];
                $_SESSION['rol_id'] = 3;
            }
            header("Location: main/hincha.php");
        }
        else
        {
            $message = 'Nombre de usuario o contraseña incorrectos';
            echo($message);
        }
    }
?>