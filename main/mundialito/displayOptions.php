<?php
    include '../../account/database.php';

    if(!empty($_POST["answer"]) && !empty($_POST["id_pregunta"])){
        $answer = $_POST["answer"];
        $id_pregunta = $_POST["id_pregunta"];
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
?>

<script>
    var id_pregunta = <?php echo($id_pregunta);?>;
    var displayOptions = document.getElementById("wrapper");

    document.addEventListener('mouseup', function(e) {
        if (!displayOptions.contains(e.target)) {
            displayOptions.style.display = 'none';
        }
    });
    
    if(id_pregunta == 2){
        document.getElementById("wrapper").style.top = "21vw";
    }
    else if(id_pregunta == 3){
        document.getElementById("wrapper").style.top = "27.5vw";
    }
    else if(id_pregunta == 4){
        document.getElementById("wrapper").style.top = "33.5vw";
    }
    else if(id_pregunta == 5){
        document.getElementById("wrapper").style.top = "39.5vw";
    }

    function fill(id){
        var pais = document.getElementById(id).innerText;
        var answer = document.getElementById("answer"+"<?php echo($id_pregunta);?>");

        answer.value = pais;
        displayOptions.style.display = "none";
    }
</script>

<style>
    .pais{
        cursor:pointer;
        font-size:1.2vw;
        width:100%;
    }

    .pais:hover{
        background-color:#eeeeee;
    }

    .wrapper1,.wrapper2,.wrapper3,.wrapper4,.wrapper5{
        width:30%;
        padding:5px;
        background-color:#d6d6d6;
        border-radius:10px;
        position:absolute;
        margin-top:-0.5%;
    }

    .wrapper2{
        margin-top:-2%;
    }

    .wrapper3{
        margin-top:-2.5%;
    }

    .wrapper4{
        margin-top:-3%;
    }

    .wrapper5{
        margin-top:-3%;
    }
</style>