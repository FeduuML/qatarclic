<?php
    require '../../account/database.php';

    if(!empty($_GET['id'])){
        $post_id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM posts WHERE id=$post_id");
        if($stmt->execute()){
            echo '<script>document.getElementById("post'.$post_id.'").style.display = "none";</script>';
        }
    }
?>