<?php
    require '../../account/database.php';

    if(!empty($_GET['id'])){
        $noticia_id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM news WHERE id=$noticia_id");
        if($stmt->execute()){
            echo '<script>document.getElementById("new'.$noticia_id.'").style.display = "none";</script>';
        }
    }
?>