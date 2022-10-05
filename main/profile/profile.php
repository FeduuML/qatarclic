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

        echo($username);
        echo($email);
    }

	if(isset($_POST['btn-add1']))
	{
		if(isset($_POST['bio'])){
			$bio=$_POST['bio'];
			$stmt=$conn->prepare("UPDATE users SET bio = :ubio WHERE id = $user_id");
			$stmt->bindParam(':ubio', $bio);
			$stmt->execute();
			echo('<script>alert("Biografia cargada exitosamente");</script>');
		}
	}

?>

<div class="bio">			
	<form method="post" class="upload" enctype="multipart/form-data">
		<div class="bio">
			<label class="label">Biografia</label>
			<input type="text" name="bio" class="form-control">
		</div>
		<div class="button1">
			<button type="submit" class="btn" name="btn-add1">Subir</button></div>	
		</div>			
	</form>
</div>

<?php
	if(isset($_POST['btn-add2'])){
		$images=$_FILES['pfp']['name'];
		$tmp_dir=$_FILES['pfp']['tmp_name'];
		$imageSize=$_FILES['pfp']['size'];
		$upload_dir=dirname(__DIR__).'../../pfp/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png');
		$pic=rand(1000, 1000000).".".$imgExt;
		// move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
		move_uploaded_file($tmp_dir, $upload_dir.$pic);
		$stmt=$conn->prepare("UPDATE users SET pfp  = :upfp WHERE id = $user_id");
		$stmt->bindParam(':upfp', $pic);
		if($stmt->execute()){
			echo('<script>alert("Imagen cargada exitosamente");</script>');
		}
	}
?>
		
<div class="pfp">
	<form method="post" class="upload" enctype="multipart/form-data">
		<label class="label">Agregar foto de perfil</label>
		<input type="file" name="pfp" class="form-control" required accept="*/image">

		<div class="button2">
			<button type="submit" class="btn" name="btn-add2">Subir</button></div>	
		</div>			
	</form>
</div>


<?php
	if(isset($_POST['btn-add3'])){
		date_default_timezone_set('America/Buenos_Aires');
		$fecha = date('Y-m-d H:i:s');
		$content=$_POST['content'];
		$images=$_FILES['image']['name'];
		$tmp_dir=$_FILES['image']['tmp_name'];
		$imageSize=$_FILES['image']['size'];
		$upload_dir=dirname(__DIR__).'../../posts/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		$pic=rand(1000, 1000000).".".$imgExt;
		move_uploaded_file($tmp_dir, $upload_dir.$pic);
		
		$stmt=$conn->prepare("INSERT INTO posts(user_id, image, content, datetime) VALUES ($user_id, :uima, :ucont, '$fecha')");
		$stmt->bindParam(':uima', $pic);
		$stmt->bindParam(':ucont', $content);

		if($stmt->execute()){
			echo("<script>alert('Correcto');</script>");
		}
		else{
			echo("<script>alert('Incorrecto');</script>");
		}
	}
?>

<div class="container">
	<p class="title">Crear publicacion</p>
	<form method="post" class="upload" enctype="multipart/form-data">
		<div class="content">
			<label class="label">Contenido (max. 500 caracteres)</label>
			<textarea type="text" name="content" class="form-control-content" ></textarea>
		</div>
		<div class="image">
			<label class="label">Imagen</label>
			<input type="file" name="image" class="form-control" required accept="*/image">
		</div>
		<div class="button">
			<button type="submit" class="btn" name="btn-add3">Subir</button></div>	
		</div>			
	</form>
</div>

<?php
	$stmt=$conn->prepare("SELECT * FROM users WHERE id = $user_id");

	if($stmt->execute()){
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			echo '<span>'.$row['bio'].'</span>';
			echo '<img src="../../pfp/'.$row['pfp'].'">';
		}
	}
?>

<?php
	$stmt=$conn->prepare("SELECT p.datetime, p.content, p.image, u.username FROM posts p INNER JOIN users u ON p.user_id = u.id WHERE p.id = $user_id");

	if($stmt->execute()){
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			echo '<span>'.$row['datetime'].'</span>';
			echo '<span>'.$row['username'].'</span>';
			echo '<span>'.$row['content'].'</span>';
			echo '<img src="../../posts/'.$row['image'].'">';
		}
	}
?>