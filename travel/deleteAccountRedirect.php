<?php

	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	//header("Location:index.php");
	
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
 		
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Account Deleted | tourism_management</title> 
    
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
		<script type="text/javascript">
			setTimeout(function(){location.href="index.php"} , 3000);   
		</script>
    		
	</head>
	
	<body>


	<div class="container-fluid">
		
				<div class="col-sm-12 messages">
						
					<div class="col-sm-12 text-center">
							
						<div class="col-sm-12 heading">
							Account Deleted Successfully
						</div>
								
					</div>
					
					<div class="col-sm-3"></div> <!-- empty class -->
					
						<div class="col-sm-6 containerBox">
						
							<div class="col-sm-12 text">
								
								Your account has been deleted.
								<br />
								Please wait while you're being redirected to the homepage.
								
							</div>
							
						</div>
					
					<div class="col-sm-3"></div> <!-- empty class -->
						
				</div>
		
			</div> <!-- container-fluid -->
			
	</body>
	
</html>