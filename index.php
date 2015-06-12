<?php
session_start();
ob_start();
if(isset($_POST['submit'])){
$userID = $_POST['userID'];
$password = $_POST['password'];
// Include database connection settings
include('./config.php');

 $a = set_time_limit(25);

// Retrieve username and password from database according to user's input
// $login = mysql_query("SELECT * FROM user WHERE (userID = '" . mysql_real_escape_string($_POST['userID']) . "') and (password = '" .($_POST['password']) . "')");
 $sql = "SELECT * FROM user WHERE (userID = '" . mysqli_real_escape_string($conn,$_POST['userID']) . "') and (password = '" .(md5($_POST['password'])) . "')";
 $login = $conn->query($sql);
if (isset($login))
  {
  echo "<script language=\"javascript\" type=\"text/javascript\">
        <!--
        alert(\"No Record !\");
        window.location ='index.php';
                    //-->
    </script>";
}
// Check username and password match
if ($login->num_rows == 1) 
{
        while($row = $login->fetch_assoc())
        {
            if ($row['position']=="admin")
            {
            // Set username session variable
            $_SESSION['userID'] = $_POST['userID'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['ic_num'] = $_POST['ic_num'];
            $_SESSION['position'] = $row['position'];
            // Jump to adminhome page as Admin
            header('Location: ./adminhome.php');
            }
            else if($row['position']=="nurse")
            {
            // Set username session variable
            $_SESSION['userID'] = $_POST['userID'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['ic_num'] = $row['ic_num'];
            $_SESSION['position'] = $row['position'];
            // Jump to home page as sttaff
            header('Location: ./nursehome.php');
            }
            else if($row['position']=="chef")
            {
            // Set username session variable
            $_SESSION['userID'] = $_POST['userID'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['ic_num'] = $row['ic_num'];
            $_SESSION['position'] = $row['position'];
            // Jump to home page as chef
            header('Location: ./chefhome.php');
            }
        }   
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<link rel="stylesheet" type="text/css" media="screen" href="style.css">
<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>
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
                   
                </li>
               
                <li class="dropdown">
                    <?php if(!isset($_SESSION['username'])){ echo "<a href='#login-box' class='login-window'>LOGIN</a>"; } else echo "<a href='logout.php'>Logout</a>"; ?>
                    <ul class="dropdown-menu">
                        
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                         <a href="./index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li>
                      <a href="hospital.php"><i class="glyphicon glyphicon-plus"></i> Our Hospital</a>
                    </li>
                      <li>
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          iMenu For Kitchen Order System
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
<tr>
                
 
  
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="./images/banner4.jpg" alt="...">
                        </div>
                        <div class="item">
                            <img src="./images/banner3.jpg" alt="...">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
      
   
  
    <!-- Load jQuery and the plug-in -->
    <script src="javascript/libs/jquery-1.6.2.min.js"></script>
    <script src="javascript/basic-jquery-slider.js"></script>
    
    <!--  Attach the plug-in to the slider parent element and adjust the settings as required -->
    <script>
      $(document).ready(function() {
        
        $('#banner').bjqs({
          'animation' : 'slide',
          'width' : 450,
          'height' : 260,
        });
        
      });
    </script></td>
		   </tr>
               
             

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

</body>

</html>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>

<script type="text/javascript">
    
$(document).ready(function() {
$('a.login-window').click(function() {
    
            //Getting the variable's value from a link 
    var loginBox = $(this).attr('href');

    //Fade in the Popup
    $(loginBox).fadeIn(300);
    
    //Set the center alignment padding + border see css style
    var popMargTop = ($(loginBox).height() + 24) / 2; 
    var popMargLeft = ($(loginBox).width() + 24) / 2; 
    
    $(loginBox).css({ 
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });
    
    // Add the mask to body
    $('body').append('<div id="mask"></div>');
    $('#mask').fadeIn(300);
    
    return false;
});

// When clicking on the button close or the mask layer the popup closed
$('a.close, #mask').live('click', function() { 
  $('#mask , .login-popup').fadeOut(300 , function() {
    $('#mask').remove();  
}); 
return false;
});
});

</script>
<div id="login-box" class="login-popup">
<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
  <form method="post" class="signin" action="#">
        <fieldset class="textbox">
        <label class="username">
        <span>Username or email</span>
        <input id="username" name="userID" value="" type="text" autocomplete="on" placeholder="Username">
        </label>
        <label class="password">
        <span>Password</span>
        <input id="password" name="password" value="" type="password" placeholder="Password">
        </label>
        <input type="submit" name="submit" class="submit button" value="Sign in">
        </fieldset>
  </form>
</div>  
    