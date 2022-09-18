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
                foreach($_POST['answer'] AS $answer){
                    $stmt=$conn->prepare("INSERT INTO respuestas(id_usuario, id_pregunta, respuesta) VALUES ('$user_id', '$id', '$answer')");
                    if($stmt->execute()){
                        echo("<script>alert('Respuestas cargadas exitosamente');</script>");
                        echo("<script>window.location.href = '../mundialito/mundialito.php'</script>");
                    }
                    else{
                        echo("<script>alert('Ha ocurrido un error');</script>");
                    }
                }

                $stmt=$conn->prepare("SELECT title FROM `encuestas` WHERE id = $id");
                $stmt->execute();

                if($stmt->rowCount()>0){
                    $row=$stmt->fetch(PDO::FETCH_ASSOC);
                    $title = $row['title'];
                    echo '<h1 class="title">'.$title.'</h1>';
                }

                $stmt=$conn->prepare("SELECT e.id, p.pregunta FROM `preguntas` p INNER JOIN encuestas e ON p.id_encuesta = e.id WHERE e.id = $id");
                $stmt->execute();

                if($stmt->rowCount()>0){
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($row);
                        echo '<form method="post" class="upload" autocomplete="off">';
                        echo '<div class="content">';
                        echo '<label class="label">'.$pregunta.'</label>';
                        echo '<input type="text" id="answer1" name="answer[]" class="form-control-content" required oninput="display(this.value)"></input>';
                        echo '<div class="display" id="display"></div>';
                        echo '</div>';
                    }
            ?>
            </form>
            <?php   
                }
            ?>
		</div>
		<script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
	</body>
</html>