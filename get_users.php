<?php
    require_once 'connection.php';
    
    header("Content-Type:application/json");

    $user_id = 'user_id';

    $userid = $_GET[$user_id];

        $conn = openConnection();
        
        if ($conn == null)// || $conn.empty())
            die("Connection object is invalid");

        //echo json_encode($conn);

        $sql = "select * from ta_user ";
        
        if (isset($userid) && $userid != "") {
            //echo $userid;
            $sql = $sql . "where id=" . $userid;
        }

        $sql = $sql . ";";

        error_log($sql . PHP_EOL);

        $result_get_user = $conn->query($sql);

        while ($row = $result_get_user->fetch_assoc()) {
            //echo json_encode($row) . PHP_EOL;
            $data_get_user[] = $row;
        }

        echo json_encode($data_get_user);
        //echo "Hello, World!";// $data_get_user;
        $conn->close();
?>