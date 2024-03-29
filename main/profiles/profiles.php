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

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sql = "SELECT * FROM users WHERE id = $id";
			$query = $conn->prepare($sql);
			$query->execute();
			$results = $query -> fetch(PDO::FETCH_ASSOC);
			
			$username2 = $results['username'];
			$email = $results['email'];
	
			$stmt = $conn->prepare("SELECT * FROM bio WHERE user_id = $id");
			if($stmt->execute()){
				$result = $stmt -> fetch(PDO::FETCH_ASSOC);
				$bio = $result['bio'];
			}
	
			$stmt = $conn->prepare("SELECT * FROM pfp WHERE user_id = $id");
			if($stmt->execute()){
				$result = $stmt -> fetch(PDO::FETCH_ASSOC);
				$pfp = $result['pfp'];
			}
		}
		else{
			$stmt = $conn->prepare("SELECT * FROM bio WHERE user_id = $user_id");
			if($stmt->execute()){
				$result = $stmt -> fetch(PDO::FETCH_ASSOC);
				if(isset($result['bio'])){
					$bio = $result['bio'];
				}
			}
	
			$stmt = $conn->prepare("SELECT * FROM pfp WHERE user_id = $user_id");
			if($stmt->execute()){
				$result = $stmt -> fetch(PDO::FETCH_ASSOC);
				if(isset($result['pfp'])){
					$pfp = $result['pfp'];
				}
			}
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
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else if($_SESSION['rol_id'] == 2){
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../special_users/administrarMundialito.php'>Gestionar mundialito</a><br><br><a href='../special_users/administrador.php'>Gestionar noticias</a><br><br><a href='../special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                                }
                                else{
                                    echo("<div id='user_options' class='user_options'><h1>$username</h1><hr><br><a href='../settings/settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
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
								if(isset($pfp)){
									if(isset($_GET['id'])){
										echo "<img class='img2' id='img' src='../../pfp/$pfp'></img>";
									}
									else{
										echo "<img class='img' id='img' onclick='display()' src='../../pfp/$pfp' title='Cambiar imagen'></img>";
									}
								}
								else{
									echo "<img class='img' id='img' onclick='display()' src='../../images/logo.png' title='Cambiar imagen'>";
								}
							?>
						</div>

						<div id="user_info">
							<div class="username_box">
							<?php
								if(isset($_GET['id'])){
							?>
								<h2 class="user_name"> <?php echo($username2); ?></h2>
							<?php
								}else{
							?>
								<h2 class="user_name"> <?php echo($username); ?></h2>	
							<?php
								}
							?>
							</div>
							<hr>
							<div class="bio_box">
							<?php
								if(!isset($_GET['id'])){
							?>
								<p class="user_bio" id="user_bio" onclick="document.getElementById('popup').classList.toggle('active'); document.getElementById('blur').classList.toggle('active');">Añadir descripcion</p>
							<?php
								}else{
							?>
								<p class="user_bio2" id="user_bio">Añadir descripcion</p>
							<?php
								echo "<script>var bio = document.getElementById('user_bio'); 
								bio.innerHTML = '$bio'</script>";
								}
							?>
							</div>
							<?php
							if(isset($bio)){
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

			<?php
				if(!isset($_GET['id'])){
			?>
				<div class="post-container">
					<p class="post-title">Crear publicacion</p>
					<form method="post" class="upload" enctype="multipart/form-data">
						<div class="content">
							<textarea type="text" name="content" class="post-text"></textarea>
						</div>
						<center><button type="submit" class="btn-post" name="btn-post">Subir</button></center>	
					</form>
				</div>
			<?php
				}
			?>
		</div>
		
		<div id="popup">
            <h1>Nueva descripcion</h1>
			<form method="post" class="upload" enctype="multipart/form-data">
				<input class="bio-input" name="bio" type="text" placeholder="Ingresar descripcion" required></input>
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

			$records = $conn->prepare("SELECT * FROM `bio` b INNER JOIN users u ON b.user_id = u.id WHERE b.user_id = '$user_id'");
			$records->execute();
			$count = $records->rowCount();

			if($count > 0){
				$sql = $conn->prepare("UPDATE bio SET bio = '$bio' WHERE user_id = $user_id");
				if($sql->execute()){
					echo "<script>var bio = document.getElementById('user_bio'); 
					bio.innerHTML = '$bio'</script>";
				}
			}
			else{
				$sql=$conn->prepare("INSERT INTO bio(user_id,bio) VALUES ($user_id,'$bio')");
				if($sql->execute()){
					echo "<script>var bio = document.getElementById('user_bio'); 
					bio.innerHTML = '$bio'</script>";
				}
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

		$records = $conn->prepare("SELECT * FROM `pfp` p INNER JOIN users u ON p.user_id = u.id WHERE p.user_id = '$user_id'");
		$records->execute();
		$count = $records->rowCount();

		if($count > 0){
			$sql = $conn->prepare("UPDATE pfp SET pfp = :upfp WHERE user_id = $user_id");
			$sql->bindParam(':upfp', $pic);
			if($sql->execute()){
				echo "<script>document.getElementById('img').src='../../pfp/$pic';</script>";
			}
		}
		else{
			$sql=$conn->prepare("INSERT INTO pfp(user_id,pfp) VALUES ($user_id, :upfp)");
			$sql->bindParam(':upfp', $pic);
			if($sql->execute()){
				echo "<script>document.getElementById('img').src='../../pfp/$pic';</script>";
			}
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
    function calendario(){
        window.location.href="../../main/calendario/calendario.php";
    }

    function SobreQatar(){
        window.location.href="../../main/sobreqatar/sobreqatar.php";
    }

    function selections(){
        window.location.href="../../main/grupos/selections.php";
    }

    function mundialito(){
        window.location.href="../../main/mundialito/mundialito.php";
    }

    function community(){
        window.location.href="../../main/community/community.php";
    }
	
	function display(){
		document.getElementById('popup2').classList.toggle('active');
		document.getElementById('blur').classList.toggle('active');
	}
</script>