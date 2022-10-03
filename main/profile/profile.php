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
		}
	}

	if(isset($_POST['btn-add2'])){
		$images=$_FILES['image']['name'];
			$tmp_dir=$_FILES['image']['tmp_name'];
			$imageSize=$_FILES['image']['size'];
			$upload_dir=dirname(__DIR__).'../../pfp/';
			$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
			$valid_extensions=array('jpeg', 'jpg', 'png');
			$pic=rand(1000, 1000000).".".$imgExt;
			// move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
			move_uploaded_file($tmp_dir, $upload_dir.$pic);
			$stmt=$conn->prepare("UPDATE users SET image = :uima WHERE id = $user_id");
			$stmt->bindParam(':uima', $pic);
			$stmt->execute();
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

<div class="pfp	">		
	<p class="title">Agregar foto de perfil</p>
	<form method="file" class="upload" enctype="multipart/form-data">
		<div class="image">
			<input type="file" name="image" class="form-control" required accept="*/image">
		</div>
		<div class="button2">
			<button type="submit" class="btn" name="btn-add2">Subir</button></div>	
		</div>			
	</form>
</div>


<div class="container">
	<div class="view-form">
		<div class="row">
			<div class="col-sm-3">
			</div>
		</div>
	</div>
</div>