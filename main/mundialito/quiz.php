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
                if(isset($_GET['id'])){
                    $id_encuesta = $_GET['id'];

                    $stmt=$conn->prepare("SELECT id FROM `preguntas` WHERE id_encuesta=$id_encuesta LIMIT 1;");
                    $stmt->execute();
                    $row=$stmt->fetch(PDO::FETCH_ASSOC);

                    $id_pregunta = $row['id'];

                    if(isset($_POST['btn-add'])){
                        foreach($_POST['answer'] AS $answer){
                            $stmt=$conn->prepare("INSERT INTO respuestas(id_usuario, id_pregunta, respuesta) VALUES ('$user_id', $id_pregunta, '$answer')");
                            if($stmt->execute()){
                                echo("<script>alert('Respuestas cargadas exitosamente');</script>");
                                echo("<script>window.location.href = '../mundialito/mundialito.php'</script>");
                            }
                            else{
                                echo("<script>alert('Ha ocurrido un error');</script>");
                            }
                            $id_pregunta++;
                        }
                    }

                    $stmt=$conn->prepare("SELECT title FROM `encuestas` WHERE id = $id_encuesta");
                    $stmt->execute();

                    if($stmt->rowCount()>0){
                        $row=$stmt->fetch(PDO::FETCH_ASSOC);
                        $title = $row['title'];
                        echo '<h1 class="title">'.$title.'</h1>';
                    }

                    $stmt=$conn->prepare("SELECT e.id, p.pregunta, p.id AS id_pregunta FROM `preguntas` p INNER JOIN encuestas e ON p.id_encuesta = e.id WHERE e.id = $id_encuesta");
                    $stmt->execute();

                    if($stmt->rowCount()>0){
                        $i=1;
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            extract($row);
                            echo '<form method="post" id="form" class="upload" autocomplete="off">';
                            echo '<div class="content">';
                            echo '<label class="label">'.$pregunta.'</label>';
                            echo '<input type="text" id="answer'.$id_pregunta.'" name="answer[]" class="form-control-content" required oninput="display(this.value,'.$id_pregunta.','.$i.')"></input>';
                            echo '<div class="display" id="display"></div>';
                            echo '</div>';
                            $i++;
                        }
                        echo '<button type="submit" class="btn" name="btn-add"><p class="btn_label">Subir</p></button>';
            ?>
            </form>
            <?php   
                    }
                }
            ?>
		</div>
	</body>
</html>

<script>
    function display(answer,id_pregunta,i) {
        var parametros = {answer,id_pregunta,i};
	    $.ajax({
            url:'displayOptions.php',
            data:parametros,
            type:"POST",
            success:function(data){
                $("#display").html(data);
            },
            error:function (){}
        });
    }
</script>