<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<!-- <title>Login | tourism_management</title> -->
    
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
		
		date_default_timezone_set("Asia/Kolkata");
		$date=date('l jS \of F Y \a\t h:i:s A');
		
		require("php/PasswordHash.php");
		$hasher = new PasswordHash(8, false);

		$fullName=$_POST["name"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		$addressLine1=$_POST["addressLine1"];
		$addressLine2=$_POST["addressLine2"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		
		$hash = $hasher->HashPassword($password);
			
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
		
		$checkUserExistSQL = "SELECT * FROM `users` WHERE Username='$username'";
		$checkUserExistQuery = $conn->query($checkUserExistSQL);
		$getResult = $checkUserExistQuery->fetch_assoc();
		
		if($getResult==NULL) { //if user with the same username does not exist
			
			//insert data into the database
			$insertDataSQL = "INSERT INTO `users`(FullName,EMail,Phone,Username,Password,AddressLine1,AddressLine2,City,State,Date) VALUES('$fullName','$email','$phone','$username','$hash','$addressLine1','$addressLine2','$city','$state','$date')";
			$insertDataQuery = $conn->query($insertDataSQL);
		
			if($insertDataQuery) { ?>
		
				<title>Signed Up | Project Meteor</title>
			
				<div class="container-fluid">
	
				<div class="col-sm-12 messages">
						
					<div class="col-sm-12 text-center">
							
						<div class="col-sm-12 heading">
							Sign Up Successfull
						</div>
								
					</div>
					
					<div class="col-sm-3"></div> <!-- empty class -->
					
						<div class="col-sm-6 containerBox">
						
							<div class="col-sm-12 text">
								
								You've signed up successfully.
								<br />
								You can now login to your account. 
								
							</div>
							
							<div class="col-sm-12 text-center">
								<a href="login.php">
									<input type="button" class="button" name="login" value="Login">
								</a>
							</div>
							
						</div>
					
					<div class="col-sm-3"></div> <!-- empty class -->
						
				</div>
		
			</div>	 <!-- container-fluid -->
				
			<?php }
	
			else { ?>
			
				<title>Couldn't sign up | tourism_management</title>
			
				<div class="container-fluid">
	
				<div class="messages">
						
					<div class="col-sm-12">
							
						<div class="heading text-center">
							Signup Unsuccessful
						</div>
								
					</div>
					
					<div class="col-sm-6 col-sm-offset-3">
						
						<div class="col-sm-12 containerBox">
						
							<div class="col-sm-12 text">
								
								Sorry we couldn't sign you up.
								<br />
								Please try again in a while. 
								
							</div>
							
							<div class="col-sm-12 text-center">
								<a href="signup.php">
									<input type="button" class="button" name="tryAgain" value="Try Again">
								</a>
							</div>
							
						</div>
							
					</div>
						
				</div>
				
			</div>	 <!-- container-fluid -->
				
			<?php } ?>
			
		<?php } 
		
		else { //if user with the same username exists ?>
		
			<title>Couldn't sign up | tourism_management</title>
			
				<div class="container-fluid">
	
				<div class="messages">
						
					<div class="col-sm-12">
							
						<div class="heading text-center">
							Sign Up Unsuccessful
						</div>
								
					</div>
					
					<div class="col-sm-6 col-sm-offset-3">
						
						<div class="col-sm-12 containerBox">
						
							<div class="col-sm-12 text">
								
								An user with this username already exists.
								<br />
								You might want to log in instead.
								
							</div>
							
							<div class="col-sm-12 text-center">
								<a href="login.php">
									<input type="button" class="button" name="login" value="Login">
								</a>
							</div>
							
						</div>
							
					</div>
						
				</div>
				
			</div>	 <!-- container-fluid -->
		
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