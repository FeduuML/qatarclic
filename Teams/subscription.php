<?php
    require '../account/database.php';

    if(!empty($_GET['pais_id']) && !empty($_GET['user_id'])){
        $pais_id = $_GET['pais_id'];
        $user_id = $_GET['user_id'];

        $stmt = $conn->prepare("UPDATE users SET seleccion = $pais_id WHERE id=$user_id");
        if($stmt->execute()){
            echo '<script>document.getElementById("icon").classList.remove("active");</script>';
            echo '<script>document.getElementById("icon2").classList.toggle("active");</script>';
        }
    }
?>