<?php
session_start();
extract ($_SESSION);
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php $Type="Choose Type";
if (isset($_POST['submit'])){
$Type=$_POST['filterBy'];

}



?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iMenu Chef Home</title>

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
                            <li>
                               <a href="chefhome.php"><i class="glyphicon glyphicon-home"></i> Home</a>                    </li>
                               <li class="active">
                                <a href="chefmenu.php"><i class="glyphicon glyphicon-th-list"></i> Menu Order</a></li>

                                <li>
                                    <a href="chefreport.php"><i class="fa fa-fw fa-edit"></i>Report</a></li>
                                    <li>

                               
                                  

                                        <!-- /.navbar-collapse -->
                                    </nav>

                                    <div id="page-wrapper">

                                        <div class="container-fluid">


                                            <!-- Page Heading -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h1 class="page-header">
                                                        Order List
                                                    </h1>

                                                    <ol class="breadcrumb">
                                                        <li>
                                                            <i class="fa fa-dashboard"></i> Home / Order List
                                                       </li>
                                                   </ol>
                                               </div>
                                           </div>
                                           <div class="row">
                                            <div class="col-lg-12">
                                                <div class="well">
                                                    <form action="./chefmenu.php" method="POST" class="form">
                                                        <h4>Type  </h4><select name="filterBy">
                                                        <option value=<?php echo $Type;?>><?php echo $Type;?></option>
                                                        <option value="Breakfast">Breakfast</option>
                                                        <option value="Lunch">Lunch</option>
                                                        <option value="Dinner">Dinner</option>
                                                    </select>
                                                    <button type="submit" name="submit" id="submit">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                        date_default_timezone_set("Asia/Kuala_Lumpur");
                                         $date=date('Y-m-d', time());
                                        if(isset($_POST["filterBy"])){
                                            $Timing1=$_POST['filterBy'];
                                            switch ($_POST['filterBy']) {
                                                case 'Breakfast':
                                                $sqlFood="SELECT foodBreakfast food, COUNT(foodBreakfast) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY foodBreakfast";
                                                $sqlBeverage="SELECT beverageBreakfast beverage, COUNT(beverageBreakfast) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY beverageBreakfast";
                                                $sqlDessert="SELECT dessertBreakfast dessert, COUNT(dessertBreakfast) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY dessertBreakfast";
                                                $sqlFruit="SELECT fruitBreakfast fruit, COUNT(fruitBreakfast) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY fruitBreakfast";

                                                break;
                                                case 'Lunch':
                                                $sqlFood="SELECT foodLunch food, COUNT(foodLunch) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY foodLunch";
                                                $sqlBeverage="SELECT beverageLunch beverage, COUNT(beverageLunch) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY beverageLunch";
                                                $sqlDessert="SELECT dessertLunch dessert, COUNT(dessertLunch) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY dessertLunch";
                                                $sqlFruit="SELECT fruitLunch fruit, COUNT(fruitLunch) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY fruitLunch";
                                                break;
                                                case 'Dinner':
                                                $sqlFood="SELECT foodDinner food, COUNT(foodDinner) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY foodDinner";
                                                $sqlBeverage="SELECT beverageDinner beverage, COUNT(beverageDinner) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY beverageDinner";
                                                $sqlDessert="SELECT dessertDinner dessert, COUNT(dessertDinner) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY dessertDinner";
                                                $sqlFruit="SELECT fruitDinner fruit, COUNT(fruitDinner) quantity FROM `order` WHERE status='confirm' AND `date`='$date' GROUP BY fruitDinner";
                                                break;

                                                default:
                                                echo"You must choose meal time";
                                            }

                                            if ($Timing1!="Insert"){
                                            $resultFood = $conn->query($sqlFood);
                                            $resultBeverage = $conn->query($sqlBeverage);
                                            $resultDessert = $conn->query($sqlDessert);
                                            $resultFruit = $conn->query($sqlFruit);
                                            ?>
                                            <div class="col-lg-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Food</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <ul class="list-group">
                                                            <?php
                                                            if($resultFood->num_rows > 0){
                                                                while($row = $resultFood->fetch_assoc()){
                                                                    ?>
                                                                    <li class="list-group-item">
                                                                        <span class="badget"><?=$row["quantity"];?></span>
                                                                        <?=$row["food"];?>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Beverge</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <ul class="list-group">
                                                            <?php
                                                            if($resultBeverage->num_rows > 0){
                                                                while($row = $resultBeverage->fetch_assoc()){
                                                                    ?>
                                                                    <li class="list-group-item">
                                                                        <span class="badget"><?=$row["quantity"];?></span>
                                                                        <?=$row["beverage"];?>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Dessert</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <ul class="list-group">
                                                            <?php
                                                            if($resultDessert->num_rows > 0){
                                                                while($row = $resultDessert->fetch_assoc()){
                                                                    ?>
                                                                    <li class="list-group-item">
                                                                        <span class="badget"><?=$row["quantity"];?></span>
                                                                        <?=$row["dessert"];?>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Fruit</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <ul class="list-group">
                                                            <?php
                                                            if($resultFruit->num_rows > 0){
                                                                while($row = $resultFruit->fetch_assoc()){
                                                                    ?>
                                                                    <li class="list-group-item">
                                                                        <span class="badget"><?=$row["quantity"];?></span>
                                                                        <?=$row["fruit"];?>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <?php
                                            }else{
                                                ?>
                                                No record
                                                <?php
                                            }}
                                            ?>
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
