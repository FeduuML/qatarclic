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
        $id = $results['id'];
    }

    if(isset($_POST['btn-add'])){
        $answer1=$_POST['answer1'];
        $answer2=$_POST['answer2'];
        $answer3=$_POST['answer3'];
        $answer4=$_POST['answer4'];
        $answer5=$_POST['answer5'];

        $stmt=$conn->prepare("INSERT INTO respuestas_mundialito(id_encuesta, id_usuario, respuesta1, respuesta2, respuesta3, respuesta4, respuesta5) VALUES (1, '$id', :ucont1, :ucont2, :ucont3, :ucont4, :ucont5)");
        $stmt->bindParam(':ucont1', $answer1);
        $stmt->bindParam(':ucont2', $answer2);
        $stmt->bindParam(':ucont3', $answer3);
        $stmt->bindParam(':ucont4', $answer4);
        $stmt->bindParam(':ucont5', $answer5);

		if($stmt->execute()){
?>
			<script>
				alert("Encuesta cargada exitosamente");
				window.location.href=('../../index.php');
			</script>

			<?php
		}
		else{
			?>
			<script>
				alert("Error en la carga de la encuesta");
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
        <link href="quiz.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!--Script AJAX-->    
    </head>

	<body>
		<div class="container">
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $stmt=$conn->prepare("SELECT * FROM preguntas_mundialito WHERE id = $id");
                    $stmt->execute();

                    if($stmt->rowCount()>0){
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            extract($row);
                            echo '<p class="title">'.$title.'</p>';
                            echo '<form method="post" class="upload" autocomplete="off">';
                            echo '<div class="content">';
                            echo '<label class="label">'.$pregunta1.'</label>';
                            echo '<input type="text" id="answer1" name="answer1" class="form-control-content" required oninput="display(this.value)"></input>';
                            echo '<div class="display" id="display"></div>';
                            echo '</div>';
                        }
            ?>
                <div class="content">
                    <?php echo '<label class="label">'.$pregunta2.'</label>'?>
                    <input type="text" name="answer2" class="form-control-content" required></input>
                </div>
                <div class="content">
                    <?php echo '<label class="label">'.$pregunta3.'</label>'?>
                    <input type="text" name="answer3" class="form-control-content" required></input>
                </div>
                <div class="content">
                    <?php echo '<label class="label">'.$pregunta4.'</label>'?>
                    <input type="text" name="answer4" class="form-control-content" required></input>
                </div>
                <div class="content">
                    <?php echo '<label class="label">'.$pregunta5.'</label>'?>
                    <input type="text" name="answer5" class="form-control-content" required></input>
                </div>
                <div class="button">
                    <button type="submit" class="btn" name="btn-add"><p class="btn_label">Subir</p></button>	
                </div>
            </form>
            <?php   
                    }
                }
            ?>
		</div>
		<script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
	</body>
</html>

<script>
    function display(answer) {
	    $.ajax({
            url:'displayOptions.php',
            data:'answer='+answer,
            type:"POST",
            success:function(data){
                $("#display").html(data);
            },
            error:function (){}
        });
    }
</script>

