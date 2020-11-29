<?php
    session_start();

    if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
        $uid = $_SESSION['uid'];
    } else {
        die ("invalid session user id");
    }

    require_once 'connection.php';
    
    header("Content-Type:application/json");

    if (isset($_GET['uid']) && !empty($_GET['uid'])) {
        $userid = $_GET['uid'];

    $conn = openConnection();
        
    if (!isset($conn))
        die("Connection object is invalid");

    $sql = "select * from ta_user ";
        
    if (isset($userid) && $userid > 0) 
        $sql = $sql . "where id=" . $userid;

    $sql = $sql . ";";

    error_log($sql . PHP_EOL);

    $result_get_user = $conn->query($sql);

    if ($result_get_user) {
        while ($row = $result_get_user->fetch_assoc()) {
            $data_get_user[] = $row;
        }

        echo json_encode($data_get_user);
    }

    $conn->close();
?>