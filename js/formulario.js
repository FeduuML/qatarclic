const formulario = document.getElementById('formulario'); //Llamo al formulario
const inputs = document.querySelectorAll('#formulario input'); //Llamo a todos los inputs del formulario

const expresiones = { //Expresiones regulares: Cada campo debe cumplir con los parametros establecidos con la clase formulario__grupo-incorrecto
	username: /^[a-zA-Z0-9\_\-]{4,16}$/,
	password: /^.{8,20}$/,
	confirm_password: /^.{8,20}$/,
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
}

const campos = { //Los campos siempre son inválidos al abrir o recargar la pagina (siempre vacios)
	username: false,
	password: false,
	email: false,
	confirm_password: false
}

const validarFormulario = (e) => { //A cada campo se le aplica la validación de datos
	switch (e.target.name) {
		case "username":
			validarCampo(expresiones.username, e.target, 'username'); //Llamo a la función determinando los parámetros
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword();
		break;
		case "confirm_password":
			validarCampo(expresiones.confirm_password, e.target, 'confirm_password');
			validarPassword();
		break;
		case "email":
			validarCampo(expresiones.email, e.target, 'email');
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
	document.activeElement.blur();

	if(campos.username && campos.password && campos.email && campos.confirm_password){ //Si TODO esta correcto
		enviar($('#username').val(),$('#email').val(),$('#password').val()); //formulario.submit() pero con AJAX
		document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo'); 
		
		formulario.reset(); //Se reinicia el formulario

		Object.entries(campos).forEach(([key, val]) => { //Permite repetir el formulario varias veces sin recargar la página
            campos[key] = false;
        });

		//Validación perteneciente a availableUser.php
		document.getElementById('comprobarUsuario').style.display = "none";
		username.addEventListener('keyup', validarUsername); 

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo'); //Mensaje correcto
		setTimeout(() => { //Solo lo muestro por 5 segundos
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto'); //Se eliminan los iconos correctos
		});
	} 
	else { //Si todo NO esta correcto
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo'); //Muestro mensaje de error
		setTimeout(() => { //Solo lo muestro por 5 segundos
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo'); 
		}, 5000);
	}
});

function enviar(username,email,password) { //Carga de datos a través de AJAX
	var parametros = {username,email,password};
	$.ajax({
		data:parametros,
		url:'signupAjax.php',
		type:'post'
	});
}

function validarUsername(){ //Validación perteneciente a availableUser.php
	document.getElementById('comprobarUsuario').style.display = "block";
}

function mostrarMensaje(){ //Validación perteneciente a availableUser.php
	document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo'); //Muestro mensaje de error
	setTimeout(() => { //Solo lo muestro por 5 segundos
		document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo'); 
	}, 5000);
}