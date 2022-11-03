<style>
    <?php include 'displayOptions.css'; ?>
</style>

<?php
    include '../../account/database.php';

    if(!empty($_POST["answer"]) && !empty($_POST["id_pregunta"]) && !empty($_POST["i"])){
        $answer = $_POST["answer"];
        $id_pregunta = $_POST["id_pregunta"];
        $i = $_POST["i"];

        $stmt = $conn->prepare("SELECT tipo FROM preguntas WHERE id = $id_pregunta");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $tipo = $row['tipo'];

        if($tipo == "paises"){
            $stmt = $conn->prepare("SELECT id,nombre FROM teams WHERE nombre LIKE '$answer%'");
            $stmt->execute();
            $count = $stmt->rowCount();

            if($count > 0){
                echo "<div id='wrapper' class='wrapper".$id_pregunta."'>";
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    echo "<div onclick='fill($id)' id='$id' class='pais'>".$nombre."<br><hr></div>";
                }
                echo "</div>";
            }
        }
        else if($tipo == "jugadores"){
            $stmt = $conn->prepare("SELECT id,nombre FROM players WHERE nombre LIKE '%$answer%'");
            $stmt->execute();
            $count = $stmt->rowCount();

            if($count > 0){
                echo "<div id='wrapper' class='wrapper".$id_pregunta."'>";
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    echo "<div onclick='fill($id)' id='$id' class='pais'>".$nombre."<br><hr></div>";
                }
                echo "</div>";
            }
        }
    }
?>

<script>
    <?php
        if(isset($id_pregunta)){
    ?>
        var id_pregunta = <?php echo($id_pregunta);?>;
    <?php
        }
    ?>

    <?php
        if(isset($i)){
    ?>
        var i = <?php echo($i);?>;
    <?php
        }
    ?>
    var displayOptions = document.getElementById("wrapper");

    document.addEventListener('mouseup', function(e) {
        if (!displayOptions.contains(e.target)) {
            displayOptions.style.display = 'none';
        }
    });
    
    if(i == 2){
        displayOptions.style.top = "21vw";
        displayOptions.style.marginTop = "-2%";
    }
    else if(i == 3){
        displayOptions.style.top = "27.5vw";
        displayOptions.style.marginTop = "-2.5%";
    }
    else if(i == 4){
        displayOptions.style.top = "33.5vw";
        displayOptions.style.marginTop = "-3%";
    }
    else if(i == 5){
        displayOptions.style.top = "39.5vw";
        displayOptions.style.marginTop = "-3%";
    }

    function fill(id){
        var pais = document.getElementById(id).innerText;
        <?php
            if(isset($id_pregunta)){
        ?>
            var answer = document.getElementById("answer"+"<?php echo($id_pregunta);?>");
        <?php
            }
        ?>

        answer.value = pais;
        displayOptions.style.display = "none";
    }
</script>