<?php
    require_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
        die ("request is not a post method");

    if (!isset($_POST)) 
        die ("no post parameters found");

    //var_dump($_POST);
    
    header("Content-Type:application/json");

    $sys_id = 'sys_id';
    $name = 'name';

    //foreach ($_POST as $key => $value){
        //error_log("{$key} = {$value}\r\n");
      //}

      $sysid = $_POST["sys_id"];//$sys_id];
      $bname = $_POST["name"];//$name];
      $bunits = $_POST["units"];//$name];
      $bdesc = $_POST["desc"];//$name];
      $catid = $_POST["cat"];//$name];

      //echo $sysid;
      //echo $name;
  
      if (isset ($catid) && $catid > 0 && isset ($sysid) && $sysid > 0 && isset($bname) && $bname != '' && isset($bunits) && $bunits != '') {
          $conn = openConnection();
          
          if ($conn == null)// || $conn.empty())
              die("Connection object is invalid");
  
          //echo json_encode($conn);
  
          $sql = "insert into ta_book (sys_id, name, units, description, category) values ({$sysid}, '{$bname}', {$bunits}, '{$bdesc}', {$catid})";
          
          //echo $sql;

          //error_log($sql . PHP_EOL);
  
          $result = $conn->query($sql);
  
          if (!$result)
            echo $conn->error;
  
          $conn->close();
      }
?>