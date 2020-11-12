<?php
	//include 'connection.php';
	require_once 'connection.php';

    $conn = openConnection();
    
    if ($conn == null)// || $conn.empty())
        die("Connection object is invalid");

    //echo json_encode($conn);

//	$sql = "SELECT * FROM tabel_name WHERE userid='" . $user_id . "';";
//	$result_get_user = $conn->query($sql);

//	while ($row = $result_get_user->fetch_assoc()) {
//		$data_get_user[] = $row;
//	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tora</title>
</head>
<body>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, deserunt non quos, illo rem tenetur fuga placeat iusto tempore reiciendis, maxime alias libero molestiae exercitationem? Sint quo autem veniam vitae!
</body>
</html>
