<?php
    require '../../account/database.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo("<script>alert($id);</script>");
        
        $sql = "DELETE FROM users WHERE id = $id";
        $query = $conn->prepare($sql);
        $query->execute();

        header("Location: moderador.php");
    }
?>