<?php
    //require_once 'users_api.php';
    require_once 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
        die ("request is not a post method");

    if (!isset($_POST)) 
        die ("no post parameters found");

    header("Content-Type:application/json");

    $username = $_POST["usr"];//$sys_id];
    $password = $_POST["pwd"];//$name];
  
    if (isset ($username) && $username != '' && isset ($password) && $password != '') {
        $conn = openConnection();
          
        if ($conn == null)// || $conn.empty())
            die("Connection object is invalid");

        $sql = "select * from ta_user where username = '" . $username . "';";

        error_log($sql . PHP_EOL);

        $result_get_user = $conn->query($sql);

        if ($result_get_user) {
            while ($row = $result_get_user->fetch_assoc()) {
                $userid = $_SESSION["uid"] = $row["id"];
            }

            //echo json_encode($data_get_user);
        } else {
            error_log("empty");
        }

        if (!isset($userid)) {
            $sql = "insert ta_user (username) values('" . $username . "');";

            $result = $conn->query($sql);
  
            if (!$result)
                die($conn->error);
        }
    }

    //echo "Hello, World!";// $data_get_book;
    $conn->close();
        //$_SESSION["favcolor"] = "green";
?>