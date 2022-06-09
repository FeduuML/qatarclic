<style>
        <?php include '../styles/signup.css'; ?>
</style>

<?php
    include 'database.php';

    if(!empty($_POST["username"])){
        $username = $_POST["username"];
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute(); 
        $count = $stmt->fetchColumn();

        if($count>0) {
            echo "<span style='color:red; font-size: 12px; margin-bottom: 0;'>Este nombre de usuario ya existe. Por favor, elija otro</span>";
            echo "<script>var boton = document.getElementById('formulario__btn'); boton.disabled=true;</script>";
            echo "<script>boton.style.backgroundColor = 'gray';</script>";
            echo "<script>boton.style.cursor = 'default';</script>";
            echo "<script>boton.style.pointerEvents = 'none';</script>";
        }   
        else{
            echo "<script>boton.style.pointerEvents = 'auto';</script>";
            echo "<span style='color:green; font-size: 12px; margin-bottom: 0;'>Nombre de usuario disponible</span>";
            echo "<script>var boton = document.getElementById('formulario__btn'); boton.disabled=false;</script>";
            echo "<script>boton.style.backgroundColor = 'rgb(145, 28, 44)';</script>";
            echo "<script>boton.style.cursor = 'pointer';</script>";
        }
    }
?>