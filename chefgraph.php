    <?php
    session_start();
    extract ($_SESSION);
    include("config.php");
    
$sql = "SELECT * FROM 
  (SELECT COUNT(orderID) Eight FROM `order` WHERE HOUR(regTime)=8) u1,
  (SELECT COUNT(orderID) Nine FROM `order` WHERE HOUR(regTime)=9) u2,
  (SELECT COUNT(orderID) Ten FROM `order` WHERE HOUR(regTime)=10) u3,
  (SELECT COUNT(orderID) Eleven FROM `order` WHERE HOUR(regTime)=11) u4,
  (SELECT COUNT(orderID) Twelve FROM `order` WHERE HOUR(regTime)=12) u5,
  (SELECT COUNT(orderID) Thirteen FROM `order` WHERE HOUR(regTime)=13) u6,
  (SELECT COUNT(orderID) Fourteen FROM `order` WHERE HOUR(regTime)=14) u7,
  (SELECT COUNT(orderID) Fifteen FROM `order` WHERE HOUR(regTime)=15) u8,
  (SELECT COUNT(orderID) Sixteen FROM `order` WHERE HOUR(regTime)=16) u9,
  (SELECT COUNT(orderID) Seventeen FROM `order` WHERE HOUR(regTime)=17) u10";
$result = $conn->query($sql);
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
                                   <li>
                                    <a href="chefmenu.php"><i class="glyphicon glyphicon-th-list"></i> Menu Order</a></li>

                                    <li>
                                        <a href="chefreport.php"><i class="fa fa-fw fa-edit"></i>Report</a></li>
                                        <li>

                                         <li class="active">
                                        <a href="chefreport.php"><i class="glyphicon glyphicon-signal"></i>Report Graph</a></li>
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
                                              <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Time", "Student", { role: "style" } ],
        <?php
        if ($result->num_rows == 1) {
          while($row = mysqli_fetch_assoc($result)){
        ?>
        ["8am", <?=$row['Eight'];?>, "#0000cf"],
        ["9am", <?=$row['Nine'];?>, "#0000cf"],
        ["10am", <?=$row['Ten'];?>, "#0000cf"],
        ["11am", <?=$row['Eleven'];?>, "#0000cf"],
        ["12am", <?=$row['Twelve'];?>, "#0000cf"],
        ["1pm", <?=$row['Thirteen'];?>, "#0000cf"],
        ["2pm", <?=$row['Fourteen'];?>, "#0000cf"],
        ["3pm", <?=$row['Fifteen'];?>, "#0000cf"],
        ["4pm", <?=$row['Sixteen'];?>, "#0000cf"],
        ["5pm", <?=$row['Seventeen'];?>, "#0000cf"]
        <?php
          }
        }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Students against Time",
        width: 1380,
        height: 500,
        bar: {groupWidth: "30%"},
        legend: { position: "none" },

      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);

  }
  </script>

<div id="columnchart_values" style="width: 1400; height: 500;"></div>
<div><a href="staffpage.php" class="btn btn-primary navbar-btn">HOME</a></div>
 <div >Total summon need to be paid :
 <?php  include 'config.php';
        $sql="select sum(Amount) FROM summon ";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc( $result );
        echo "RM ".$row['sum(Amount)'];
        
 ?></div>
  <div >Total percentage student got summon :
  <?php 
        $sql2="select count(Amount) FROM summon ";
        $result2 = mysql_query($sql2);
        $row2 = mysql_fetch_assoc( $result2 );
        $t_sum=$row2['count(Amount)'];
        $sql3="select count(*) FROM user where UserType='student'";
        $result3 = mysql_query($sql3);
        $row3 = mysql_fetch_assoc( $result3 );
        $t_total=$row3['count(*)'];
        $percentage=round(($t_sum/$t_total)*100);
        echo $percentage."%";
        
 ?></div>   
                                      </div>
                                        </div>
                                       
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
