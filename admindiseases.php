<?php
session_start();
extract ($_SESSION);
ob_start();
include "./config.php";

if(isset($_POST["submit"])){
    $name=$_POST["dname"];
    $severity=$_POST["dseverity"];
    $details=$_POST["ddetails"];
    $sql="INSERT INTO disease (dName, dSeverity, dDetails) VALUES ('$name','$severity','$details');";

   if ($conn->query($sql)) {
        echo "<script language=\"javascript\" type=\"text/javascript\">
        <!--
        alert(\"Record have been saved.\");
        window.location ='admindiseases.php';
                    //-->
    </script>";
} else {
    echo  "<script language=\"javascript\" type=\"text/javascript\">
        <!--
        alert(\"Data already have.!\");
        window.location ='admindiseases.php';
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

    <title>iMenu Admin - Diseases</title>

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
                        <li class="active">
                            <a href="admindiseases.php"><i class="glyphicon glyphicon-pushpin"></i> Diseases</a>
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
                                Register Disease
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                          <div id="container">
                            <div class="one-third-big-main">
                             
                           
                        </div>
                        <!--sidehost--><!--end sidehost-->
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                          <tr>
                            <th width="31%">DISEASE NAME</th>
                            <th width="27%">DISEASE SEVERITY (for Meal ONLY)</th>
                            <th width="22%">DISEASE DETAILS</th>
                            <th width="22%">ACTION</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = $conn->query("SELECT * FROM disease");                 
                    if($sql->num_rows > 0){
                        while($row = $sql->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['dName']; ?></td>
                                <td><?php echo $row['dSeverity']; ?></td>
                                <td><?php echo $row['dDetails']; ?></td>
                                <td>
                                    <a href="./editdiseases.php?id=<?=$row['idDisease']?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
                                    <a href="./deletediseases.php?id=<?=$row['idDisease']?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
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
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <form action="./admindiseases.php" method="POST" class="form-horizontal">
                  <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Disease Name</label>
                      <div class="col-sm-5">
                          <input type="text" name="dname" class="form-control" id="name" required="required" placeholder="Example: Athma">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="severity" class="col-sm-2 control-label">Disease Severity</label>
                      <div class="col-sm-5">
                          <input type="text" name="dseverity" class="form-control" id="severity" required="required" placeholder="Example: A">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="details" class="col-sm-2 control-label">Disease Details</label>
                      <div class="col-sm-5">
                            <textarea name="ddetails" class="form-control" id="details" required="required" placeholder="Example: This disease..."></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" value="submit" class="btn btn-info">Save</button>
                  </div>
              </div>
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

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>
<!--validation site-->
<script>
    function validate()
    {
      var confirmMessage="Delete Record ?!";

      if(confirm(confirmMessage)==false)
      {
          return false;
      }
    }
</script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
