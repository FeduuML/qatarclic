<?php
	require ('../../account/database.php');
    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);
        
        $username = $results['username'];
    }
    
	if(isset($_POST['btn-add']))
	{
        date_default_timezone_set('America/Buenos_Aires');
        $fecha = date('Y-m-d H:i:s');
		$name=$username;
        $title=$_POST['title'];
        $content=$_POST['content'];
		$images=$_FILES['image']['name'];
		$tmp_dir=$_FILES['image']['tmp_name'];
		$imageSize=$_FILES['image']['size'];
		$upload_dir=dirname(__DIR__).'../../uploads/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		$pic=rand(1000, 1000000).".".$imgExt;
		// move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
		move_uploaded_file($tmp_dir, $upload_dir.$pic);
		$stmt=$conn->prepare("INSERT INTO news(user, image, content, title, datetime) VALUES (:uname, :uima, :ucont, :utitl, '$fecha')");
		$stmt->bindParam(':uname', $name);
		//$stmt->bindParam(':uname', $_SESSION['user_id']);
		$stmt->bindParam(':uima', $pic);
        $stmt->bindParam(':ucont', $content);
        $stmt->bindParam(':utitl', $title);

		if($stmt->execute()){
?>
			<script>
				alert("Noticia cargada exitosamente");
				window.location.href=('../../index.php');
			</script>

			<?php
		}
		else{
			?>
			<script>
				alert("Error en la carga de la noticia");
				window.location.href=('../../index.php');
			</script>

			<?php
		}
	}
			?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="administrador.css" rel="stylesheet" type="text/css">
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>

	<body>
		<header class="header" id="header">
            <div class="wrapper">
                <div class="logo"><?php require '../../header/header.php';?></div>
                <nav>
                    <?php 
                    if(isset($_SESSION['user_id'])){
                        echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                        if($_SESSION['rol_id'] == 1){
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                        else if($_SESSION['rol_id'] == 2){
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/administrador.php'>Gestionar noticias</a><br><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                        else{
                            echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                        }
                    }
                    else{
                        echo("<a href='account/login.php'>Iniciar sesion</a>");
                    } ?>
                </nav>
            </div>
        </header>

        <div class="margin"></div>

        <nav class="navegador_general" id="navbar">
            <h1 class="text_nav">Mundial de Qatar 2022</h1>

            <div class="wrapper_nav">
                <div class="first_element">
                    <img src="../../images/fixture_violeta.png" alt="Perfil" class="responsive">
                    <span class="text">Perfil</span>
                </div>

                <div class="element">
                    <img src="../../images/fixture_violeta.png" alt="Fixture" class="responsive">
                    <span class="text">Fixture</span>
                </div> 
            
                <div class="element">
                    <img src="../../images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
                    <span class="text">Calendario</span>
                </div>

                <div class="element">
                    <img src="../../images/qatar_rosa.png" alt="Qatar" class="responsive">
                    <span class="text">Sobre Qatar</span>
                </div>

                <div class="element">
                    <img src="../../images/selecciones.png" alt="Selecciones" onclick="selections()" class="responsive">
                    <span class="text">Equipos</span>
                </div>

                <div class="element">
                    <img src="../../images/fixture_violeta.png" alt="Comunidad" class="responsive">
                    <span class="text">Comunidad</span>
                </div>
            </div>
        </nav>
 
        <div class="margin2"></div>

		<div class="container">
            <p class="title">Crear noticia</p>
            <form method="post" class="upload" enctype="multipart/form-data">
                <div class="titulo">
                    <label class="label">Titulo (max. 50 caracteres)</label>
                    <input type="text" name="title" class="form-control" maxlength=50 required>
                </div>
                <div class="content">
                    <label class="label">Contenido (max. 500 caracteres)</label>
                    <textarea type="text" name="content" class="form-control-content" rows=10 maxlength=500 required></textarea>
                </div>
                <div class="image">
                    <label class="label">Imagen</label>
                    <input type="file" name="image" class="form-control" required accept="*/image">
                </div>
                <div class="button">
                    <button type="submit" class="btn" name="btn-add">Subir</button></div>	
                </div>			
            </form>
		</div>
		<script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
	</body>
</html>

        