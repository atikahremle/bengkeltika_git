<?php
session_start();
extract ($_SESSION);
include "./config.php";

if(isset($_POST["submit"])){
    $wardname=$_POST["wardname"];
    $wardnumber=$_POST["wardnumber"];
    $level=$_POST["level"];
    $sql="INSERT INTO ward (ward_name, ward_no, level) VALUES ('$wardname','$wardnumber','$level');";

   if ($conn->query($sql)) {
        echo "<script language=\"javascript\" type=\"text/javascript\">
        <!--
        alert(\"Record have been saved.\");
        window.location ='adminregward.php';
                    //-->
    </script>";
} else {
    echo "<script language=\"javascript\" type=\"text/javascript\">
        <!--
        alert(\"Ward No Already Exist.!\");
        window.location ='adminregward.php';
                    //-->
    </script>";
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

    <title>iMenu Admin - Admin Register</title>

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
                <a class="navbar-brand" href="adminhome.">iMenu Admin</a>
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
                    <li class="active">
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
                        <small> Ward Registration</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Registration </li>   
                            <li class="active">
                                <i class="fa fa-edit"></i> Ward </li> 
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
                    <form action="adminregward.php" method="post" name="formID" id="formID" required="required" role="form"> 
                        <div class="form-group">
                            <label for="wardname">Ward Name</label>
                            <input type="text" class="form-control" name="wardname" id="wardname" required="required" placeholder="Ward Name">
                        </div>
                        <div class="form-group">
                            <label for="wardnumber">Ward Number</label>
                            <input type="text" class="form-control" name="wardnumber" id="wardnumber" required="required" placeholder="Ward Number">
                        </div>
                        <div class="form-group">
                            <label for="level">Ward Level</label>
                            <input type="text" class="form-control" name="level" id="level" required="required" placeholder="Level">
                        </div>
                        <input type="submit" class="btn btn-success" name="submit" value="Submit">
                        <button class="btn btn-default">Reset</button>
                    </form>  
                    </div>
                    <div class="col-lg-12">
                    <h2>Ward List</h2> 
                         
  <table class="table table-bordered table-hover table-striped">
    <tr>
        <td width="24"><div align="center">#</div></td>
        <td width="226"><div align="center">WARD NAME</div></td>
        <td width="127"><div align="center">WARD NO</div></td>
        <td width="183"><div align="center">LEVEL</div></td>
     </tr>
      <?php
                    $sql = $conn->query("SELECT * FROM ward");                 
                    if($sql->num_rows > 0){
                        while($row = $sql->fetch_assoc()){
                            ?>
      <tr>
       <tr>
                                <td><?php echo $row['ward_no']; ?></td>
                                <td><?php echo $row['ward_name']; ?></td>
                                <td><?php echo $row['ward_no']; ?></td>
                                <td><?php echo $row['level']; ?></td>
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
