<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Contact Us | tourism_management</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
		
		<?php 
		
			if(!isset($_SESSION["username"])) {
				include("common/headerLoggedOut.php");
			}
			else {
				include("common/headerLoggedIn.php");
			}
		
		?>
		
		<div class="spacer">a</div>
		
		<div class="col-sm-12 contactUsWrapper">
			
			<div class="headingOne">
				
				Contact Us
				
			</div>
			
			
		</div> <!-- paymentWrapper -->
		
		<div class="col-xs-12 contactPadding">
			
		<div class="col-sm-1"></div>
		
		<div class="col-sm-5 contactUsExtras">
			
			<div class="col-sm-12 heading">
				
				<span class="bold"><h2>We're located at:</h2></span>
				</br>
				<br>
				<h4>CUSAT,Cochin,Kerala,India</h4>
			
			</div>
		
			
		</div>
		
		<div class="col-sm-5 contactUsForm">
			
			<form id="contactForm">
				
			<label for="name">Full Name:</label>
			<input type="text" class="input" name="name" required/>
			
			<label for="email">E-mail:</label>
			<input type="text" class="input" name="email" required/>
			
			<label for="queries">Queries:</label>
			<textarea class="input" name="queries" required></textarea>
			
			<div class="text-center">
				<input type="submit" class="contactButton" value="Send"/>
			</div>
				
			</form>
			
		</div>
		
		<div class="col-sm-1"></div>
		
		</div>
	
	<div class="col-xs-12 spacer">.</div> <!-- just a dummy class for creating some space -->
	<div class="col-xs-12 spacer">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>