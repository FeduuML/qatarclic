<?php
    session_start();
    session_destroy();
    header("Location: /qatarclic/index.php");
?>