<?php
// $link = mysql_connect('localhost', 'root', 'root');
// if (!$link)
// {
// 	$message='Could Not Connect : ' . mysql_error();
// }
// $db_selected = mysql_select_db('kitchen', $link);
// if (!$db_selected) 
// {
// 	$message='Cannot use application database : ' . mysql_error();
// }    
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "kitchen";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
?>