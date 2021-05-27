<?php
		
ob_start();
session_start();

?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<!-- <title>Login | travel_management</title> -->
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap-select.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/bootstrap-select.js"></script>
    	<script src="js/bootstrap-dropdown.js"></script>
    	<script src="js/jquery-2.1.1.min.js"></script>
    	<script src="js/moment-with-locales.js"></script>
    	<script src="js/bootstrap-datetimepicker.js"></script>
    		
	</head>
	
	<body>
	

	<?php
		
		require("php/PasswordHash.php");
		$hasher = new PasswordHash(8, false);
		
		$username=$_POST["username"];
		$password=$_POST["password"];
		
		$servername = "localhost";
		$usernameConn = "root";
		$passwordConn = "";
		$dbname = "projectmeteor";
		
		// Creating a connection to projectmeteor MySQL database
		$conn = new mysqli($servername, $usernameConn, $passwordConn, $dbname);
		
		// Checking if we've successfully connected to the database
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	
		$getUserDataSQL = "SELECT * FROM `users` WHERE Username='$username'";
		$getUserDataQuery = $conn->query($getUserDataSQL);
		$getResult = $getUserDataQuery->fetch_assoc();
		
		//$passwordFromDB = "*";
		$passwordFromDB = $getResult["Password"];
		
		$check = $hasher->CheckPassword($password, $passwordFromDB);
		
		if($check) { ?>
		
		<?php 
		
		$_SESSION["valid"] = true;
    	$_SESSION["timeout"] = time();
    	$_SESSION["username"] = $username;
		
		?>
		
		<title>Logged In |  travel_management</title>
		
			<div class="container-fluid">
		
				<div class="col-sm-12 messages">
						
					<div class="col-sm-12 text-center">
							
						<div class="col-sm-12 heading">
							Log In Successfull
						</div>
								
					</div>
					
					<div class="col-sm-3"></div> <!-- empty class -->
					
						<div class="col-sm-6 containerBox">
						
							<div class="col-sm-12 text">
								
								You've logged in successfully.
								<br />
								You can now access your dashboard. 
								
							</div>
							
							<div class="col-sm-12 text-center">
								<a href="userDashboardProfile.php">
									<input type="button" class="button" name="login" value="Take me to my Dashboard">
								</a>
							</div>
							
						</div>
					
					<div class="col-sm-3"></div> <!-- empty class -->
						
				</div>
		
			</div> <!-- container-fluid -->
			
		<?php }
	
		else { ?>
		
			<title>Couldn't log in | travel_management</title>
		
			<div class="container-fluid">
			
				<div class="messages">
						
					<div class="col-sm-12">
							
						<div class="heading text-center">
							Log In Unsuccessful
						</div>
								
					</div>
					
					<div class="col-sm-6 col-sm-offset-3">
						
						<div class="col-sm-12 containerBox">
						
							<div class="col-sm-12 text">
								
								We couldn't log you in.
								<br />
								Please try again with correct username and password. 
								
							</div>
							
							<div class="col-sm-12 text-center">
								<a href="login.php">
									<input type="button" class="button" name="tryAgain" value="Try Again">
								</a>
							</div>
							
						</div>
							
					</div>
						
				</div>
				
			</div> <!-- container-fluid -->
			
		<?php } ?>
	
	</body>
	
</html>
	
	
	<!--
	<div class="container-fluid">
	
		<div class="login">
				
			<div class="col-sm-12">
					
				<div class="heading text-center">
					Signup Successfull
				</div>
						
			</div>
			
			<div class="col-sm-6 col-sm-offset-3">
				
				<div class="col-sm-12 containerBox">
				
					<div class="col-sm-12 text">
						
						You've signed up successfully. You can now login to your account. 
						
					</div>
					
					<div class="col-sm-12 text-center">
						<a href="login.php">
							<input type="submit" class="button" name="login" value="Login">
						</a>
					</div>
					
				</div>
					
			</div>
				
		</div>
		
	</div> <!-- container-fluid -->