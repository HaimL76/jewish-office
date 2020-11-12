<?php
    //header('Content-type: text/plain; charset=utf-8');


    //DB Connectivity

	define('MYSQL_HOSTNAME', 'localhost');

	define('MYSQL_USERNAME', 'jewishof_tora_app');

	define('MYSQL_PASSWORD', '0A*g+,2;BF}C');

	define('MYSQL_DATABASE', 'jewishof_tora_app');



    // Create connection
	function openConnection()
	{
		//echo("Before connection\n");

		$conn = mysqli_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);

		//echo("After connection\n");

		mysqli_set_charset($conn,"utf8");

		// Check connection

		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
		}
		
		//echo(json_encode($conn));
		//echo('\n');

        return $conn;
    }
?>