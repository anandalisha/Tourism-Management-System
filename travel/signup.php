<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Sign Up | tourism_management</title>
    
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

	
		
		<!------------------------------------------------------------------------------------------------------
		
		
			  ADD CONDITION TO PREVENT USERS FROM SIGNING UP IN CASE THE CHOSEN USERNAME ALREADY EXISTS
			  										
		------------------------------------------------------------------------------------------------------->
		
			
				
						
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid">
		
		<div class="signup">
				
			<div class="col-sm-12">
					
				<div class="heading text-center">
					Sign Up
				</div>
						
			</div>
			
			<div class="col-sm-6 col-sm-offset-3">
				
				<div class="containerBox">
				
				<form action="signupAction.php" method="POST">
				
					<label for="name">Full Name:</label>
					<input type="text" class="input" name="name" placeholder="Enter your full name here" id="fullname" required>
					
					<label for="email">E-mail:</label>
					<input type="email" class="input" name="email" placeholder="Enter your email here" required>
					
					<label for="phone">Phone:</label>
					<input type="text" class="input" name="phone" placeholder="Enter your phone no. here" id="phone" required>
					
					<label for="username">Username:</label>
					<input type="text" class="input" name="username" placeholder="Enter a username here" id="username" required>
					
					<p id="usernameExists" style="font-size: 1.2em; color: red; font-weight: 400; margin-top: -1.75em; text-align: center; background: rgba(0,0,0,0.4); display: none;">This username already exists. Please choose a different one.</p>
					
					<label for="password">Password:</label>
					<input type="password" class="input" name="password" placeholder="Enter a password here" id="password" required>
					
					<label for="repeatPassword">Repeat Password:</label>
					<input type="password" class="input" name="repeatPassword" placeholder="Enter the same password again" id="repeatPassword" required>
					
					<label for="addressLine1">Address Line 1:</label>
					<input type="text" class="input" name="addressLine1" placeholder="Enter your House No./ Flat No. or Apartment No." required>
					
					<label for="addressLine2">Address Line 2:</label>
					<input type="text" class="input" name="addressLine2" placeholder="Enter the name of your Lane, Locality" required>
					
					<label for="city">City:</label>
					<input type="text" class="input" name="city" placeholder="Enter the name of your city here" id="city" required>
					
					<label for="addressLine2">State:</label>
					<input type="text" class="input" name="state" placeholder="Enter the name of your state here" id="state" required>
					
					<div class="col-sm-12 text-center">
					<input type="submit" class="button" name="signup" value="Sign Up" id="signupButton">
					</div>
					
				</form>
				
					<div class="col-sm-12 text-center">
						<div class="loginPrompt">
							Already have an account? <a href="login.php"><span class="dots">Login</span></a> instead.
						</div>
					</div>
				
				</div>
				
			</div>
			
		</div>
		
		</div> <!-- container-fluid -->
		
	</body>
	

	<!-- BODY TAG ENDS -->
	
</html>
	