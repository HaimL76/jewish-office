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
        $bookid = $_POST['bid'];

      if (isset ($bookid) && $bookid > 0 && isset ($uid) && $uid) {
          $conn = openConnection();
          
          if ($conn == null)// || $conn.empty())
              die("Connection object is invalid");
  
          $sql = "delete from ta_book where bid = {$bookid} and uid = {$uid}";
          
          $result = $conn->query($sql);
  
          if (!$result)
            die($conn->error);
  
          $conn->close();
      }
?>