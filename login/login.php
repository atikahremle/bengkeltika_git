<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/styles.css">
<script>
function validateForm()
{
var x=document.forms["login"]["username"].value;
if (x==null || x=="")
  {
  alert("Sila Masukkan Nama Pengguna");
  return false;
  }
var x=document.forms["login"]["password"].value;
if (x==null || x=="")
  {
  alert("Sila Masukkan Kata Laluan");
  return false;
  }  
}
</script>
</head>

	<!-- Main HTML -->
	
<body>
	
	<!-- Begin Page Content -->
	
	<div id="container">
		
		<form name="login" method="post" class="signin" action="../login.php" onSubmit="return validateForm()">
		<label for="name">Nama Pengguna:</label>
		
		<input type="name" name="username" placeholder="Nama Pengguna">
		
		<label for="username">Kata Laluan:</label>
			
		<input type="password" name="password" placeholder="Kata Laluan">
		
		<div id="lower">
       
		
		<input type="submit" value="Log Masuk">
		
		</div>
		
		</form>
		
	</div>
	
	
	<!-- End Page Content -->
	
</body>

</html>
	
	
	
	
	
		
	