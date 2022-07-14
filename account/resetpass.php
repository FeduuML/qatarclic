<?php
	session_start();
?>

<html>
    <head>
        <title>Qatar Clic</title>
        <link href="../styles/signup.css" rel="stylesheet" type="text/css">
        <link href="../styles/header.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>

    <body>
        <header class="header">
            <div class="wrapper">
                <div class="logo"><?php require '../header/header.php';?></div>
                <nav>
                    <a href="../index.php">Volver al modo invitado</a></li>
                </nav>
            </div>
        </header>

        <section style="margin-top:150px;">
            <form action="" method="post" id="formulario" class="formulario" autocomplete="off">
                <h1>Restablecer contraseña</h1>

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
				    <button type="submit" id="formulario__btn" class="formulario__btn">Enviar</button>
                    <br>
				    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Cuenta creada exitosamente</p>
			    </div>

                <div class="formulario__mensaje" id="formulario__mensaje">
				    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			    </div>
            </form>
        </section>
    </body>
</html>

<script>
    const formulario = document.getElementById('formulario'); //Llamo al formulario
    const inputs = document.querySelectorAll('#formulario input'); //Llamo a todos los inputs del formulario

    const expresiones = { //Expresiones regulares: Cada campo debe cumplir con los parametros establecidos con la clase formulario__grupo-incorrecto
	    password: /^.{8,20}$/,
	    confirm_password: /^.{8,20}$/
    }

    const campos = { //Los campos siempre son inválidos al abrir o recargar la pagina (siempre vacios)
	    password: false,
	    confirm_password: false
    }

    const validarFormulario = (e) => { //A cada campo se le aplica la validación de datos
	    switch (e.target.name) {
		    case "password":
			    validarCampo(expresiones.password, e.target, 'password');
			    validarPassword();
		    break;
		    case "confirm_password":
			    validarCampo(expresiones.confirm_password, e.target, 'confirm_password');
			    validarPassword();
		    break;
	    }
    }

    const validarCampo = (expresion, input, campo) => { //Validación de datos
	    if(expresion.test(input.value)) { //Si lo ingresado cumple con las expresiones regulares
		    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		    document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		    campos[campo] = true; //El campo es válido
	    }
	    else { //Si lo ingresado no cumple con las expresiones regulares
		    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		    document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		    document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		    campos[campo] = false; //El campo sigue sin ser válido
	    }
    }

    const validarPassword = () => {
	    const inputPassword1 = document.getElementById('password');
	    const inputPassword2 = document.getElementById('confirm_password');

	    if(inputPassword1.value !== inputPassword2.value){ //Si las contraseñas no son iguales
		    document.getElementById(`grupo__confirm_password`).classList.add('formulario__grupo-incorrecto');
		    document.getElementById(`grupo__confirm_password`).classList.remove('formulario__grupo-correcto');
		    document.querySelector(`#grupo__confirm_password i`).classList.add('fa-times-circle');
		    document.querySelector(`#grupo__confirm_password i`).classList.remove('fa-check-circle');
		    document.querySelector(`#grupo__confirm_password .formulario__input-error`).classList.add('formulario__input-error-activo');
		    campos['password'] = false; //El campo no es valido
		    campos['confirm_password'] = false; //El campo no es valido
	    }
	    else{ //Si las contraseñas son iguales
		    document.getElementById(`grupo__confirm_password`).classList.remove('formulario__grupo-incorrecto');
		    document.getElementById(`grupo__confirm_password`).classList.add('formulario__grupo-correcto');
		    document.querySelector(`#grupo__confirm_password i`).classList.remove('fa-times-circle');
		    document.querySelector(`#grupo__confirm_password i`).classList.add('fa-check-circle');
		    document.querySelector(`#grupo__confirm_password .formulario__input-error`).classList.remove('formulario__input-error-activo');
		    campos['password'] = true; //El campo es valido
	    }
    }

    inputs.forEach((input) => {
	    input.addEventListener('keyup', validarFormulario); //Apenas toque una tecla ya se lleva a cabo la validación
	    input.addEventListener('blur', validarFormulario); //Si le doy clic afuera del input también se lleva a cabo la validación
    });

    formulario.addEventListener('submit', (e) => {//Se lleva a cabo lo siguiente si le doy al boton
	    e.preventDefault();

	    if(campos.password && campos.confirm_password){ //Si TODO esta correcto
            formulario.submit();
	    } 
	    else { //Si todo NO esta correcto
		    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo'); //Muestro mensaje de error
		    setTimeout(() => { //Solo lo muestro por 5 segundos
			    document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo'); 
		    }, 5000);
	    }
    });
</script>

<?php
	require 'database.php';

	if(isset($_SESSION['user_email']) && !empty($_POST['password'])){
		$email = $_SESSION['user_email'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT); //Encriptado de la contraseña

		$records = $conn->prepare("UPDATE users SET password = '$password' WHERE email = '$email'");     
    	$records->execute();
    	$results = $records->fetch(PDO::FETCH_ASSOC);

		echo('<script>window.location.href = "changedpass.php";</script>');
	}
?>