<?php
    session_start();

    header("Content-Type:application/json");

    if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        echo $_SESSION['uid'];
    } else{
        echo 0;
    }
?>