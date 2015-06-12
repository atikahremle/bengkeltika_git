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
                      <li class="active">
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

          <div class="row">

            <div class="col-lg-12">
            <h2>Admission Guide</h2>
            <img src="img/pantai hospital.jpg" width="100%">
                <h4> Admission and Discharge</h4>
                Admission & Discharge For in-patient and day surgery admissions, please contact our Reception Counter at the main hospital lobby between 7:00 am and 9:00 pm daily. Admissions after these hours are performed at our Emergency Department. Please check-in to the hospital at the appointed time as requested by your doctor.
                <h4> For Surgical Patients</h4>
                * If your minor surgery is scheduled on the day of the admission, please check-in to the hospital 4 hours prior to the surgery time.<br>
                * If you are undergoing a major surgery, you are required tobe admitted one day before the surgery.
                <h4> Deposits*</h4>
                <p>On admission, you will be required to pay a deposit and you may do so by cash or credit card, or present a guarantee letter acceptable by the hospital.	
                  <br>*Applicable to selected hospitals only.</p>
                  <h4>Valuables</h4>
                  Patients are reminded not to keep a large sum of money,jewelry and other valuables during their stay in the hospital, as the hospitalcannot be held responsible for the loss of any items.
                  <h4>Visiting Hours</h4>
                  Visitors are allowed until 10:00 pm. Children below 12 yearsold are not encouraged to visit the hospital. This is for infection controlpurposes.
                  <h4>Personal Items</h4>
                  Please bring your pyjamas or night dress, toiletries, etc.as the hospital does not provide these items.
                  <h4>Discharge</h4>
                  Your doctor will certify your discharge. We need a lead timeof about one to two hours to process your prescriptions and bills. When thebill is ready, the ward staff will inform you and a discharge slip will begiven for you to settle your bill.
                  <div class="panel-body"></div>
              </div>
          </div>
          <!-- /.row -->

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
