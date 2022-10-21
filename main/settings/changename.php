<?php
    session_start();
    require '../../account/database.php';

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);
        
        $username = $results['username'];

        $records = $conn->prepare("SELECT * FROM `cooldown_username` c INNER JOIN users u ON c.user_id = u.id WHERE u.username = '$username'");
        if($records->execute()){
            $count = $records->rowCount();
            echo("<script>alert($count);</script>");
        }
    }
?>

<html>
    <head>
        <title>Qatar Clic</title>
        <link href="../../styles/signup.css" rel="stylesheet" type="text/css">
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
    </head>

    <body>
        <header class="header">
            <div class="wrapper">
                <div class="logo"><?php require '../../header/header.php';?></div>
                <nav>
                    <a href="../../index.php">Volver a la página principal</a></li>
                </nav>
            </div>
        </header>

        <section style="margin-top:150px;">
            <form action="" method="post" id="formulario" class="formulario" autocomplete="off">
                <h1>Cambiar nombre de usuario</h1>

                <div class="formulario__grupo" id="grupo__username">
                    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="text" name="username" id="username" oninput="disponibilidad(this.value)" placeholder="Nuevo nombre de usuario">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                    <span id="comprobarUsuario"></span>
                </div>

                <br>

                <div class="formulario__grupo" style="margin-bottom:4%;">
                    <div class="formulario__grupo-input">
                        <input class="formulario__input" type="password" name="actual_password" id="actual_password" placeholder="Contraseña">
                    </div>
                </div>

                <div class="formulario__grupo" id="formulario__grupo-btn-enviar">
                    <button type="submit" id="formulario__btn" class="formulario__btn">Enviar</button>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>
            </form>
        </section>
    </body>
</html>

<script>
    //Validación de disponibilidad de username a través de AJAX
    function disponibilidad(username) {
	    $.ajax({
            url:'../../account/availableUser.php',
            data:'username='+username,
            type:"POST",
            success:function(data){
                $("#comprobarUsuario").html(data);
            },
            error:function (){}
        });
    }

    const formulario = document.getElementById('formulario'); //Llamo al formulario
    const inputs = document.querySelectorAll('#formulario input'); //Llamo a todos los inputs del formulario

    const expresiones = { //Expresiones regulares: Cada campo debe cumplir con los parametros establecidos con la clase formulario__grupo-incorrecto
        username: /^[a-zA-Z0-9\_\-]{4,16}$/
    }

    const campos = { //Los campos siempre son inválidos al abrir o recargar la pagina (siempre vacios)
        username: false
    }

    const validarFormulario = (e) => { //A cada campo se le aplica la validación de datos
        switch (e.target.name) {
            case "username":
                validarCampo(expresiones.username, e.target, 'username');
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

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario); //Apenas toque una tecla ya se lleva a cabo la validación
        input.addEventListener('blur', validarFormulario); //Si le doy clic afuera del input también se lleva a cabo la validación
    });

    formulario.addEventListener('submit', (e) => {//Se lleva a cabo lo siguiente si le doy al boton
        e.preventDefault();

        if(campos.username){ //Si TODO esta correcto
            formulario.submit();

            Object.entries(campos).forEach(([key, val]) => { //Permite repetir el formulario varias veces sin recargar la página
            campos[key] = false;
        });
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
    $message = '';

    if(isset($_SESSION['user_id']) && !empty($_POST['actual_password'])){
        $actual_password = $_POST['actual_password'];
        $user_id = $_SESSION['user_id'];
        $mysql = $conn->prepare("SELECT * FROM users WHERE :password = '$actual_password' AND id = $user_id");
        $mysql->bindParam(':password', $_POST['actual_password']);
        $mysql->execute();
        $stmt = $mysql->fetch(PDO::FETCH_ASSOC);

        if(is_countable($stmt) > 0 && password_verify($actual_password, $stmt['password'])){
            if(isset($_POST['username'])){
                $username = $_POST['username'];
                $email = $stmt['email'];
                $records = $conn->prepare("SELECT * FROM `cooldown_username` c INNER JOIN users u ON c.user_id = u.id WHERE c.user_id = '$user_id'");
                $records->execute();
                $count = $records->rowCount();

                if($count > 0){
                    $sql = $conn->prepare("UPDATE cooldown_username SET cooldown = CURRENT_TIMESTAMP() WHERE user_id = $user_id");
                    if($sql->execute()){
                        $result = $records->fetch(PDO::FETCH_ASSOC);
                        $update = $conn->prepare("UPDATE `users` SET username = '$username' WHERE id = $user_id");
                        $update->execute();
                        echo('<script>window.location.href = "settings.php?val=2";</script>');
                    }
                }
                else{
                    $sql = $conn->prepare("INSERT INTO cooldown_username(user_id, cooldown) VALUES ($user_id,CURRENT_TIMESTAMP())");
                    if($sql->execute()){
                        $result = $records->fetch(PDO::FETCH_ASSOC);
                        $update = $conn->prepare("UPDATE `users` SET username = '$username' WHERE id = $user_id");
                        $update->execute();
                        echo('<script>window.location.href = "settings.php?val=2";</script>');
                    }
                }
            }
        }
        else{
            $message = 'La contraseña ingresada es incorrecta';
            echo($message);
        }
    }
?>