<?php
session_start();
extract ($_SESSION);
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iMenu Nurse Order Menu</title>

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
                     <li>
                        <a href="nurseregpatient.php"><i class="glyphicon glyphicon-user"></i> Register Patient</a></li>
<li>
                        <a href="listpatient.php"><i class="fa fa-fw fa-table"></i>Patient List</a></li>
<li class="active">
                        <a href="nurseorder.php"><i class="fa fa-fw fa-edit"></i>Menu Order</a></li>
<li>
                    
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order Menu</h1>
                  <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home / Order </a>
                            </li>
                           
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

              <div class="row">
                    <div class="col-lg-6">
                    
                        <h3>Search Patient</h3>
                         <div class="form-search">
                   <form action="nurseorder.php" method="post">
  
  <p align="center">
    <input type="text" name="name" id="name" />
    <input type="submit" name="submit" value="Search" />
  </p>
</form>
<?php if(isset($_POST['submit']))
    {
        if(empty($_POST['name'])){
        echo "<center>Please Insert Name Again</center>";}
    else {
        if(isset($_POST['name'])&& !empty($_POST['name']))
    {
    require 'config.php';   
    $name = $_POST['name'];
    $query="SELECT * FROM patient JOIN disease ON patient.idDisease=disease.idDisease WHERE name LIKE '%" . $name . "%'";
    $sql = $conn->query($query); ?>
    <?php if(!$sql)
    {
     echo "<center>No Record</center>";
     }
     ?>
    <table align="center" border="0" >
    <tr>
    <td width="900">
    <?php while($row = $sql->fetch_assoc()){
        $patientID = $row['patientID'];
        ?>                               
       <?php if($sql ==true){?> 
       
   
   <table class="table table-bordered table-hover table-striped">
      <tr>
        <td width="258" align="center" class="style5">NAME</td>
        <td width="170" align="center" class="style5">IC NUMBER</td>
     <td width="170" align="center" class="style5">DISEASE</td>

     
        </tr>
      <tr>
        <td style="text-transform:uppercase" align="center"> <a href="ordermenu.php?id=<?php echo $row{'patientID'}?>"> <span style="text-transform:uppercase"><?php echo $row{'name'};?></span> </a></td>
        <td style="text-transform:uppercase" align="center"><span style="text-transform:uppercase"><?php echo $row{'ic_num'};?></span></td>
        <td align="center" style="text-transform:uppercase"><span style="text-transform:uppercase"><?php echo $row{'dName'};?></span></td>
        </tr>
        <?php }}} ?>
    </table>
</table>
    <p>
     <?php } } ?>
    </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
                        
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script>
function myFunction() {
    document.getElementById("admitDate").step = "2";
    document.getElementById("demo").innerHTML = "Step was set to '2', meaning that the user can only select every second day in the calendar.";
}
</script>
</div>
 
</body>
</html>