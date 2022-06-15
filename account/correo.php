<?php
    $para = "liberfedericomanuel@gmail.com";
    $titulo = "test";
    $mensaje = "test";
    $de = "aaaa@gmail.com";

    if(mail($para,$titulo,$mensaje,$de)){
        echo "Correo enviado";
    }
    else{
        echo "Error";
    }
?>