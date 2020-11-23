<?php
    require_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
        die ("request is not a post method");

    if (!isset($_POST)) 
        die ("no post parameters found");

    //var_dump($_POST);
    
    header("Content-Type:application/json");

      $uid = $_POST["uid"];//$sys_id];
      $bid = $_POST["bid"];//$name];

      //echo $sysid;
      //echo $name;
  
      if (isset ($uid) && $uid > 0 && isset($bid) && $bid > 0) {
          $conn = openConnection();
          
          if ($conn == null)// || $conn.empty())
              die("Connection object is invalid");
  
          //echo json_encode($conn);
  
          $sql = "insert into ta_user_book (uid, bid, achievements) values ({$uid}, {$bid}, 1)";
          
          //echo $sql;

          //error_log($sql . PHP_EOL);
  
          $result = $conn->query($sql);
  
          if (!$result)
            echo $conn->error;
  
          $conn->close();
      }
?>