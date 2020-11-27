<?php
    session_start();

    if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        $uid = $_SESSION['uid'];
    } else {
        die ("invalid session user id");
    }
    
    require_once 'connection.php';
    
    header("Content-Type:application/json");

    $conn = openConnection();
        
    if ($conn == null)// || $conn.empty())
        die("Connection object is invalid");

    $sql = "select * from ta_book order by name;";

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