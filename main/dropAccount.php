<?php
    require '../account/database.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "DELETE FROM users WHERE id = $id";
        $query = $conn->prepare($sql);
        $query->execute();
    }
?>