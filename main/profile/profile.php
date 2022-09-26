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
if(isset($_POST['submit']))
{
        $fecha = date('Y-m-d H:i:s');
		$bio=$_POST['bio'];
		$images=$_FILES['image']['name'];
		$tmp_dir=$_FILES['image']['tmp_name'];
		$imageSize=$_FILES['image']['size'];
		$upload_dir=dirname(__DIR__).'../../profilepic/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		$pic=rand(1000, 1000000).".".$imgExt;
		// move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
		move_uploaded_file($tmp_dir, $upload_dir.$pic);
		$stmt=$conn->prepare("INSERT INTO news(user, image, content, title, datetime) VALUES (:uname, :uima, :ucont, :utitl, '$fecha')");
		//$stmt->bindParam(':uname', $_SESSION['user_id']);
		$stmt->bindParam(':uima', $pic);
        if($stmt->execute()){
?>
			<script>
				alert("Foto cambiada correctamente");
			
			</script>

			<?php
		}
		else{
			?>
			<script>
				alert("Error al cambiar la foto");
			
			</script>

			<?php
		}
	}
			?>

<div class="container">
		<div class="add-form">
			<p class="text-center">Foto de Perfil</p>
			<form method="post" enctype="multipart/form-data">
				<label>Picture Profile</label>
				<input type="file" name="profile" class="form-control" required="" accept="*/image">
				<button type="submit" name="btn-add">Guardar</button>				
			</form>
		</div>
	</div>
    <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="bio" class="btn btn-primary btn-block">Guardar</button>
          </div>
        </form>
      </div>	

			<div class="col-sm-3">
			<p><?php echo $username ?></p>
			<img src="profilepic/<?php echo $row['image']?>"><br><br>

			<a class="btn btn-info" <?php echo $row['id']?>" title="click for edit" onlick="return confirm('Sure to edit this record')"><span class="glyphicon glyphicone-edit"></span>Edit</a>
			<a class="btn btn-danger"<?php echo $row['id']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">Delete</a>
			
			</div>

			<?php 

				
			
			?>
		</div>

	</div>
</div>

