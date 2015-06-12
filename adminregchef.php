<?php
session_start();
extract ($_SESSION);
include("config.php");
//if submitted the form
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$chefID = $_POST['chefID'];
	$ic_num = $_POST['ic_num'];	
	$password = md5($_POST['ic_num']);
	
	$sql = "INSERT INTO user (userID, name, ic_num, position, password) VALUES ('$chefID', '$name', '$ic_num', 'chef', '$password')";
	if ($conn->query($sql)) {
    echo "<script language=\"javascript\" type=\"text/javascript\">
					<!--
					alert(\"Record have been saved.\");
					window.location ='adminregchef.php';
					//-->
	</script>";
	} else {
    echo "<script language=\"javascript\" type=\"text/javascript\">
        <!--
        alert(\"Chef ID Already Exist!\");
        window.location ='adminregchef.php';
                    //-->
    </script>";
	}
mysqli_close();
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

    <title>iMenu Admin -  Admin Register</title>

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
                <a class="navbar-brand" href="index.php">iMenu Admin </a>
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
                    <li class="active">
                        <a href="adminregchef.php"><i class="fa fa-fw fa-table"></i> Register Chef</a>
                    </li>
                    <li>
                        <a href="adminregward.php"><i class="fa fa-fw fa-edit"></i> Register Ward</a>
                    </li>
                     <li>
                        <a href="admindiseases.php"><i class="fa fa-fw fa-cutlery"></i> Diseases</a>
                    </li>
                    <li>
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
                         <small>Chef Registration</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Registration </li>   
                            <li class="active">
                                <i class="fa fa-table"></i> Chef </li> 
                      </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row"></div>
                <!-- /.row -->

                <div class="row"></div>
                <!-- /.row -->

              <div class="row"></div>
          <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                    <form action="adminregchef.php" method="post" name="formID" id="formID" required="required" role="form">
                        <div class="form-group">
                            <label for="name">CHEF NAME</label>
                            <input type="text" class="form-control" name="name" id="name" required="required" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="username">CHEF ID</label>
                            <input type="text" class="form-control" name="chefID" id="chefID" required="required" placeholder="Chef ID">
                        </div>
                        <div class="form-group">
                            <label for="no_ic">IC NUMBER</label>
                            <input type="text" class="form-control" name="ic_num" id="ic_num" required="required" placeholder="XXXXXX-XX-XXXX">
                        </div>
                        <input type="submit" class="btn btn-success" name="submit" value="Submit">
                        <button class="btn btn-default">Reset</button>
                    </form>
                    
                    
                    </div>
                  <div class="col-lg-6">
                    <h2>Chef List In Database</h2> 
                    <form role="form">           
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th align="center">CHEF NAME</th>
        <th align="center">CHEF ID</th>
        <th align="center">IC NUMBER</th>
      </tr>
    </thead>
    
    			   <?php
			$sql = $conn->query("SELECT * FROM user WHERE position = 'chef'");					
		    while($row = $sql->fetch_assoc()){
	 		  ?>
          <tr>
      		  <td><?php echo $row['name']; ?></td>
       		  <td><?php echo $row['userID']; ?></td>
        	  <td><?php echo $row['ic_num']; ?></td>
     	 </tr>
    <?php
	 }
	 ?>
  </table>
  </form>
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
