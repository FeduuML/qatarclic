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
        $email = $results['email'];
		$pfp = $results['pfp'];
    }

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM users WHERE id = $id";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);
        
        $username = $results['username'];
        $email = $results['email'];
		$pfp = $results['pfp'];

		$stmt=$conn->prepare("SELECT p.datetime, p.content, u.username FROM posts p INNER JOIN users u ON p.user_id = u.id WHERE p.user_id = $id");
		if($stmt->execute()){
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				echo '<span>'.$row['datetime'].'</span>';
				echo '<span>'.$row['username'].'</span>';
				echo '<span>'.$row['content'].'</span>';
			}
		}
	}

	$stmt=$conn->prepare("SELECT p.datetime, p.content, u.username FROM posts p INNER JOIN users u ON p.user_id = u.id WHERE p.user_id = $user_id");
	if($stmt->execute()){
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			echo '<span>'.$row['datetime'].'</span>';
			echo '<span>'.$row['username'].'</span>';
			echo '<span>'.$row['content'].'</span>';
		}
	}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
		<link href="profiles.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>
   
    <body>
        <div class="margin"></div>

        <nav class="navegador_general" id="navbar">
            <header class="header" id="header">
                <div class="wrapper">
                    <img id="logoheader"src="../../images/logo.png">
                    <div class="logo"><?php require '../../header/header.php';?></div>
                    <nav>
                        <?php 
                            if(isset($_SESSION['user_id'])){
                                echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                                if($_SESSION['rol_id'] == 1){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else if($_SESSION['rol_id'] == 2){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/special_users/administrarMundialito.php'>Gestionar mundialito</a><br><br><a href='main/special_users/administrador.php'>Gestionar noticias</a><br><br><a href='main/special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else{
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='main/settings/settings.php'>Ajustes</a><br><br><a href='account/logout.php'>Cerrar sesion</a></div>");
                                }
                            }
                            else{
                                echo("<a href='account/login.php'>Iniciar sesion</a>");
                            } 
                        ?>
                    </nav>
                </div>

                <div class="wrapper_nav">
                    <div class="first_element">
                        <?php
                            if(isset($_SESSION['user_id'])){
                        ?>
                            <img src="../../images/perfil.png" alt="Perfil" class="responsive" onclick="perfil()">
                        <?php
                            }else{
                        ?>
                            <img src="../../images/perfil.png" alt="Perfil" class="responsive" onclick="notlogged()">
                        <?php
                            }
                        ?>
                        <span class="text">Perfil</span>
                    </div>

                    <div class="element">
                        <?php 
                            if(isset($_SESSION['user_id'])){ 
                        ?>
                        <img src="../../images/fixture_violeta.png" alt="Fixture" onclick="mundialito()" class="responsive">
                        <?php
                            }else{
                        ?>
                        <img src="../../images/fixture_violeta.png" alt="Fixture" onclick="notlogged()" class="responsive">
                        <?php
                            }
                        ?>
                        <span class="text">Mundialito</span>
                    </div> 
                
                    <div class="element">
                        <img src="../../images/calendario_bordo.png" alt="Calendario" onclick="calendario()" class="responsive">
                        <span class="text">Calendario</span>
                    </div>

                    <div class="element">
                        <img src="../../images/qatar_rosa.png" alt="Qatar" onclick="SobreQatar()" class="responsive">
                        <span class="text">Sobre Qatar</span>
                    </div>

                    <div class="element">
                        <img src="../../images/teams.jpg" alt="Selecciones" onclick="selections()" class="responsive">
                
                        <span class="text">Equipos</span>
                    </div>

                    <div class="element">
                        <img src="../../images/selecciones.png" alt="Comunidad" onclick="community()" class="responsive">
                        <span class="text">Comunidad</span>
                    </div>
                </div>
            </header>
        </nav>
        
        <div class="margin2"></div>

		<div class="container" id="blur">
			<head>
				<div id="user_header">
					<div id="user">
						<div id="picture_box">
							<?php
								if(isset($results['pfp'])){
									$pfp = $results['pfp'];
									echo "<img class='img' id='img' onclick='display()' src='../../pfp/$pfp' title='Cambiar imagen'></img>";
								}
								else{
									echo "<img class='img' id='img' onclick='display()' src='https://en.gravatar.com/userimage/54162376/6fa5c4908077ceddb6388f7cad1a1187.jpg?size=100' title='Cambiar imagen'>";
								}
							?>
						</div>

						<div id="user_info">
							<div class="username_box">
								<h2 class="user_name"> <?php echo($username); ?><i class="icon fas fa-solid fa-plus"></i></h2>
							</div>
							<hr>
							<div class="bio_box">
								<p class="user_bio" id="user_bio" onclick="document.getElementById('popup').classList.toggle('active'); document.getElementById('blur').classList.toggle('active');">Añadir descripcion</p>
							</div>
							<?php
							if(isset($results['bio'])){
								$bio = $results['bio'];
								echo "<script>var bio = document.getElementById('user_bio'); 
								bio.innerHTML = '$bio'</script>";
							}
							else{
								echo "<script>var bio = document.getElementById('user_bio'); 
								bio.innerHTML = 'Añadir descripcion'</script>";
							}
							?>
						</div>
					</div>
				</div>
			</head>

			<div class="post-container">
				<p class="post-title">Crear publicacion</p>
				<form method="post" class="upload" enctype="multipart/form-data">
					<div class="content">
						<textarea type="text" name="content" class="post-text"></textarea>
					</div>
					<center><button type="submit" class="btn-post" name="btn-post">Subir</button></center>	
				</form>
			</div>
		</div>
		
		<div id="popup">
            <h1>Nueva descripcion</h1>
			<form method="post" class="upload" enctype="multipart/form-data">
				<input class="bio-input" name="bio" type="text" placeholder="Ingresar descripcion"></input>
				<button class="button" type="submit" name="btn-bio">Aceptar</button>
				<button class="button" type="button" onclick="document.getElementById('popup').classList.toggle('active'); document.getElementById('blur').classList.toggle('active');">Cancelar</button>
			</form>
        </div>

		<div id="popup2">
            <h1>Cambiar imagen</h1>
			<form method="post" class="upload" enctype="multipart/form-data">
				<input type="file" name="pfp" class="img-input" required accept="*/image"></input><br>
				<button class="button" type="submit" name="btn-img">Aceptar</button>
				<button class="button" type="button" onclick="document.getElementById('popup2').classList.toggle('active'); document.getElementById('blur').classList.toggle('active');">Cancelar</button>			
			</form>
        </div>

        <script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
    </body>
</html>

<?php
	if(isset($_POST['btn-bio']))
	{
		if(isset($_POST['bio'])){
			$bio=$_POST['bio'];
			$stmt=$conn->prepare("UPDATE users SET bio = '$bio' WHERE id = $user_id");
			if($stmt->execute()){
				echo "<script>var bio = document.getElementById('user_bio'); 
				bio.innerHTML = '$bio'</script>";
			}
		}
	}

	if(isset($_POST['btn-img'])){
		$images=$_FILES['pfp']['name'];
		$tmp_dir=$_FILES['pfp']['tmp_name'];
		$imageSize=$_FILES['pfp']['size'];
		$upload_dir=dirname(__DIR__).'../../pfp/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png');
		$pic=rand(1000, 1000000).".".$imgExt;
		move_uploaded_file($tmp_dir, $upload_dir.$pic);
		$stmt=$conn->prepare("UPDATE users SET pfp  = :upfp WHERE id = $user_id");
		$stmt->bindParam(':upfp', $pic);

		if($stmt->execute()){
			echo "<script>document.getElementById('img').src='../../pfp/$pic';</script>";
		}
	}

	if(isset($_POST['btn-post'])){
		date_default_timezone_set('America/Buenos_Aires');
		$fecha = date('Y-m-d H:i:s');
		$content=$_POST['content'];
		$stmt=$conn->prepare("INSERT INTO posts(user_id, content, datetime) VALUES ($user_id, :ucont, '$fecha')");
		$stmt->bindParam(':ucont', $content);

		if($stmt->execute()){
			echo("<script>alert('Correcto');</script>");
		}
		else{
			echo("<script>alert('Incorrecto');</script>");
		}
	}
?>

<script>
	function display(){
		document.getElementById('popup2').classList.toggle('active');
		document.getElementById('blur').classList.toggle('active');
	}
</script>