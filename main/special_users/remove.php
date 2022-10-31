<?php
    require '../../account/database.php';

    if(!empty($_GET['id'])){
        $encuesta_id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM preguntas WHERE id_encuesta=$encuesta_id");
        if($stmt->execute()){
            $sql = $conn->prepare("DELETE FROM encuestas WHERE id=$encuesta_id");
            if($sql->execute()){
                echo '<script>document.getElementById("quiz").style.display = "none";</script>';
            }
        }
    }
?>