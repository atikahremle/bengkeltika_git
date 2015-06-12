<?php
session_start();
extract ($_SESSION);
ob_start();
include "./config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iMenu - Diseases</title>

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
                        <a href="nurseorder.php"><i class="fa fa-fw fa-edit"></i>Order</a></li>
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
                                Update Patient 
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <?php
                    $id=$_GET["id"];
                    $sql = $conn->query("SELECT * FROM patient WHERE patientID = '$id'");          
					$sqlWard = $conn->query("SELECT * FROM ward");
					$sqlD = $conn->query("SELECT * FROM disease");   
                    if($sql->num_rows > 0){
                        while($row = $sql->fetch_assoc()){
                    ?>
        <div class="row">
            <div class="col-md-12">
               <form action="./updatepatient.php"method="post" name="formID" id="formID" role="form">
                       
                        <div class="form-group">
                            <label for="room_no">Room Number</label>
                            <input type="text" name="room_no"  class="form-control" id="room_no" value="<?=$row['room_no']?>" placeholder="Room Number">
                        </div>
                        <div class="form-group">
                            <label for="ward_no">Ward Number</label>
                            <select class="form-control" name="ward_no" id="ward_no" value="<?=$row['ward_no']?>">
                            <?php
							if($sqlWard->num_rows > 0){
                            while($rowW = $sqlWard->fetch_assoc()){
							?>
                         			<option value="<?=$rowW['ward_no'];?>" <?php if($row['ward_no']==$rowW['ward_no']){echo "selected";}?>><?=$rowW['ward_no'];?> - <?=$rowW['ward_name'];?></option>
                            <?php
							}
							}
                            ?>
                                    </select>
                        </div>
                     
    					<div class="form-group">
    					  <label for="diseaseID">Type of Disease</label>
      						<select class="form-control" name="diseaseID" id="diseaseID">
                            <?php
							if($sqlD->num_rows > 0){
                            while($rowD = $sqlD->fetch_assoc()){
							?>
      						  <option value="<?=$rowD['idDisease'];?>" <?php if($row['idDisease']==$rowD['idDisease']){echo 'selected';} ?>><?=$rowD['dName'];?></option>
							<?php }} ?>
                                 
      </select></div>
       <div class="form-group">
                            <label for="doc_name">Doctor Name</label>
                            <input type="text"name="doc_name" class="form-control" id="doc_name" value="<?=$row['doc_name']?>" placeholder="Doctor Name">
                        </div>
      <div class="form-group">
                        	<label for="dischargeDate"> Discharge Date</label>
                            <input type="date" class="form-control"  name="dischargeDate" id="dischargeDate" value="<?=$row['dischargeDate']?>">
                        </div>
                        </div>
                                          
    <div class="form-group">
                    <div class="form-group">
                     <input type="hidden" name="id" value="<?=$row['patientID']?>">
                    <button type="submit" name="submit" value="submit" class="btn btn-info">Update</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

                            
                    <?php
                        }
                    }
                    ?>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
