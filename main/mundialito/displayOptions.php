<?php
    include '../../account/database.php';

    if(!empty($_POST["answer"])){
        $answer = $_POST["answer"];
        $stmt = $conn->prepare("SELECT nombre FROM teams WHERE nombre LIKE '$answer%'");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "<span onclick='fill(this.value)'style='color:green; font-size: 12px; margin-bottom: 0;'>".$nombre."<br></span>";
        }
    }
?>

<script>
    function fill(pais){
        document.getElementById("answer1").value = pais;
    }
</script>