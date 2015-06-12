<?php
include "./config.php";
	$id=$_GET['id'];
	$sql="DELETE FROM `order` WHERE `orderID`='$id'";
	$conn->query($sql);
echo("<SCRIPT language='javascript'> 
				window.alert('Your order has been delete');
				window.location='./nurseorder.php'; 
			  </SCRIPT>");

?>