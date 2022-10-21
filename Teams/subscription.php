<?php
    require '../account/database.php';

    if(!empty($_GET['pais_id']) && !empty($_GET['user_id'])){
        $pais_id = $_GET['pais_id'];
        $user_id = $_GET['user_id'];

        $sql = $conn->prepare("SELECT * FROM `seleccion` WHERE user_id = '$user_id'");
        $sql->execute();
        $count = $sql->rowCount();

        if($count > 0){
            $stmt = $conn->prepare("UPDATE seleccion SET seleccion_id = $pais_id WHERE user_id=$user_id");
            if($stmt->execute()){
                echo '<script>document.getElementById("icon").classList.remove("active");</script>';
                echo '<script>document.getElementById("icon2").classList.toggle("active");</script>';
            }
        }
        else{
            $stmt = $conn->prepare("INSERT INTO seleccion(user_id,seleccion_id) VALUES($user_id,$pais_id)");
            if($stmt->execute()){
                echo '<script>document.getElementById("icon").classList.remove("active");</script>';
                echo '<script>document.getElementById("icon2").classList.toggle("active");</script>';
            }
        }
    }
?>