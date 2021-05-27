<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
  		<meta name="author" content="Joydeep Dev Nath">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>Passengers | Project Meteor</title>
    
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
		
		<?php include("common/headerLoggedIn.php"); ?>
		
		<?php
		
			$fare=$_POST["fareHidden"];
			$mode=$_POST["modeHidden"];
		
			if($mode=="OneWayFlight" || $mode=="ReturnTripFlight") {
		
				$type=$_POST["typeHidden"];
				$class=$_POST["classHidden"];
				$origin=$_POST["originHidden"];
				$destination=$_POST["destinationHidden"];
				$depart=$_POST["departHidden"];
				$return=$_POST["returnHidden"];
				$adults=$_POST["adultsHidden"];
				$children=$_POST["childrenHidden"];
				$totalPassengers=(int)$adults+(int)$children;
			
				if($type=="Return Trip") {
					$flightNoOutbound=$_POST["flightNoOutboundHidden"];
					$flightNoInbound=$_POST["flightNoInboundHidden"];
				}
				elseif($type=="One Way") {
					$flightNoOutbound=$_POST["flightNoOutboundHidden"];
				}
			
				if($class=="Economy Class")
					$className="Economy";
				else
					$className="Business";
				
			}
		
			elseif($mode=="bus") {
				$date = $_POST["dateHidden"];
				$busID = $_POST["busIDHidden"];
				$totalPassengers=$_POST["noOfPassengersHidden"];
				$origin=$_POST["originHidden"];
				$destination=$_POST["destinationHidden"];
			}
		
			elseif($mode=="train") {
				$date = $_POST["dateHidden"];
				$day = $_POST["dayHidden"];
				$trainID = $_POST["trainIDHidden"];
				$totalPassengers=$_POST["noOfPassengersHidden"];
				$origin=$_POST["originHidden"];
				$destination=$_POST["destinationHidden"];
				$class=$_POST["classHidden"];
			}
		
		?>
		
		<div class="spacer">a</div>
		
		<div class="col-sm-12 passengersWrapper">
			
			<div class="headingOne">
				
				Please enter the details of the passengers
				
			</div>
		   
		   <div class="col-sm-2"></div>
			
			<div class="col-sm-8">
				
				<div class="boxCenter">
				
				<form action="payment.php" method="POST">
				
				<?php for($i=1; $i<=$totalPassengers; $i++) {?>
				
				<div class="col-sm-9 nameTag">Name of passenger <?php echo $i; ?>:</div>
				<div class="col-sm-3 ageTag">Gender:</div>
				<input type="text" class="inputPassengerName" name="name<?php echo $i; ?>" placeholder="Enter the full name of the passenger <?php echo $i; ?>" />
				<select class="inputSmall" name="gender<?php echo $i; ?>" />
					
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					
				</select>
				
				<?php } ?>
				
				
				<div class="text-center">
						
						<input type="submit" class="continueButton" value="Proceed to payment">
						
						<input type="hidden" name="totalPassengersHidden" value="<?php echo $totalPassengers; ?>">
						
						<input type="hidden" name="fareHidden" value="<?php echo $fare; ?>">
						<input type="hidden" name="typeHidden" value="<?php echo $type; ?>">
						<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
						<input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
						<input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
						<input type="hidden" name="departHidden" value="<?php echo $depart; ?>">
						<input type="hidden" name="returnHidden" value="<?php echo $return; ?>">
						<input type="hidden" name="adultsHidden" value="<?php echo $adults; ?>">
						<input type="hidden" name="childrenHidden" value="<?php echo $children; ?>">
						<input type="hidden" name="modeHidden" value="<?php echo $mode; ?>">
						
						<?php if($mode=="bus") { ?>
							<input type="hidden" name="dateHidden" value="<?php echo $date; ?>">
							<input type="hidden" name="busIDHidden" value="<?php echo $busID; ?>">
						<?php } ?>
						
						<?php if($mode=="train") { ?>
							<input type="hidden" name="dateHidden" value="<?php echo $date; ?>">
							<input type="hidden" name="dayHidden" value="<?php echo $day; ?>">
							<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
							<input type="hidden" name="trainIDHidden" value="<?php echo $trainID; ?>">
						<?php } ?>
						
						<?php if($mode=="OneWayFlight" || $mode=="ReturnTripFlight") {?>
						
						<?php if($type=="Return Trip") { ?>
						<input type="hidden" name="flightNoOutboundHidden" value="<?php echo $flightNoOutbound; ?>">
						<input type="hidden" name="flightNoInboundHidden" value="<?php echo $flightNoInbound; ?>">
						<?php } elseif($type=="One Way") { ?>
						<input type="hidden" name="flightNoOutboundHidden" value="<?php echo $flightNoOutbound; ?>">
						<?php } ?>
						
						<?php } ?>
					
					</form>
				</div>
				</div>
				
			</div>
		   
		   <div class="col-sm-2"></div>
			   
		</div>
		
		<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>