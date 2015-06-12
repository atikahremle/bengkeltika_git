<?php
include "./config.php";
	$id=$_GET['id'];
	$sql="DELETE FROM meal WHERE mealID='$id'";
$conn->query($sql);
		echo("<SCRIPT language='javascript'> 
				window.alert('Meal has been deleted!');
				window.location='./adminmeals.php'; 
			  </SCRIPT>");
?>