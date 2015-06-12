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

    <title>iMenu Chef Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="chefhome.php">iMenu Chef</a>
            </div>
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
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="chefhome.php"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="chefmenu.php"><i class="glyphicon glyphicon-th-list"></i> Menu Order</a>
                    </li>

                    <li class="active">
                        <a href="chefreport.php"><i class="fa fa-fw fa-edit"></i>Report</a>
                    </li>
                    
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Order List
                        </h1>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Home / Report
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                            $sql = $conn->query("SELECT * FROM `order` JOIN `patient` USING (patientID)");  
                            if($sql->num_rows > 0){
                                while($row = $sql->fetch_assoc()){
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading<?=$row['date'];?>">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$row['date'];?>" aria-expanded="false" aria-controls="collapse<?=$row['date'];?>">
                                            <?=$row['name'];?> - <?=$row['date'];?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse<?=$row['date'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$row['date'];?>">
                                    <div class="panel-body">
                                        <dl>
                                            <dt><p class="lead">Breakfast</p></dt>
                                            <dd>
                                                <dl class="dl-horizontal">
                                                    <dt>Food</dt><dd><?=$row['foodBreakfast'];?></dd>
                                                    <dt>Beverage</dt><dd><?=$row['beverageBreakfast'];?></dd>
                                                    <dt>Dessert</dt><dd><?=$row['dessertBreakfast'];?></dd>
                                                    <dt>Fruit</dt><dd><?=$row['fruitBreakfast'];?></dd>
                                                </dl>
                                            </dd>
                                            <dt><p class="lead">Lunch</p></dt>
                                            <dd>
                                                <dl class="dl-horizontal">
                                                    <dt>Food</dt><dd><?=$row['foodLunch'];?></dd>
                                                    <dt>Beverage</dt><dd><?=$row['beverageLunch'];?></dd>
                                                    <dt>Dessert</dt><dd><?=$row['dessertLunch'];?></dd>
                                                    <dt>Fruit</dt><dd><?=$row['fruitLunch'];?></dd>
                                                </dl>
                                            </dd>
                                            <dt><p class="lead">Dinner</p></dt>
                                            <dd>
                                                <dl class="dl-horizontal">
                                                    <dt>Food</dt><dd><?=$row['foodDinner'];?></dd>
                                                    <dt>Beverage</dt><dd><?=$row['beverageDinner'];?></dd>
                                                    <dt>Dessert</dt><dd><?=$row['dessertDinner'];?></dd>
                                                    <dt>Fruit</dt><dd><?=$row['fruitDinner'];?></dd>
                                                </dl>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
