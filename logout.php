<?php
		
	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
 		
  		<meta charset="UTF-8">
  		<meta name="author" content="Joydeep Dev Nath">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>Logged Out | Project Meteor</title> 
    
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
		
			<div class="container-fluid">
		
				<div class="col-sm-12 messages">
						
					<div class="col-sm-12 text-center">
							
						<div class="col-sm-12 heading">
							Log Out Successfull
						</div>
								
					</div>
					
					<div class="col-sm-3"></div> <!-- empty class -->
					
						<div class="col-sm-6 containerBox">
						
							<div class="col-sm-12 text">
								
								You've logged out successfully.
								
							</div>
							
							<div class="col-sm-12 text-center">
								<a href="index.php"> <!-- change it to index.php when it is done -->
									<input type="button" class="button" name="home" value="Home Page">
								</a>
							</div>
							
						</div>
					
					<div class="col-sm-3"></div> <!-- empty class -->
						
				</div>
		
			</div> <!-- container-fluid -->
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