<?php 
    require '../account/database.php';

    $sql = "SELECT nombre FROM teams";   
    $query = $conn->prepare($sql);
    $query->execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
?>

<div>
    <table border-table>
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                foreach($results as $result) {
            ?>
            <tr>
                <th><?php echo $result -> nombre ?></th>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>