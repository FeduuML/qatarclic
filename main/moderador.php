<?php
    session_start();

    require '../account/database.php';

    $sql = "SELECT * FROM users";
    $query = $conn->prepare($sql);
    $query->execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="../styles/header.css" rel="stylesheet" type="text/css">
        <link href="moderador.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>
    
    <body>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php
                        foreach($results as $result) {
                    ?>
                    <tr>
                        <th><?php echo $result -> id ?></th>
                        <th><?php echo $result -> email ?></th>
                        <th><?php echo $result -> username ?></th>
                        <th><?php echo $result -> rol_id ?></th>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>