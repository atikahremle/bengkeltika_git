<?php
include "./config.php";
	$id=$_GET['id'];
	$sql="DELETE FROM disease WHERE idDisease='$id'";
	$conn->query($sql);
		echo("<SCRIPT language='javascript'> 
				window.alert('Disease has been delete');
				window.location='./admindiseases.php'; 
			  </SCRIPT>");
	
?>