<?php
    session_start();

    if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        $uid = $_SESSION['uid'];
    } else {
        die ("invalid session user id");
    }
    
    require_once 'connection.php';
    
    header("Content-Type:application/json");

    if (isset($_GET['book_id']) && !empty($_GET['book_id'])) 
        $bookid = $_GET['book_id'];

    if (isset($_GET['uid']) && !empty($_GET['uid'])) 
        $userid = $_GET['uid'];

    $conn = openConnection();
        
    if ($conn == null)// || $conn.empty())
        die("Connection object is invalid");

        //echo json_encode($conn);

    $sql = "select * from ta_book order by name";
        
    if (isset($bookid) && $bookid > 0) 
        $sql = $sql . "where id=" . $bookid;

    $u_id = $userid;

    if (!isset($u_id) || $u_id < 1)
        $u_id = $uid;

    if (isset($userid) && $userid > 0) {
        $sql = "select * from ta_book inner join ta_user_book on ta_book.id = ta_user_book.bid ";
        $sql = $sql . " where ta_user_book.uid = " . $u_id;
    }

    $sql = $sql . ";";

    error_log($sql . PHP_EOL);

    $result_get_book = $conn->query($sql);

    if ($result_get_book) {
        while ($row = $result_get_book->fetch_assoc()) 
            $data_get_book[] = $row;

        if (isset($data_get_book))
            echo json_encode($data_get_book);
    }

    $conn->close();
?>