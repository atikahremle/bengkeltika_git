<?php
session_start();
ob_start();
error_reporting(0);
if(!isset($_SESSION['name'])) {
  header("Location:nursehome.php");
}
require 'config.php';

if(isset($_POST["submit"])){
	
	$id=$_GET['id'];
	$sql="SELECT * FROM patient JOIN ward ON patient.ward_no=ward.ward_no WHERE patientID='$id'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){

     $date=$mysqldate = date( 'Y-m-d', time() );;
     $FoodBF=$_POST["FoodBF"];
     $BeverageBF=$_POST["BeverageBF"];
     $DessertBF=$_POST["DesertBF"];
     $FruitBF=$_POST["FruitBF"];
     $FoodL=$_POST["FoodL"];
     $BeverageL=$_POST["BeverageL"];
     $DessertL=$_POST["DesertL"];
     $FruitL=$_POST["FruitL"];
     $FoodD=$_POST["FoodD"];
     $BeverageD=$_POST["BeverageD"];
     $DessertD=$_POST["DesertD"];
     $FruitD=$_POST["FruitD"];
     $patientid=$row['patientID'];
     $confirm="request";
     $userID=$_SESSION["userID"];
     $sql="INSERT INTO `order` (`patientID`,`date`,`foodBreakfast`,`beverageBreakfast`,`dessertBreakfast`,`fruitBreakfast`,`foodLunch`,`beverageLunch`,`dessertLunch`,`fruitLunch`,`foodDinner`, `beverageDinner`,`dessertDinner`,`fruitDinner`,`status`,`userID`) VALUES ($patientid,'$date','$FoodBF','$BeverageBF','$DessertBF','$FruitBF','$FoodL','$BeverageL','$DessertL','$FruitL','$FoodD','$BeverageD','$DessertD','$FruitD','$confirm','$userID');";
     $conn->query($sql);
     $orderId=$conn->insert_id;
     echo $conn->error;
     unset($_POST);
     header("Location: ./listorder.php?id=".$row['patientID']."&date=".$date."&orderid=".$orderId);
     die();
   }}}
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
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="index.php">iMenu Nurse</a> </div>
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
                  <li> <a href="nursehome.php"><i class="glyphicon glyphicon-home"></i> Home</a> </li>
                  <li>
                    <li> <a href="nurseregpatient.php"><i class="glyphicon glyphicon-user"></i> Register Patient</a></li>
                    <li> <a href="listpatient.php"><i class="fa fa-fw fa-table"></i>Patient List</a></li>
                    <li class="active"> <a href="nurseorder.php"><i class="fa fa-fw fa-edit"></i>Menu Order</a></li>
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
                              <li> <i class="fa fa-dashboard"></i> Home / Order </a> </li>
                            </ol>
                          </div>
                        </div>
                        <!-- /.row -->
                        <div class="row">
                          <h3>Search Patient</h3>
                          <div class="row">
                            <div class="col-md-12">
                             <?php
                             $id=$_GET['id'];
                             $sql="SELECT * FROM patient JOIN ward ON patient.ward_no=ward.ward_no WHERE patientID='$id'";
                             $result=$conn->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_assoc()){
                                ?>
                                <form action="./ordermenu.php?id=<?php echo $row['patientID']?>" method="POST" class="form-horizontal">

                                  <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" id="name" value="<?php echo $row['name'];?>" size="50" readonly />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Ward No</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" id="name" value="<?php echo $row['ward_no'];?> - <?php echo $row['ward_name'];?>" size="50" readonly />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nurse Name</label>
                                    <div class="col-sm-5">
                                      <input type="hidden" name="userID" value="<?php echo $_SESSION['userID'];?>"/>
                                      <input type="text" class="form-control" id="name" value="<?php echo $_SESSION['name'];?> "size="50" readonly />
                                    </div>
                                  </div>
                                  <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                      <li role="presentation" class="active"><a href="#breakfast" aria-controls="breakfast" role="tab" data-toggle="tab">Breakfast</a>

                                      </li>
                                      <li role="presentation"><a href="#lunch" aria-controls="lunch" role="tab" data-toggle="tab">Lunch</a></li>
                                      <li role="presentation"><a href="#dinner" aria-controls="dinner" role="tab" data-toggle="tab">Dinner</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                      <div role="tabpanel" class="tab-pane active" id="breakfast">
                                       <div class="well">
                                          <h3>  <p>** Please choose only one meal for each category  </p> </h3>
                                          <div class="row">
                                          <h2>Food</h2>
                                          <?php getMainFoodBF(); ?>
                                          </div>

                                          <div class="row">
                                            <h2>Beverage</h2>
                                            <p>The form below contains three inline radio buttons:</p>
                                            <?php getBevarageBF(); ?> 
                                          </div>

                                          <div class="row">
                                            <h2>Dessert</h2>
                                            <p>The form below contains three inline radio buttons:</p>
                                            <?php getDesertBF(); ?>
                                          </div>

                                          <div class="row">
                                            <h2>Fruits</h2>
                                            <p>The form below contains three inline radio buttons:</p>
                                            <?php getFruitBF(); ?>
                                          </div>
                                      </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="lunch">
                                      <div class="well"><div class="container">
                                        <h3>  <p>** Please choose only one meal for each category  </p> </h3>
                                        <div class="row">
                                        <h2>Food</h2>

                                        <?php getMainFoodL(); ?>
                                        </div>

                                        <div class="row">
                                          <h2>Beverage</h2>
                                          <p>The form below contains three inline radio buttons:</p>
                                          <?php getBevarageL(); ?> 
                                          </div>

                                          <div class="row">
                                            <h2>Dessert</h2>
                                            <p>The form below contains three inline radio buttons:</p>
                                            <?php getDesertL(); ?>
                                            </div>

                                            <div class="row">
                                              <h2>Fruits</h2>
                                              <p>The form below contains three inline radio buttons:</p>
                                              <?php getFruitL(); ?>
                                              </div>


                                            </div></div></div>


                                            <div role="tabpanel" class="tab-pane" id="dinner">
                                             <div class="well"><div class="container">  
                                              <h3>  <p>** Please choose only one meal for each category  </p> </h3>        
                                              <h2>Food</h2>


                                              <?php getMainFoodD(); ?>
                                              <div>
                                                <h2>Beverage</h2>
                                                <p>The form below contains three inline radio buttons:</p>
                                                <?php getBevarageD(); ?> 

                                                <div>
                                                  <h2>Dessert</h2>
                                                  <p>The form below contains three inline radio buttons:</p>
                                                  <?php getDesertD(); ?>

                                                  <div>
                                                    <h2>Fruits</h2>
                                                    <p>The form below contains three inline radio buttons:</p>
                                                    <?php getFruitD(); ?>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>


                                                    <div class="form-group">
                                                      <div class="col-sm-offset-2 col-sm-10">
                                                         <button type="cancel" name="cancel" value="cancel" class="btn btn-warning">Cancel</button>
                                                          <button type="submit" name="submit" value="submit" class="btn btn-primary">Order</button>
                                                      </div>
                                                    </div></div>
                                                  </div>
                                                </div>
                                                <?php }} ?>
                                              </form>
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
                                        <?php
                                        function getBevarageBF(){
                                         require 'config.php';
                                         $sql="SELECT * FROM meal WHERE type ='Beverage'  and (mealtime='breakfast' or mealtime='all') ";
                                         $result=$conn->query($sql);
                                         if($result->num_rows > 0){
                                           while($row = $result->fetch_array()){
                                      
                                           echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..." style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="BeverageBF" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                                         
                                         }
                                       }
                                     }
                                     function getMainFoodBF(){	
                                       require 'config.php';
                                       $sql="SELECT * FROM meal WHERE type ='Food' and (mealtime='breakfast' or mealtime='all')";
                                       $result=$conn->query($sql);
                                       if($result->num_rows > 0){
                                         while($row = $result->fetch_array()){
                                            echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="FoodBF" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                                       }
                                     }
                                   }
                                   function getDesertBF(){	
                                     require 'config.php';
                                     $sql="SELECT * FROM meal WHERE type ='Dessert' and (mealtime='breakfast' or mealtime='all')";
                                     $result=$conn->query($sql);
                                     if($result->num_rows > 0){
                                       while($row = $result->fetch_array()){
                                          echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="DesertBF" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                                     }
                                   }
                                 }
                                 function getFruitBF(){	
                                   require 'config.php';
                                   $sql="SELECT * FROM meal WHERE type ='Fruit' and (mealtime='breakfast' or mealtime='all')";
                                   $result=$conn->query($sql);
                                   if($result->num_rows > 0){
                                     while($row = $result->fetch_array()){
                                        echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="FruitBF" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                                   }
                                 }
                               }

                               function getBevarageL(){
                                 require 'config.php';
                                 $sql="SELECT * FROM meal WHERE type ='Beverage'  and (mealtime='lunch' or mealtime='all') ";
                                 $result=$conn->query($sql);
                                 if($result->num_rows > 0){
                                   while($row = $result->fetch_array()){
                                      echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="BeverageL" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                                 }
                               }
                             }
                             function getMainFoodL(){	
                               require 'config.php';
                               $sql="SELECT * FROM meal WHERE type ='Food' and (mealtime='lunch' or mealtime='all')";
                               $result=$conn->query($sql);
                               if($result->num_rows > 0){
                                 while($row = $result->fetch_array()){
                                    echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="FoodL" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                               }
                             }
                           }
                           function getDesertL(){	
                             require 'config.php';
                             $sql="SELECT * FROM meal WHERE type ='Dessert' and (mealtime='lunch' or mealtime='all')";
                             $result=$conn->query($sql);
                             if($result->num_rows > 0){
                               while($row = $result->fetch_array()){
                                  echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="DesertL" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                             }
                           }
                         }
                         function getFruitL(){	
                           require 'config.php';
                           $sql="SELECT * FROM meal WHERE type ='Fruit' and (mealtime='lunch' or mealtime='all')";
                           $result=$conn->query($sql);
                           if($result->num_rows > 0){
                             while($row = $result->fetch_array()){
                                echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="FruitL" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                           }
                         }
                       }


                       function getBevarageD(){
                         require 'config.php';
                         $sql="SELECT * FROM meal WHERE type ='Beverage'  and (mealtime='dinner' or mealtime='all') ";
                         $result=$conn->query($sql);
                         if($result->num_rows > 0){
                           while($row = $result->fetch_array()){
                             echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="BeverageD" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                         }
                       }
                     }
                     function getMainFoodD(){	
                       require 'config.php';
                       $sql="SELECT * FROM meal WHERE type ='Food' and (mealtime='dinner' or mealtime='all')";
                       $result=$conn->query($sql);
                       if($result->num_rows > 0){
                         while($row = $result->fetch_array()){
                            echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="FoodD" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                       }
                     }
                   }
                   function getDesertD(){	
                     require 'config.php';
                     $sql="SELECT * FROM meal WHERE type ='Dessert' and (mealtime='dinner' or mealtime='all')";
                     $result=$conn->query($sql);
                     if($result->num_rows > 0){
                       while($row = $result->fetch_array()){
                         echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="DesertD" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                     }
                   }
                 }
                 function getFruitD(){	
                   require 'config.php';
                   $sql="SELECT * FROM meal WHERE type ='Fruit' and (mealtime='dinner' or mealtime='all')";
                   $result=$conn->query($sql);
                   if($result->num_rows > 0){
                     while($row = $result->fetch_array()){
                        echo '<div class="col-sm-6 col-md-4">';
                                              echo '<div class="thumbnail">';
                                                echo '<img src="'.$row["path"].'" alt="..."style="width:230px;height:130px;">';
                                                echo '<div class="caption">';
                                                  echo '<h3>'.$row['mealName'].'</h3>';
                                                  echo '<p><input type="radio" name="FruitD" value="'.$row['mealName'].'"></p>';
                                                echo '</div>';
                                              echo '</div>';
                                            echo '</div>';
                   }
                 }
               }
               ?>