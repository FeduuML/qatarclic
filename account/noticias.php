<?php
    require 'database.php';
	if(isset($_GET['delete_id']))
	{
		$stmt_select=$conn->prepare('SELECT * FROM tbl_user WHERE id=:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("uploads/".$imgRow['picProfile']);
		$stmt_delete=$db_conn->prepare('DELETE FROM tbl_user WHERE id =:uid');
		$stmt_delete->bindParam(':uid', $_GET['delete_id']);
		if($stmt_delete->execute())
		{
			?>
			<script>
			alert("You are deleted one item");
			window.location.href=('index.php');
			</script>
			<?php 
		}else 

		?>
			<script>
			alert("Can not delete item");
			window.location.href=('index.php');
			</script>
			<?php 

	}

	?>

<?php 
	
	if(isset($_POST['btn-add']))
	{
		$name=$_POST['user'];
        $title=$_POST['title'];
        $content=$_POST['content'];
		$images=$_FILES['image']['name'];
		$tmp_dir=$_FILES['image']['tmp_name'];
		$imageSize=$_FILES['image']['size'];

		$upload_dir='../uploads/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		$picProfile=rand(1000, 1000000).".".$imgExt;
		move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
		$stmt=$conn->prepare('INSERT INTO news(user, image, content, title) VALUES (:uname, :uima, :ucont, :utitl)');
		$stmt->bindParam(':uname', $name);
		$stmt->bindParam(':uima', $pic);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':title', $title);
		if($stmt->execute())
		{
        ?>
			<script>
				alert("new record successul");
				window.location.href=('index.php');
			</script>
		<?php
		}else 

		{
			?>
			<script>
				alert("Error");
				window.location.href=('index.php');
			</script>
		<?php
		}

	}
?>

	<div class="container">
		<div class="add-form">
			<h1 class="text-center">Crear noticia</h1>
			<form method="post" enctype="multipart/form-data">
				<label>Usuario</label>
				<input type="text" name="user" class="form-control" required="">
                <label>Titulo</label>
                <input type="text" name="title" class="form-control" required="">
                <label>Contenido</label>
                <input type="text" name="content" class="form-control" required="">
				<label>Imagen</label>
				<input type="file" name="image" class="form-control" required="" accept="*/image">
				<button type="submit" name="btn-add">Subir</button>				
			</form>
		</div>
		<hr style="border-top: 2px red solid;">
	</div>	

<div class="container">
	<div class="view-form">
		<div class="row">

        <?php 
			$stmt=$conn->prepare('SELECT * FROM news ORDER BY id DESC');
				$stmt->execute();
				if($stmt->rowCount()>0)
				{
					while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
						extract($row);
						?>
			<div class="col-sm-3">

        