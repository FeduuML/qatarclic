<?php
    session_start();
    require '../../account/database.php';

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);
        
        $username = $results['username'];
        $email = $results['email'];

        echo($username);
        echo($email);
    }

    $stmt=$conn->prepare("SELECT p.datetime, p.content, p.image, u.username FROM posts p INNER JOIN users u ON p.user_id = u.id ORDER BY RAND() LIMIT 3");

	if($stmt->execute()){
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $username = $row['username'];
            echo '<div>';
			echo '<span>'.$row['datetime'].'</span>';
			echo '<a href="../profiles/'.$username.'.php">'.$username.'</a>';
			echo '<span>'.$row['content'].'</span>';
			echo '<img src="../../posts/'.$row['image'].'"><br>';
            echo '</div>';
		}
	}
?>