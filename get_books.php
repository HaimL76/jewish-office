<?php
    require_once 'connection.php';
    
    header("Content-Type:application/json");

    $book_id = 'book_id';
    $uid = 'uid';

    $bookid = $_GET[$book_id];
    $userid = $_GET[$uid];

        $conn = openConnection();
        
        if ($conn == null)// || $conn.empty())
            die("Connection object is invalid");

        //echo json_encode($conn);

        $sql = "select * from ta_book order by name";
        
        if (isset($bookid) && $bookid != "") {
            //echo $bookid;
            $sql = $sql . "where id=" . $bookid;
        }

        if (isset($userid) && $userid > 0) {
            //echo $bookid;
            $sql = "select * from ta_book inner join ta_user_book on ta_user.id = ta_user_book.uid ";
            $sql = $sql . " where ta_user.id = " . $userid;
        }

        $sql = $sql . ";";

        error_log($sql . PHP_EOL);

        $result_get_book = $conn->query($sql);

        while ($row = $result_get_book->fetch_assoc()) {
            //echo json_encode($row) . PHP_EOL;
            $data_get_book[] = $row;
        }

        echo json_encode($data_get_book);
        //echo "Hello, World!";// $data_get_book;
        $conn->close();
?>