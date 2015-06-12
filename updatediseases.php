<?php
include "./config.php";
if(isset($_POST)){
	$id=$_POST['id'];
	$name=$_POST['dname'];
	$severity=$_POST['dseverity'];
	$details=$_POST['ddetails'];
	$sql="UPDATE disease SET dName='$name',dSeverity='$severity',dDetails='$details' WHERE idDisease='$id'";
	if($conn->query($sql)){
		header("Location: ./admindiseases.php");
    	die();
	}else{
		$conn->connect_error;
		header("Location: ./admindiseases.php");
	}
}else{
	header("Location: ./admindiseases.php");
}
?>