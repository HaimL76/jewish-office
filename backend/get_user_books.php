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

    if (isset($userid) && $userid > 0)
        $u_id = $userid;

    if (!isset($u_id) || $u_id < 1)
        $u_id = $uid;

    if (isset($u_id) && $u_id > 0) {
        $sql = "select * from ta_book inner join ta_user_book on ta_book.id = ta_user_book.bid ";

        $sql = $sql . " left outer join ta_achievements on ta_achievements.uid = ta_user_book.uid ";
        $sql = $sql . " and ta_achievements.bid = ta_user_book.bid ";
        //$sql = $sql . " left join lateral (select count(*) from ta_achievements on ta_achievements.uid = ta_user_book.uid ";
        //$sql = $sql . " and ta_achievements.bid = ta_user_book.bid) num_achieves on 1=1 ";
        //$sql = $sql . ", lateral (select uid from ta_achievements achiv ";
        //$sql = $sql . " where achiv.uid = ta_user_book.uid and achiv.bid = ta_user_book.bid) as achiv_number ";
        $sql = $sql . " where ta_user_book.uid = " . $u_id;
        $sql = $sql . " order by name ";
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