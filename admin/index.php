<!DOCTYPE html>
<html lang="en">
<head>
	<title>RVU SCMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../plugins/images/rvulogo.jpg"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../css/util.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
	<!--===============================================================================================-->
</head>
 
<?php 

session_start();
include('../connection.php');
$_SESSION['error']="";

		if (isset($_POST['login'])) {
			$user = $_POST['ID'];
			$pass = $_POST['pass'];


			
			$query = "SELECT * FROM rvuscms.admin where id='$user' and `password` = '$pass';";
			$result= mysqli_query($con,$query);

			if (mysqli_affected_rows($con)==1) {
				
				$row=mysqli_fetch_array($result);
				$_SESSION['userA']=$row[0];
				$_SESSION['passA']=$row[1];
				$_SESSION['type']="admin";

				header("location:dashboard.php");

			}else {
				$_SESSION['error']= "invalid user id and password";
			}

			$query = "SELECT * FROM rvuscms.lecture where id='$user' and password='$pass' and  rolle ='head';";
			$result= mysqli_query($con,$query);

			if (mysqli_affected_rows($con)==1) {
				
				$row=mysqli_fetch_array($result);
				$_SESSION['userA']=$row[0];
				$_SESSION['passA']=$row[1];
				$_SESSION['type']="lecture";

				header("location:dashboard.php");

			}else {
				$_SESSION['error']= "invalid user id and password";
			}			

		}
	

?>

<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 " style="width: auto;">
				<form class="login100-form validate-form" method="POST" >
					<span class="login100-form-title p-b-20">
						Rift valley Unversity
					</span>
					
					<span class="login100-form-avatar">
						<img src="../plugins/images/rvulogo.jpg" alt="AVATAR">
					</span>
					<h3>
						Login
					</h3>
					<small class="text-danger"> 
					<?php
								 echo htmlentities($_SESSION['error']); 
								?><?php
								  echo htmlentities($_SESSION['error']="");
								?>    
					 </small>
					<div class="wrap-input100 validate-input m-t-40 m-b-25" data-validate = "Enter ID">
						<input class="input100" type="text" name="ID">
						<span class="focus-input100" data-placeholder="admin or dep. head ID"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button sype="submit" name="login" class="login100-form-btn bg-theme-dark">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>