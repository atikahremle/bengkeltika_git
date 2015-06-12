<title>Update Patient</title>
<?php
include "./config.php";
if(isset($_POST)){
	$id=$_POST['id'];
	$room_no=$_POST["room_no"];
    $ward_no=$_POST["ward_no"];
    $diseaseID=$_POST["diseaseID"];
    $doc_name=$_POST["doc_name"];
    $date=$_POST["dischargeDate"];
	$sql="UPDATE patient SET room_no='$room_no',ward_no='$ward_no',idDisease='$diseaseID',doc_name='$doc_name',dischargeDate='$date' WHERE patientID='$id'";
	if($conn->query($sql)){
		header("Location: ./nurseregpatient.php");
    	die();
	}else{
		$conn->connect_error;
		header("Location: ./nurseregpatient.php");
	}
}else{
	header("Location: ./nurseregpatient.php");
}
?>