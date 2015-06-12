<?php
session_start();
extract ($_SESSION);
include "./config.php";
if(isset($_POST["submit"])){
	$name=$_POST["name"];
	$details=$_POST["details"];
	$register=$_POST["register"];
	$date=$mysqldate = date( 'Y-m-d H:i:s', time());
	$type=$_POST["type"];
	$mealtime=$_POST["mealtime"];
	$dSeverity=$_POST["dSeverity"];
	//$image=$_POST["uploadedfile"];
	
	$target_dir = "./upload/";
	$target_file = $target_dir . basename($_FILES["uploadedfile"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["uploadedfile"]["tmp_name"]);
	if($check !== false) {
		
		$uploadOk = 1;
	} else {
		
		$uploadOk = 0;
	}

	$sql="INSERT INTO meal (mealName, details, registerBy, date, type, mealtime, dSeverity, image, path) VALUES ('$name','$details','$register','$date','$type','$mealtime','$dSeverity','".$_FILES['uploadedfile']['name']."','".$target_file."');";

	if ($conn->query($sql)) {
		echo "<script language=\"javascript\" type=\"text/javascript\">
		<!--
		alert(\"Record have been saved.\");
		window.location ='adminmeals.php';
		//-->
	</script>";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$target_path = "upload/";
$new_path = $target_path .basename($_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $new_path)) {
	$valid_formats = array("jpg","bmp","jpeg","gif","png");
} 
else{
	echo $target_path . "-". $_FILES['uploadedfile']['error'];
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

	<title>iMenu Admin - Meals</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/plugins/morris.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
				<a class="navbar-brand" href="index.php">iMenu Admin</a>
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
						<a href="adminhome.php"><i class="glyphicon glyphicon-home"></i> Home</a>
					</li>
					<li>
						<a href="adminregnurse.php"><i class="fa fa-fw fa-user"></i> Register Nurse</a>
					</li>
					<li>
						<a href="adminregchef.php"><i class="fa fa-fw fa-table"></i> Register Chef</a>
					</li>
					<li>
						<a href="adminregward.php"><i class="fa fa-fw fa-edit"></i> Register Ward</a>
					</li>
					<li>
						<a href="admindiseases.php"><i class="glyphicon glyphicon-pushpin"></i> Diseases</a>
					</li>
					<li  class="active">
						<a href="adminmeals.php"><i class="fa fa-fw fa-cutlery"></i> Meals</a>
					</li>
					<li>
						<a href="adminupload.php"><i class="fa fa-fw fa-desktop"></i> Pictures</a>
					</li>
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
							<small>Register Item</small>
						</h1>
						<ol class="breadcrumb">
							<li class="active">
								<i class="fa fa-dashboard"></i> Dashboard
							</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="./adminmeals.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Item Name</label>
								<div class="col-sm-5">
									<input type="text" name="name" class="form-control" id="name" required="required" placeholder="Example: Porridge">
								</div>
							</div>
							<div class="form-group">
								<label for="details" class="col-sm-2 control-label">Item Details</label>
								<div class="col-sm-5">
									<textarea name="details" class="form-control" id="details" required="required" placeholder="Example: This food..."></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="register" class="col-sm-2 control-label">Registered By</label>
								<div class="col-sm-5">
									<input type="text" name="register" class="form-control" id="register" required="required" placeholder="By : Admin Name">
								</div>
							</div>

							<div class="form-group">
								<label for="type"class="col-sm-2 control-label">Item Type</label>
								<div class="col-sm-5">
									<select class="form-control" name="type" id="type">
										<option value="Food">Food</option>
										<option value="Beverage">Beverage</option>
										<option value="Dessert">Dessert</option>
										<option value="Fruit">Fruit</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="type"class="col-sm-2 control-label">Meal  Time</label>
								<div class="col-sm-5">
									<select class="form-control" name="mealtime" id="mealtime">
										<option value="all">All</option>
										<option value="breakfast">Breakfast</option>
										<option value="lunch">Lunch</option>
										<option value="dinner">Dinner</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="dSeverity"class="col-sm-2 control-label">Code Risk Food</label>
								<div class="col-sm-5">
									<select class="form-control" name="dSeverity">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="uploadedfile" class="col-sm-2 control-label">Picture</label>
								<div class="col-sm-5">
									<input class="validate[required] text-input" name="uploadedfile" type="file" />
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" name="submit" value="submit" class="btn btn-info">Save</button>
										<button class="btn btn-default">Reset</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th width="20%">Item Name</th>
								<th width="22%">Details</th>
								<th width="20%">Item Type</th>
								<th width="20%">Code Risk</th>
								<th width="22%">Process</th>
							</tr>
							<?php
							$sql = $conn->query("SELECT * FROM meal");                 
							if($sql->num_rows > 0){
								while($row = $sql->fetch_assoc()){
									?>
									<tr>
										<td><?=$row['mealName'];?></td>
										<td><?=$row['details'];?></td>
										<td><?=$row['type'];?></td>
										<td><?=$row['dSeverity'];?></td>
										<td>
											<a href="./editmeals.php?id=<?=$row['mealID']?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
											<a href="./deletemeals.php?id=<?=$row['mealID']?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
										</td>
									</tr>
									<?php
								}
							}
							?>
						</table>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- /#page-wrapper -->

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
