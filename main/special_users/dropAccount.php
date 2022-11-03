<?php
    require '../../account/database.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $stmt = $conn->prepare("SELECT * FROM respuestas WHERE id_usuario = $id");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count > 0){
            $stmt = $conn->prepare("DELETE FROM respuestas WHERE id_usuario = $id");
            $stmt->execute();
        }

        $stmt = $conn->prepare("SELECT * FROM seleccion WHERE user_id = $id");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count > 0){
            $stmt = $conn->prepare("DELETE FROM seleccion WHERE user_id = $id");
            $stmt->execute();
        }
        
        $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = $id");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count > 0){
            $stmt = $conn->prepare("DELETE FROM posts WHERE user_id = $id");
            $stmt->execute();
        }

        $stmt = $conn->prepare("SELECT * FROM cooldown_username WHERE user_id = $id");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count > 0){
            $stmt = $conn->prepare("DELETE FROM cooldown_username WHERE user_id = $id");
            $stmt->execute();
        }

        $stmt = $conn->prepare("SELECT * FROM cooldown_password WHERE user_id = $id");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count > 0){
            $stmt = $conn->prepare("DELETE FROM cooldown_password WHERE user_id = $id");
            $stmt->execute();
        }

        $sql = "DELETE FROM users WHERE id = $id";
        $query = $conn->prepare($sql);
        $query->execute();

        header("Location: moderador.php");
    }
?>