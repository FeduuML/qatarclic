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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->
    </head>

	<body>
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

        <div class="container">
            <p class="title">Eliminar noticias</p>
            <?php
                $stmt = $conn->prepare("SELECT * FROM news ORDER BY id");
                $stmt->execute();
                $count = $stmt->rowCount();

                if($count > 0){
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        echo "<div id='new".$id."' class='new'><span class='new_title'>$title</span><i class='trash fa fa-trash' aria-hidden='true' onclick='remove(".$id.")'></i><hr></div>";
                    }
                }
            ?>
		</div>
	</body>
</html>

<script>
    function remove(id){
        var parametros = {id};

        $.ajax({
		    data:parametros,
		    url:'eliminarNoticia.php',
		    type:'GET',
            success:function(data){
                $("#new"+id).html(data);
            }
	    });
    }
</script>