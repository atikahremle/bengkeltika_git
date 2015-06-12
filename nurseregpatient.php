<?php
session_start();
extract ($_SESSION);
include("config.php");
//if submitted the form
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$ic_num = $_POST['ic_num'];
	$room_no = $_POST['room_no'];
	$ward_no = $_POST['ward_no'];
	$dName = $_POST['dName'];
	$doc_name = $_POST['doc_name'];
	$admitDate =$_POST['admitDate'];
    $idDisease =$_POST['dName'];
	
	$sql="INSERT INTO patient (name, idDisease, ic_num, room_no, ward_no, doc_name, admitDate)VALUES ('$name','$idDisease' , '$ic_num', '$room_no', '$ward_no', '$doc_name', '$admitDate')";
if($name == ""){ 
		$error="<p style='color:#F00'>Please Insert Patient Name</p>";
		}
	else if($ic_num == ""){
		$error="<p style='color:#F00'>Insert Ic Number";
		}
   else if ($conn->query($sql)) {
        echo "<script language=\"javascript\" type=\"text/javascript\">
        <!--
        alert(\"Record have been saved.\");
        window.location ='nurseregpatient.php';
					//-->
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iMenu-Nurse Register Patient</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="nursehome.php">iMenu Nurse</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo ucwords($_SESSION['name']);?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                       <a href="nursehome.php"><i class="glyphicon glyphicon-home"></i> Home</a>                    </li>
                    <li>
                     <li class="active">
                        <a href="nurseregpatient.php"><i class="glyphicon glyphicon-user"></i> Register Patient</a></li>
<li>
                        <a href="listpatient.php"><i class="fa fa-fw fa-table"></i>Patient List</a></li>
<li>
                        <a href="nurseorder.php"><i class="fa fa-fw fa-edit"></i>Menu Order</a></li>
<li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Register Patient
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Home / Register Patient <div class="container-fluid">
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
       
          <div class="row">
          
          <div class="col-md-12">
                    <form action="./nurseregpatient.php" method="post" name="formID" id="formID" role="form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required="required" placeholder="Patient Name">
                        </div>
                        <div class="form-group">
                            <label for="ic_num">Ic Number</label>
                            <input type="text" name="ic_num" class="form-control" id="ic_num" required="required" placeholder="XXXXXX-XX-XXXX">
                        </div>
                        <div class="form-group">
                            <label for="room_no">Room Number</label>
                            <input type="text" name="room_no"  class="form-control" id="room_no" required="required" placeholder="Room Number">
                        </div>
                        <div class="form-group">
                            <label for="ward_no">Ward Number</label>
                            <select class="form-control" name="ward_no">
                                                   <?php
                                                   $level = $conn->query("SELECT * FROM ward");
                                                   while($getList = $level->fetch_assoc())
                                                   {
                                                       $ward_no=$getList['ward_no'];
                                                       print "<option>$ward_no</option>";
                                                   }
                                                   ?>
                                               </select>
                        </div>
                     
    					<div class="form-group">
    					  <label for="dName">Type of Disease</label>
      						<select class="form-control" name="dName" id="dName">
      					
                                                   <?php
                                                   $level = $conn->query("SELECT * FROM disease");
                                                   while($getList = $level->fetch_assoc())
                                                   {
                                                       $dName=$getList['dName'];
                                                       print "<option value='".$getList['idDisease']."'>$dName - ".$getList['dSeverity']."</option>";
                                                   }
                                                   ?>
                                               </select>
                                               </div>
       <div class="form-group">
                            <label for="doc_name">Doctor Name</label>
                            <input type="text"name="doc_name" class="form-control" id="doc_name" required="required" placeholder="Doctor Name">
                        </div>
      <div class="form-group">
                        	<label for="admitDate"> Admit Date</label>
                            <input type="date" name="admitDate" class="form-control"  id="admitDate">
                        </div>
                        </div>
                                           <input type="submit" class="btn btn-success" name="submit" value="Submit">
                                           <button class="btn btn-default">Reset</button>
                                       </form>
                                       </div>
                                       
           <div class="col-lg-12">
                    <h2>Patient List </h2>         
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th width="31%">NAME</th>
        <th width="22%">IC NUMBER</th>
        <th width="22%">ADMIT DATE</th>
        <th width="27%">DISCHARGE DATE  </th>
         <th width="27%">PROCESS </th>
      </tr>
    </thead>
     <?php
                    $sql = $conn->query("SELECT * FROM patient");                 
                    if($sql->num_rows > 0){
                        while($row = $sql->fetch_assoc()){
                            ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['ic_num']; ?></td>
        <td><?php echo $row['admitDate']; ?></td>
        <td><?php echo $row ['dischargeDate']; ?></td>
        <td>
        <a href="./editpatient.php?id=<?=$row['patientID']?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
                                   
      </tr>
       
       </td>
                            </tr>
                            <?php
                        }
                    }else{?>
                    <tr><td colspan="3">No record</td></tr>
                    <?php }
                    ?>
                </table>
            </div>
        </div>
                        
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script>
function myFunction() {
    document.getElementById("admitDate").step = "2";
    document.getElementById("demo").innerHTML = "Step was set to '2', meaning that the user can only select every second day in the calendar.";
}
</script>
</div>
</body>

</html>
