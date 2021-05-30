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
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Logged Out | Admin Panel</title> 
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap-select.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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

        <style>
        body
      {
        background-image: url('home1.jpg');
        background-repeat:no-repeat;
      }
      h1{
        font-size: 60px;
        font-family: Courgette;
        text:black;
        font-weight:bold;
      }
  
        </style>
    		
	</head>
	
	<body>
		
			<div class="container-fluid">
		
				<div class="col-sm-12 messages">
						
					<div class="col-sm-12 text-center">
							
						<div class="col-sm-12 heading">
						</div>
								
					</div>
					<br>
					<div class="col-sm-3"></div> <!-- empty class -->
					
						<div class="col-sm-6 containerBox">
						
							<div class="col-sm-12 text" style="margin-top:25%">
								
							<h1>	You've logged out successfully.</h1>
								<br>
                                <br>
                                <br>
							</div>
							
							<div class="col-sm-12 text-center">
								<a href="adminLogin.php"> <!-- change it to adminLogin.php when it is done -->
									<input type="button" class="btn btn-dark" style="font-size:30px" name="home" value="Click here to login to admin panel">
								</a>
<br>
<br>
                                <a href="\travel\index.php"> <!-- change it to adminLogin.php when it is done -->
									<input type="button" class="btn btn-dark pt-5" name="home" style="font-size:30px" value="Click here to go to user panel">
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