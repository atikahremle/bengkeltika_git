<?php
include "./config.php";
if(isset($_POST)){
	$id=$_POST['id'];
	$name=$_POST["name"];
    $details=$_POST["details"];
    $type=$_POST["type"];
 	$code=$_POST["code"];
	$sql="UPDATE meal SET mealName='$name',details='$details',type='$type',code='$foodCode' WHERE mealID='$id'";
	if($conn->query($sql)){
		header("Location: ./adminmeals.php");
    	die();
	}else{
		$conn->connect_error;
		header("Location: ./adminmeals.php");
	}
}else{
	header("Location: ./adminmeals.php");
}
?>