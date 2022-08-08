<?php 
    require '../account/database.php';

    $sql = "SELECT * FROM teams ORDER BY grupo,nombre";   
    $query = $conn->prepare($sql);
    $query->execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $grupos = [];
    $nombre_grupos = [];
    foreach($results as $row) {
        $grupos[$row->grupo][] = $row->nombre;
        $nombre_grupos[$row->grupo] = 1;
    }
?>

<div>
<?php
    foreach($nombre_grupos as $codigo_grupo=>$_null) {
?>
    <table border-table>
        <thead>
            <tr>
                <th>Grupo <?= $codigo_grupo ?></th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                foreach($grupos[$codigo_grupo] as $nombre) {
            ?>
            <tr>
                <td><?= $nombre ?></td>
            <?php
                }
            ?>
            </tr>
        </tbody>
    </table>
<?php
    }
?>
</div>