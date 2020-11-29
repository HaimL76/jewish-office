<?php
    session_start();

    if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        $uid = $_SESSION['uid'];
    } else {
        die ("invalid session user id");
    }
    
    require_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
        die ("request is not a post method");

    if (!isset($_POST)) 
        die ("no post parameters found");

    header("Content-Type:application/json");

      $sysid = $_POST["sys_id"];//$sys_id];
      $bname = $_POST["name"];//$name];
      $bunits = $_POST["units"];//$name];
      $bdesc = $_POST["desc"];//$name];
      $catid = $_POST["cat"];//$name];
  
      if (isset ($catid) && $catid > 0 && isset ($sysid) && $sysid > 0 && isset($bname) && $bname != '' && isset($bunits) && $bunits != '') {
          $conn = openConnection();
          
          if ($conn == null)// || $conn.empty())
              die("Connection object is invalid");
  
          $sql = "insert into ta_book (sys_id, name, units, description, category) values ({$sysid}, '{$bname}', {$bunits}, '{$bdesc}', {$catid})";
          
          $result = $conn->query($sql);
  
          if (!$result)
            die($conn->error);
  
          $conn->close();
      }
?>