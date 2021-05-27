<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
  		
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>Login | travel_management</title>
    
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
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid">
		
		<div class="login">
				
			<div class="col-sm-12">
					
				<div class="heading text-center">
					Login
				</div>
						
			</div>
			
			<div class="col-sm-6 col-sm-offset-3">
				
				<div class="containerBox">
				
				<form action="loginAction.php" method="POST">
					
					<label for="username">Username:</label>
					<input type="text" class="input" name="username" placeholder="Enter username here" required>
					
					<label for="password">Password:</label>
					<input type="password" class="input" name="password" placeholder="Enter password here" required>
					
					<div class="col-sm-12 text-center">
					<input type="submit" class="button" name="login" value="Login">
					</div>
					
					<a href="forgotPassword.php"><p class="col-xs-12 dots" style="color: white; font-size: 1.1em; margin-top: 1em; text-align: center;">Forgot Password?</p></a>
					
				</form>
				
					<div class="col-sm-12 text-center">
						<div class="signupPrompt">
							New user? <a href="signup.php"><span class="dots">Sign Up</span></a> instead.
						</div>
					</div>
				
				</div>
				
			</div>
			
		</div>
		
		</div> <!-- container-fluid -->
		
	</body>
	

	<!-- BODY TAG ENDS -->
	
</html>
	