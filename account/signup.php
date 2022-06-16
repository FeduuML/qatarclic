<!DOCTYPE html>
<html>
    <head>
        <title>Qatar Clic</title>
        <link href="../styles/signup.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
	    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>

    <body>
        <header>
            <div class="wrapper">
                <div class="logo"><?php require 'header.php';?></div>
                <nav>
                    <a href="../main/hincha.php">Ingresar en modo invitado</a></li>
                </nav>
            </div>
        </header>

        <section style="margin-top:20px;">
            <form action="#" method="post" id="formulario" class="formulario" autocomplete="off">
                <h1>Registrarse</h1>

                <div class="formulario__grupo" id="grupo__username">
				    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="text" name="username" id="username" oninput="disponibilidad(this.value)" placeholder="Nombre de usuario">
					    <i class="formulario__validacion-estado fas fa-times-circle"></i>
				    </div>
				    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                    <span id="comprobarUsuario"></span>
                </div>

                <br>

                <div class="formulario__grupo" id="grupo__email">
				    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="text" name="email" id="email" placeholder="Correo electronico">
					    <i class="formulario__validacion-estado fas fa-times-circle"></i>
				    </div>
				    <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                    <span id="comprobarEmail"></span>
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
				    <button type="submit" id="formulario__btn" class="formulario__btn">Enviar</button>
                    <br>
				    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Cuenta creada exitosamente</p>
			    </div>

                <div class="formulario__mensaje" id="formulario__mensaje">
				    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			    </div>
                <div id="resultado"></div>
                <br>

                <p class="alternative"> ¿Ya tenes cuenta? <a href="../">Iniciar sesion</a></p>
            </form>
        </section>
        <script src="../js/formulario.js"></script> <!--Script de validacion de datos y carga de datos con AJAX-->
    </body>
</html>

<script> //Validación de disponibilidad de username a través de AJAX
    function disponibilidad(username) {
	    $.ajax({
            url:'availableUser.php',
            data:'username='+username,
            type:"POST",
            success:function(data){
                $("#comprobarUsuario").html(data);
            },
            error:function (){}
        });
    }
</script>