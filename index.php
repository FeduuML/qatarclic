<?php
    session_start();
    if(isset($_SESSION['user_id']))
    {
        header("Location: main/hincha.php");
        die() ;
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./styles/signup.css" rel="stylesheet" type="text/css">
    <head>
    <body>
        <?php if(!empty($user)): ?>
            <?php header('Location: main/hincha.php'); ?>
        <?php else: ?>
            <header>
                <div class="wrapper">
                    <div class="logo"><?php require 'account/header.php';?></div>
                    <nav>
                        <a href="#">Ingresar en modo invitado</a></li>
                    </nav>
                </div>
            </header>

            <section>
                <h1>Por favor, ingrese o registrese</h1>
                
                <div class="formulario__grupo" id="formulario__grupo-btn-enviar">
				    <button type="submit" id="formulario__btn" class="formulario__btn">Registrarse</button>
			    </div>

                <div class="formulario__grupo" id="formulario__grupo-btn-enviar">
				    <button type="submit" id="formulario__btn" class="formulario__btn">Iniciar sesion</button>
			    </div>
            </section>
        <?php endif; ?>
    </body>
</html>

<?php
    require 'account/database.php';

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if(count($results) > 0){
            $user = $results;
        }
    }
?>