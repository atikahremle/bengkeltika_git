<?php
include("config.php");
$orderId=$_POST['orderId'];
$sql="UPDATE `order` SET `status`='confirm' WHERE `orderID`='$orderId'";
$conn->query($sql);
echo("<SCRIPT language='javascript'> 
				window.alert('Your order has been confirmed!');
				window.location='./nurseorder.php'; 
			  </SCRIPT>");
?>