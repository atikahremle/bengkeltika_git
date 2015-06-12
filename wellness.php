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
                         <a href="./index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li>
                      <a href="hospital.php"><i class="glyphicon glyphicon-plus"></i> Our Hospital</a>
                    </li>
                      <li>
                      <a href="guide.php"><i class="fa fa-fw fa-edit"></i> Admission Guide</a>
                    </li>
                    <li class="active">
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
   
  
  <img src="img/img_center_excellence (1).jpg" width="100%"></div>

                           
                          <div> <h5>ONCOLOGY (Cancer Centre)</h5>
<h5>CARDIOLOGY & CARDIOTHORACIC SURGERY (Heart Centre, For Adult & Children)</h5>
<h5>ORTHOPAEDIC (Bone & Joint, Hand & Microsurgery Centre)</h5>
<h5>OBSTETRIC & GYNAECOLOGY (Women’s Health) </h5>
<h5>UROLOGY (Men’s Health)</h5>
<h5>NEUROLOGY & NEUROSURGERY</h5>
<h5>COSMETIC & RECONSTRUCTIVE SURGERY </h5>
<h5>GASTROENTEROLOGY</h5>
<h5>PAIN MANAGEMENT</h5>
</h5></div>
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
