<?php
include "./config.php";
	$id=$_GET['id'];
	$sql="DELETE FROM patient WHERE patientID='$id'";
$conn->query($sql);
		echo("<SCRIPT language='javascript'> 
				window.alert('Patient has been deleted!');
				window.location='./listpatient.php'; 
			  </SCRIPT>");
?>