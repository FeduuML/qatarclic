<html>
    <head>
            <title>Qatar clic</title>
            <meta charset="utf-8">
            <link href="../styles/signup.css" rel="stylesheet" type="text/css">
            <link href="../styles/header.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head> 

    <body>
        <header class="header">
            <div class="wrapper">
                <div class="logo"><?php require '../header/header.php';?></div>
                <nav>
                    <a href="../index.php">Ingresar en modo invitado</a></li>
                </nav>
            </div>
        </header>

        <section class="recuperar_contraseña">
            <form action="" method="post" id="formulario" class="formulario" autocomplete="off">
                <center><i class="fa fa-solid fa-lock fa-5x"></i></center>
                <br>
                <h3 align ="center">¿Tienes problemas para entrar?</h3>
                <br>
                <h4 align ="center">Introduce tu correo electrónico y te enviaremos un enlace para que vuelvas a entrar en tu cuenta</h4>
                <br>

                <div class="formulario__grupo" id="grupo__email">
                    <input class="formulario__input" type="text" name="email" id="email" placeholder="Correo electronico">
                </div>

                <br>

                <div class="formulario__grupo" id="formulario__grupo-btn-enviar">
				    <button type="button" onclick="Validar()" id="formulario__btn" class="formulario__btn">Enviar enlace de acceso</button>
			    </div>

                <div class="formulario__mensaje" id="formulario__mensaje">
				    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor introduce un correo válido. </p>
			    </div>

                <br>

                <p class="alternative">Volver al <a href="login.php">inicio de sesion</a></p>
            </form>

        </section>
    </body>
</html>

<script>
    function Validar(){
        var email = document.getElementById('email').value;

        if(email.length == 0){
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

    if(!empty($_POST['email']))
    {
        $records = $conn->prepare('SELECT * FROM users WHERE email = :email');        
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        if (is_countable($results) > 0)
        {
            session_start();
            $_SESSION['user_email'] = $results['email'];
            header("Location: correo.php");
        }
        else
        {
            echo "Este correo no existe";
        }
    }
?>