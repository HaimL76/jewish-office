<?php
    require_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
        die ("request is not a post method");
    
    header("Content-Type:application/json");

    $sys_id = 'sys_id';
    $name = 'name';

    $sysid = $_POST[$sys_id];
    $bname = $_POST[$name];

    if (isset ($sysid) && $sysid > 0 && isset($bname) && $bname != '') {
        $conn = openConnection();
        
        if ($conn == null)// || $conn.empty())
            die("Connection object is invalid");

        //echo json_encode($conn);

        $sql = "insert into ta_user (sys_id, name) values (" + $sysid + ", '" + $bname + "');";
        
        error_log($sql . PHP_EOL);

        $result = $conn->query($sql);

        echo $result;

        $conn->close();
    }
?>