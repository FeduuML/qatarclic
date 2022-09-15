<?php
    include '../../account/database.php';

    if(!empty($_POST["answer"])){
        $answer = $_POST["answer"];
        $stmt = $conn->prepare("SELECT id,nombre FROM teams WHERE nombre LIKE '$answer%'");
        $stmt->execute();
        $count = $stmt->rowCount();
        echo "<div id='wrapper' class='wrapper'>";
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            if($count > 0){
                echo "<span onclick='fill($id)' id='$id' class='pais'>".$nombre."<br></span>";
            }
            else{
                echo("<script>var displayOptions = document.getElementById('wrapper'); displayOptions.style.display = 'none';");
            }
        }
        echo "</div>";
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
        font-size:1.4vw;
        margin-left:5%;
    }
    .pais:hover{
        background-color:#eeeeee;
    }

    .wrapper{
        width:10%;
        padding:5px;
        margin-top:-1%;
        position:absolute;
        background-color:#d6d6d6;
        border-radius:10px;
    }
</style>