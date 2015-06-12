<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iMenu For Kitchen Order System</title>

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
                <a class="navbar-brand" href="index.php">iMenu For Kitchen Order System</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                   <?php if(!isset($_SESSION['username'])){ echo "<a href='login.php' class='login-window'>LOGIN</a>"; } else echo "<a href='logout.php'>LOG KELUAR</a>"; ?>
                    <ul class="dropdown-menu">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   <li>
                   <li>
                         <a href="./index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li class="active">
                      <a href="hospital.php"><i class="glyphicon glyphicon-plus"></i> Our Hospital</a>
                    </li>
                      <li>
                      <a href="guide.php"><i class="fa fa-fw fa-edit"></i> Admission Guide</a>
                    </li>
                    <li>
                      <a href="wellness.php"><i class="glyphicon glyphicon-tasks"></i>Wellness</a>
                    </li>
                    <li>
                      <a href="gallery.php"><i class="fa fa-fw fa-desktop"></i> Gallery</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                
                <!-- /.row -->

                <!-- Flot Charts -->
                <div class="row">
                    <div class="col-lg-12">
                      <p class="lead">&nbsp;</p>
                  </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                                <h3 class="panel-title"><i class=""></i></h3>
                          </div>
                           
                               <td colspan="3"><strong></strong></td>
                             </tr>
       <p><!-- Single button -->
   <div class="col-lg-12">
            <h2>Our History</h2>
<img src="img/pantai hospital.jpg" width="100%">
</div>
                          <div> <br>Pantai Hospital Ayer Keroh was established in 1986 but moved to its present premises in August 1995. Its present location, just 5 km from the <br>Ayer Keroh toll interchange in the Historical Town of Malacca, serves as a strategic contact point for the state’s residents as well as those from the neighbouring areas. 

<br>The hospital unveiled its new wing in late 2001 as an expansion of its services. Today, Pantai Hospital Ayer Keroh, with 250 beds and more than 60 specialists, boasts a wide range of medical services and facilities, in line with the state’s booming socio-economic growth.

<br>A dedicated team of healthcare providers and advanced medical facilities ensure that services provided meet patient expectations and conform to the government’s call to develop medical tourism. 

<br>Committed to patient comfort and wholesome healing, Pantai Hospital Ayer Keroh is poised to become a healthcare of choice for patients in the southern region and medical tourists who want a perfect combination of treatment and holidays.</div>
                            <div class="panel-body"></div>
                      </div>
                    </div>
                </div>
               

              <div class="row"></div>
                <!-- /.row -->

                <!-- Morris Charts -->
              <div class="row"></div>
                <!-- /.row -->

              <div class="row"></div>
                <!-- /.row -->

              <div class="row"></div>
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

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>

</body>

</html>
