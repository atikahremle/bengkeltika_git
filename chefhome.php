<?php
session_start();
extract ($_SESSION);
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iMenu Chef - Chef </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
                <a class="navbar-brand" href="chefhome.php">iMenu Chef</a>
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
<li class="active">
                       <a href="chefhome.php"><i class="glyphicon glyphicon-home"></i> Home</a>                    </li>
<li>
                        <a href="chefmenu.php"><i class="glyphicon glyphicon-th-list"></i> Menu Order</a></li>

<li>
                        <a href="chefreport.php"><i class="fa fa-fw fa-edit"></i>Report</a></li>

                         
<!-- /.navbar-collapse -->
</nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Chef Homepage
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="chefhome.php">Home</a>
                            </li>
                            <li class="active"></li>
                      </ol>
                                              <div class="row">
                                              <div class="col-lg-3 col-md-6">
                                              </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-red">
                                                        <div class="panel-heading">
                                                            <div class="row">
                                                                <div class="col-xs-3">
                                                                    <i class="fa fa-cutlery fa-5x"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-right">
                                                                    <div>Menu Order</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="chefmenu.php">
                                                            <div class="panel-footer">
                                                                <span class="pull-left">Menu</span>
                                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="panel panel-green">
                                                        <div class="panel-heading">
                                                            <div class="row">
                                                                <div class="col-xs-3">
                                                                    <i class="fa fa-tasks fa-5x"></i>
                                                                </div>
                                                                <div class="col-xs-9 text-right">
                                                                    <div>Report</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="chefreport.php">
                                                            <div class="panel-footer">
                                                                <span class="pull-left">Report Order</span>
                                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </a>
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

</body>

</html>
