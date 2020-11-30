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

    if (isset($_POST['bid']) && !empty($_POST['bid'])) 
      $bookid = $_POST['bid'];//$sys_id];

    if (isset($_POST['achieve']) && !empty($_POST['achieve'])) 
        $achievement = $_POST['achieve'];//$sys_id];
  
    if (isset ($uid) && $uid > 0 && isset ($bookid) && $bookid > 0 && isset ($achievement)) {
        $conn = openConnection();
          
        if ($conn == null)// || $conn.empty())
            die("Connection object is invalid");
  
        $sql = "insert into ta_achievements (uid, bid) values ({$uid}, {$bookid})";
          
        $result = $conn->query($sql);
  
        if (!$result)
            die($conn->error);
  
        $conn->close();
    }
?>