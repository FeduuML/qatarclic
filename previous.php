<?php
    require 'account/database.php';

    if(!empty($_GET['id'])){
        $id = $_GET['id'];

        if(isset($id)){
            $stmt = $conn->prepare("SELECT * FROM `news` WHERE id > '$id' ORDER BY id ASC LIMIT 1");
            if($stmt->execute()){
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $sql=$conn->prepare('SELECT * FROM `news`');
                    $sql->execute();
                    $count = $sql->rowCount();
                    extract($row);
                    $id = $row['id'];
                    ?>

                    <div id="new_container" class="new_container">
                        <p><?php echo '<h1 class="new_title">'.$title.'</h1>'?></p>			
                        <p><?php echo '<h4 class="new_userdata">Subido por '.$row['user'].' el '.$row['datetime'].'</h4>' ?></p>
                        <div class="new_image_container"><?php echo '<center><img class="new_image" src="uploads/'.$row['image'].'"</center>'?></div>
                        <p><?php echo '<h3 class="new_content">'.$content.'</h3>' ?></p>	
                        <div class="new_btn_container">
                            <center>
                                <button onclick="previous()" id="previous" class="previous">Anterior</button>
                                <button onclick="next()" id="next" class="next">Siguiente</button>
                            </center>
                        </div>
			        </div>
                    
                <?php
                }
            }
        }
    }
?>

<script>
    var id = <?php echo($id); ?>;
    var count = <?php echo($count); ?>;

    if(id == count){
        document.getElementById('previous').disabled = true;
    }

    var parametros = {id};

    function previous(){
        $.ajax({
            data:parametros,
            url:'previous.php',
            type:'GET',
            success:function(data){
                $("#new_container").html(data);
            }
        })
    }
</script>

<script>
    function next(){
        var id = <?php echo($id); ?>;
        var parametros = {id};

        $.ajax({
            data:parametros,
            url:'next.php',
            type:'GET',
            success:function(data){
                $("#new_container").html(data);
            }
        })
    }
</script>