<?php
    include '../../account/database.php';

    if(!empty($_POST["answer"])){
        $answer = $_POST["answer"];
        $stmt = $conn->prepare("SELECT id,nombre FROM teams WHERE nombre LIKE '$answer%'");
        $stmt->execute();
        $count = $stmt->rowCount();

        if($count > 0){
            echo "<div id='wrapper' class='wrapper'>";
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                echo "<div onclick='fill($id)' id='$id' class='pais'>".$nombre."<br><hr></div>";
            }
            echo "</div>";
        }
    }
?>

<script>
    function fill(id){
        var pais = document.getElementById(id).innerText;
        var answer1 = document.getElementById("answer1");
        var displayOptions = document.getElementById("wrapper");

        answer1.value = pais;
        displayOptions.style.display = "none";
    }
</script>

<style>
    .pais{
        cursor:pointer;
        font-size:2vw;
        width:100%;
    }
    .pais:hover{
        background-color:#eeeeee;
    }

    .wrapper{
        width:30%;
        padding:5px;
        margin-top:-1.5%;
        position:absolute;
        background-color:#d6d6d6;
        border-radius:10px;
    }
</style>