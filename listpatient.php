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

    <title>iMenu Patient List</title>

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
                <a class="navbar-brand" href="nursehome.php">iMenu Nurse </a>
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
                        <a href="nurseregpatient.php"><i class="glyphicon glyphicon-user"></i> Register Patient</a></li>
<li>
<li class="active">
                        <a href="listpatient.php"><i class="fa fa-fw fa-table"></i>Patient List</a></li>
<li>
                        <a href="nurseorder.php"><i class="fa fa-fw fa-edit"></i>Menu Order</a></li>
<li>
                        
<!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Patient List
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li>
<i class="fa fa-dashboard"></i> Home / Patient List <div class="container-fluid">
  <h2></h2>
            
     <div class="col-lg-12">
                    <h2>Patient List </h2> 
                         
  <table class="table table-bordered table-hover table-striped">
 
      <tr>
        <th width="25%">NAME</th>
         
           <th width="15%">ROOM NUMBER</th>
           <th width="15%">WARD NUMBER</th>
              <th width="18%">ADMIT DATE</th>
              <th width="18%">DISCHARGE DATE</th>
        <th width="28%">PROCESS </th>
      </tr>
    </thead>
     <?php
    
                    $sql = $conn->query("SELECT * FROM patient p LEFT JOIN disease d ON p.idDisease = d.idDisease ");                 
                    if($sql->num_rows > 0){
                        while($row = $sql->fetch_assoc()){
                            ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
         
          <td><?php echo $row['room_no']; ?></td>
           <td><?php echo $row['ward_no']; ?></td>
        <td><?php echo $row['admitDate']; ?></td>
       <td> <?php echo $row['dischargeDate']; ?></td>
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

                      </ol>
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
