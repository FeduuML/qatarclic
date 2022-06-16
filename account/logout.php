<?php
    session_start(); //Esencial para que funcione el logout
    session_destroy(); //Logout
    header("Location: /qatarclic"); //Redirect
?>