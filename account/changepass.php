<!DOCTYPE html>
<html>
    <head>
            <title>Qatar clic</title>
            <meta charset="utf-8">
            <link href="../styles/changepass.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head> 

    <body>
        <section>
            <form action="changepass.php" method="post">
                <div align ="center"><img src="../images/candado.png"></div>
                <h1 align ="center"> Introduzca su correo electronico para recibir un enlace de recuperacion de su contraseña</h1>
                <br><br>
                <input class="email"  type="text" name="email" placeholder="Correo electronico" required>
                <br><br>
                <button class="recovery_link" type="submit">Enviar Correo de recuperacion</button>
                <br><br><br><br>
                <button class="log_in"><a href="signup.php">Inicar sesion</a></button>
                <br><br>
            </form>

        </section>

    </body>
</html>