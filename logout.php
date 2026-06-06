<?php
    session_start();
    unset($_SESSION["oturum"]);
    session_destroy();
    header("refresh:0;url=login.php");
?>