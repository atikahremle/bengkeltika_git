?php
session_start();

if (!isset($_SESSION['idNum'])){
    header("Location:login.html");
    die();
}
date_default_timezone_set("Asia/Kuala_Lumpur");
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password,"srs");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM 
  (SELECT COUNT(IdNum) Eight FROM `user` WHERE HOUR(regTime)=8) u1,
  (SELECT COUNT(IdNum) Nine FROM `user` WHERE HOUR(regTime)=9) u2,
  (SELECT COUNT(IdNum) Ten FROM `user` WHERE HOUR(regTime)=10) u3,
  (SELECT COUNT(IdNum) Eleven FROM `user` WHERE HOUR(regTime)=11) u4,
  (SELECT COUNT(IdNum) Twelve FROM `user` WHERE HOUR(regTime)=12) u5,
  (SELECT COUNT(IdNum) Thirteen FROM `user` WHERE HOUR(regTime)=13) u6,
  (SELECT COUNT(IdNum) Fourteen FROM `user` WHERE HOUR(regTime)=14) u7,
  (SELECT COUNT(IdNum) Fifteen FROM `user` WHERE HOUR(regTime)=15) u8,
  (SELECT COUNT(IdNum) Sixteen FROM `user` WHERE HOUR(regTime)=16) u9,
  (SELECT COUNT(IdNum) Seventeen FROM `user` WHERE HOUR(regTime)=17) u10";
$result = $conn->query($sql);
?>

    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width">
        <title>Graph</title>
        <link rel="stylesheet" href="./app.css"/>
        <!-- Bootstrap core CSS -->
        <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <meta name="description" content="Login Page">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap-theme.min.css">


        <!-- Custom styles for this template -->
        <link href="./bower_components/bootstrap/dist/css/signin.css" rel="stylesheet">
    </head>

        <body>
        <header>
        <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="logout.php" class="navbar-brand">SRS Logout</a>
                </div>
                <div class="collapse navbar-collapse" id="example">
                    <ul class="nav navbar-nav">
                        <li><a href="Datatables.php">Student Datatable</a></li>
                    </ul>
                <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><?=$_SESSION['idNum']; ?></a></p>
                </div>
            </div>
        </div>
          
    </header>
    </body>

<html>
  <head>
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
  </body>
</html>