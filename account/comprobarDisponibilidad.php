<?php
    include 'database.php';

    if(!empty($_POST["username"])){
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute(); 
        $count = $stmt->fetchColumn();

        if($count>0) {
            echo "<span style='color:red'> Sorry User already exists .</span>";
        }
        else{
            echo "<span style='color:green'> User available for Registration .</span>";
        }
    }
?>