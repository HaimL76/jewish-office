<?php
    require_once 'users_api.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
        die ("request is not a post method");

    if (!isset($_POST)) 
        die ("no post parameters found");

    header("Content-Type:application/json");

      $username = $_POST["usr"];//$sys_id];
      $password = $_POST["pwd"];//$name];
  
      if (isset ($username) && $username != '' && isset ($password) && $password != '') {

      }
?>