<?php
    require '../account/database.php';

    if(!empty($_GET['user_id'])){
        $user_id = $_GET['user_id'];

        $stmt = $conn->prepare("UPDATE users SET seleccion = NULL WHERE id=$user_id");
        if($stmt->execute()){
            echo '<script>document.getElementById("icon2").classList.remove("active");</script>';
            echo '<script>document.getElementById("icon").classList.toggle("active");</script>';
        }
    }
?>