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
                $stmt = $conn->prepare("SELECT p.id_encuesta, p.pregunta, r.respuesta FROM respuestas r JOIN preguntas p ON r.id_pregunta = p.id WHERE id_usuario = $user_id ORDER BY p.id_encuesta;");
                $stmt->execute();

                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    echo '<div class="content">';
                    echo '<label class="label">'.$pregunta.'</label>';
                    echo '<input type="text" id="answer1" name="answer[]" class="form-control-content" required oninput="display(this.value)" placeholder="'.$respuesta.'" disabled></input>';
                    echo '</div>';
                }
            ?>
		</div>
		<script src="../../js/scroll.js"></script>
        <script src="../../js/index.js"></script>
	</body>
</html>