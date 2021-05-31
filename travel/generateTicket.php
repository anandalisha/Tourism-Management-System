<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!-- dumping the current page to buffer -->
<?php
ob_start();
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>E-Ticket | tourism_management</title>
    
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
		
		<div class="spacer">a</div>
		
		<?php 
		
		date_default_timezone_set("Asia/Kolkata");
		$date=date('l jS \of F Y \a\t h:i:s A');
		
		$totalPassengers=$_POST["totalPassengersHidden"];
	
		for($i=1; $i<=$totalPassengers; $i++) {
			$name[$i]=$_POST["nameHidden$i"];
			$gender[$i]=$_POST["genderHidden$i"];
		}
		
		$mode=$_POST["modeHidden"];
		$fare=$_POST["fareHidden"];
		$type=$_POST["typeHidden"];
		$class=$_POST["classHidden"];
		$origin=$_POST["originHidden"];
		$destination=$_POST["destinationHidden"];
		$depart=$_POST["departHidden"];
		$return=$_POST["returnHidden"];
		$adults=$_POST["adultsHidden"];
		$children=$_POST["childrenHidden"];
		$noOfPassengers=(int)$adults+(int)$children;
	
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
		
		?>
		
		<?php
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "projectmeteor";
			
			// Creating a connection to MySQL database
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Checking if we've successfully connected to the database
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			if($mode=="ReturnTripFlight"){
						
				$getBookedSeatsOutboundSQL = "SELECT noOfBookings FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$getBookedSeatsOutboundQuery = $conn->query($getBookedSeatsOutboundSQL);
				$bookedSeatsOutboundGet = $getBookedSeatsOutboundQuery ->fetch_array(MYSQLI_NUM);
			
				$bookedSeatsOutbound = $bookedSeatsOutboundGet[0];
				$newBookedSeats = $bookedSeatsOutbound+$totalPassengers;
				
				//updating the no. of outbound bookings
				$outboundBookingUpdateSQL = "UPDATE `flights` SET noOfBookings='$newBookedSeats' WHERE flight_no='$flightNoOutbound'";
				$outboundBookingUpdateQuery = $conn->query($outboundBookingUpdateSQL);
				
				$getBookedSeatsInboundSQL = "SELECT noOfBookings FROM `flights` WHERE flight_no='$flightNoInbound'";
				$getBookedSeatsInboundQuery = $conn->query($getBookedSeatsInboundSQL);
				$bookedSeatsInboundGet = $getBookedSeatsInboundQuery ->fetch_array(MYSQLI_NUM);
			
				$bookedSeatsInbound = $bookedSeatsInboundGet[0];
				$newBookedSeats = $bookedSeatsInbound+$totalPassengers;
				
				//updating the no. of outbound bookings
				$inboundBookingUpdateSQL = "UPDATE `flights` SET noOfBookings='$newBookedSeats' WHERE flight_no='$flightNoInbound'";
				$inboundBookingUpdateQuery = $conn->query($inboundBookingUpdateSQL);
				
				
				$getSeatsAvailableOutboundSQL = "SELECT seats_available FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$getSeatsAvailableOutboundQuery = $conn->query($getSeatsAvailableOutboundSQL);
				$SeatsAvailableOutboundGet = $getSeatsAvailableOutboundQuery ->fetch_array(MYSQLI_NUM);
			
				$seatsAvailableOutbound = $SeatsAvailableOutboundGet[0];
				$newseatsAvailable = $seatsAvailableOutbound-$totalPassengers;
				
				//updating the no. of outbound seats available
				$outboundSeatUpdateSQL = "UPDATE `flights` SET seats_available='$newseatsAvailable' WHERE flight_no='$flightNoOutbound'";
				$outboundSeatUpdateQuery = $conn->query($outboundSeatUpdateSQL);
				
				$getSeatsAvailableInboundSQL = "SELECT seats_available FROM `flights` WHERE flight_no='$flightNoInbound'";
				$getSeatsAvailableInboundQuery = $conn->query($getSeatsAvailableInboundSQL);
				$SeatsAvailableInboundGet = $getSeatsAvailableInboundQuery ->fetch_array(MYSQLI_NUM);
			
				$seatsAvailableInbound = $SeatsAvailableInboundGet[0];
				$newseatsAvailable = $seatsAvailableInbound-$totalPassengers;
				
				//updating the no. of outbound seats available
				$inboundSeatUpdateSQL = "UPDATE `flights` SET seats_available='$newseatsAvailable' WHERE flight_no='$flightNoInbound'";
				$inboundSeatUpdateQuery = $conn->query($inboundSeatUpdateSQL);
						
			}
			
			elseif($mode=="OneWayFlight"){
				
				$getBookedSeatsOutboundSQL = "SELECT noOfBookings FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$getBookedSeatsOutboundQuery = $conn->query($getBookedSeatsOutboundSQL);
				$bookedSeatsOutboundGet = $getBookedSeatsOutboundQuery ->fetch_array(MYSQLI_NUM);
			
				$bookedSeatsOutbound = $bookedSeatsOutboundGet[0];
				$newBookedSeats = $bookedSeatsOutbound+$totalPassengers;
				
				//updating the no. of bookings
				$outboundBookingUpdateSQL = "UPDATE `flights` SET noOfBookings='$newBookedSeats' WHERE flight_no='$flightNoOutbound'";
				$outboundBookingUpdateQuery = $conn->query($outboundBookingUpdateSQL);
				
				
				$getSeatsAvailableOutboundSQL = "SELECT seats_available FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$getSeatsAvailableOutboundQuery = $conn->query($getSeatsAvailableOutboundSQL);
				$SeatsAvailableOutboundGet = $getSeatsAvailableOutboundQuery ->fetch_array(MYSQLI_NUM);
			
				$seatsAvailableOutbound = $SeatsAvailableOutboundGet[0];
				$newseatsAvailable = $seatsAvailableOutbound-$totalPassengers;
				
				//updating the no. of seats available
				$outboundSeatUpdateSQL = "UPDATE `flights` SET seats_available='$newseatsAvailable' WHERE flight_no='$flightNoOutbound'";
				$outboundSeatUpdateQuery = $conn->query($outboundSeatUpdateSQL);
	
			}
		
		
		
		?>
		
		<div class="col-sm-12 generateTicket">
		
			<div class="commonHeader">
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-7 text-left">
					
					<div class="headingOne">
						
						E-Ticket
						
					</div>
					
					<div class="dateTime">
						
						<span class="generated">Generated: </span><?php echo $date; ?>
						
					</div>
					
				</div>
				
				<div class="col-sm-3 text-right">
					
					<a href="./"><img src="images/logo.png" alt="Project Meteor Logo" /></a>
					
				</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div>
				
				<div class="col-sm-1"></div>
				<div class="col-sm-10 bar"></div>
				<div class="col-sm-1"></div>
					
			</div> <!-- contains the header and logo -->
			
			<!-- changing contents of the page based on mode -->
			
			<?php if($mode=="OneWayFlight"): ?>
				
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Outbound Flight
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10 boxCenter"> <!-- outboundFlight Box -->
				
					<?php
				
					$outboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoOutbound'";
					$outboundFlightQuery = $conn->query($outboundFlightSQL);
					$row = $outboundFlightQuery->fetch_assoc();
					
					?>
				
					<div class="col-sm-2 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Operator
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $row["operator"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $flightNoOutbound; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="originHeading">
						
							Origin
							
						</div>
						
						<div class="origin">
						
							<?php echo $row["origin"]; ?>
							
						</div>
						
						<div class="originSubscript">
						
							<?php echo $row["origin_code"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="destinationHeading">
						
							Destination
							
						</div>
						
						<div class="origin">
						
							<?php echo $row["destination"]; ?>
							
						</div>
						
						<div class="destinationSubscript">
						
							<?php echo $row["destination_code"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="departsHeading">
						
							Departure
							
						</div>
						
						<div class="departs">
						
							<?php echo $depart; ?>
							
						</div>
						
						<div class="departsSubscript">
						
							<?php echo $row["departs"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="arrivesHeading">
						
							Arrival
							
						</div>
						
						<div class="arrives">
						
							<?php echo $depart; ?>
							
						</div>
						
						<div class="arrivesSubscript">
						
							<?php echo $row["arrives"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 text-center">
					
						<div class="classHeading">
						
							Class
							
						</div>
						
						<div class="class">
						
							<?php echo $className; ?>
							
						</div>
						
						<div class="classSubscript">
						
							<?php echo $row["refundable"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
				</div> <!-- outboundFlight Box -->
			
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Passenger Details
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
			
					<div class="col-sm-10 boxCenter">
					
						<div class="columnHeaders">
							
							<div class="col-sm-2 borderBottom">
								
								<div class="serialNoHeader text-center">
									
									Sl. No.
									
								</div>
								
							</div>
							
							<div class="col-sm-7 borderBottom">
								
								<div class="passengerNameHeader text-center">
									
									Name of the passenger
									
								</div>
								
							</div>
							
							<div class="col-sm-3 borderBottom">
								
								<div class="genderHeader text-center">
									
									Gender
									
								</div>
								
							</div>
							
						</div> <!-- columnHeaders -->
						
						<?php for($i=1; $i<=$totalPassengers; $i++) {?>
						
						<div class="col-sm-2">
								
								<div class="serialNo text-center">
									
									<?php echo $i; ?>
									
								</div>
								
							</div>
							
							<div class="col-sm-7">
								
								<div class="passengerName text-center">
									
									<?php echo $name[$i]; ?>
									
								</div>
								
							</div>
							
							<div class="col-sm-3">
								
								<div class="gender text-center">
									
									<?php echo $gender[$i]; ?>
									
								</div>
								
							</div>
							
							<?php } ?>		
						
					</div> <!-- boxCenter -->
				
				<div class="col-sm-1"></div>
			
			
			<?php elseif($mode=="ReturnTripFlight"): ?>
			
			<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Outbound Flight
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10 boxCenter"> <!-- outboundFlight Box -->
				
					<?php
				
					$outboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoOutbound'";
					$outboundFlightQuery = $conn->query($outboundFlightSQL);
					$rowOutbound = $outboundFlightQuery->fetch_assoc();
					
					?>
				
					<div class="col-sm-2 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Operator
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $rowOutbound["operator"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $flightNoOutbound; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="originHeading">
						
							Origin
							
						</div>
						
						<div class="origin">
						
							<?php echo $rowOutbound["origin"]; ?>
							
						</div>
						
						<div class="originSubscript">
						
							<?php echo $rowOutbound["origin_code"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="destinationHeading">
						
							Destination
							
						</div>
						
						<div class="origin">
						
							<?php echo $rowOutbound["destination"]; ?>
							
						</div>
						
						<div class="destinationSubscript">
						
							<?php echo $rowOutbound["destination_code"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="departsHeading">
						
							Departure
							
						</div>
						
						<div class="departs">
						
							<?php echo $depart; ?>
							
						</div>
						
						<div class="departsSubscript">
						
							<?php echo $rowOutbound["departs"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="arrivesHeading">
						
							Arrival
							
						</div>
						
						<div class="arrives">
						
							<?php echo $depart; ?>
							
						</div>
						
						<div class="arrivesSubscript">
						
							<?php echo $rowOutbound["arrives"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 text-center">
					
						<div class="classHeading">
						
							Class
							
						</div>
						
						<div class="class">
						
							<?php echo $className; ?>
							
						</div>
						
						<div class="classSubscript">
						
							<?php echo $rowOutbound["refundable"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
				</div> <!-- outboundFlight Box -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Inbound Flight
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10 boxCenter"> <!-- inboundFlight Box -->
				
					<?php
				
					$outboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoInbound'";
					$inboundFlightQuery = $conn->query($outboundFlightSQL);
					$rowInbound = $inboundFlightQuery->fetch_assoc()
					
					?>
				
					<div class="col-sm-2 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Operator
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $rowInbound["operator"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $flightNoInbound; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="originHeading">
						
							Origin
							
						</div>
						
						<div class="origin">
						
							<?php echo $rowInbound["origin"]; ?>
							
						</div>
						
						<div class="originSubscript">
						
							<?php echo $rowInbound["origin_code"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="destinationHeading">
						
							Destination
							
						</div>
						
						<div class="origin">
						
							<?php echo $rowInbound["destination"]; ?>
							
						</div>
						
						<div class="destinationSubscript">
						
							<?php echo $rowInbound["destination_code"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="departsHeading">
						
							Departure
							
						</div>
						
						<div class="departs">
						
							<?php echo $return; ?>
							
						</div>
						
						<div class="departsSubscript">
						
							<?php echo $rowInbound["departs"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="arrivesHeading">
						
							Arrival
							
						</div>
						
						<div class="arrives">
						
							<?php echo $return; ?>
							
						</div>
						
						<div class="arrivesSubscript">
						
							<?php echo $rowInbound["arrives"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 text-center">
					
						<div class="classHeading">
						
							Class
							
						</div>
						
						<div class="class">
						
							<?php echo $className; ?>
							
						</div>
						
						<div class="classSubscript">
						
							<?php echo $rowInbound["refundable"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
				</div> <!-- inboundFlight Box -->
				
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Passenger Details
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
			
					<div class="col-sm-10 boxCenter">
					
						<div class="columnHeaders">
							
							<div class="col-sm-2 borderBottom">
								
								<div class="serialNoHeader text-center">
									
									Sl. No.
									
								</div>
								
							</div>
							
							<div class="col-sm-7 borderBottom">
								
								<div class="passengerNameHeader text-center">
									
									Name of the passenger
									
								</div>
								
							</div>
							
							<div class="col-sm-3 borderBottom">
								
								<div class="genderHeader text-center">
									
									Gender
									
								</div>
								
							</div>
							
						</div> <!-- columnHeaders -->
						
						<?php for($i=1; $i<=$totalPassengers; $i++) {?>
						
						<div class="col-sm-2">
								
								<div class="serialNo text-center">
									
									<?php echo $i; ?>
									
								</div>
								
							</div>
							
							<div class="col-sm-7">
								
								<div class="passengerName text-center">
									
									<?php echo $name[$i]; ?>
									
								</div>
								
							</div>
							
							<div class="col-sm-3">
								
								<div class="gender text-center">
									
									<?php echo $gender[$i]; ?>
									
								</div>
								
							</div>
							
							<?php } ?>
							
						
					</div> <!-- boxCenter -->
				
				<div class="col-sm-1"></div>
			
			
			
			
			<?php else: ?> <!-- add buses, cabs, trains here -->
			
			<div class="headingOne">
				
				None
				
			</div>
			
			<?php endif; ?>
			
			<div class="importantInfo">
			
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-12 spacer">a</div>
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
					<div class="col-sm-10">
				
						<div class="subHeading">
							
							Important Information
							
						</div>
					
					</div>
						
				<div class="col-sm-1"></div>
					
				<div class="col-sm-12"></div>
						
				<div class="col-sm-1"></div>
				<div class="col-sm-10 bar"></div>
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
					
					<div class="info">
						
						<span class="strong">1.</span> A printed copy of this E-ticket must be presented at the time of check-in.						
						
					</div>
					
					<div class="info">
						
						<span class="strong">2.</span> Check-in starts 2 hours before scheduled departure and closes 45 minutes prior to the departure time. We recommend you report at the check-in counter at least 2 hours prior to the departure time.
						
					</div>
					
					<div class="info">
						
						<span class="strong">3.</span> It is mandatory to carry Government recognised photo identification (ID) along with your E-Ticket. This can include: Driving License, Passport, PAN Card, Voter ID Card or any other ID issued by the Government of India. For infant passengers, it is mandatory to carry the Date of Birth certificate.
						
					</div>
					
				</div>
				
				<div class="col-sm-1"></div>
							
				<div class="col-sm-12 spacer">a</div>
								
				<div class="col-sm-12"></div> <!-- empty class -->
				
			</div> <!-- importantInfo -->
			
			
			
		</div> <!-- generateTicket -->
				
		<div class="spacer">a</div>
					
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>

<!-- after user login system is built push the username using the curent session to the database -->
<?php

	$user = $_SESSION["username"];
	$dateFormatted=date("d-m-Y"); //formatting the date as DD-MM-YY
	$bookingDataInsertSQL = "INSERT INTO `flightbookings`(username,date,cancelled,origin,destination,passengers,type) VALUES('$user','$dateFormatted','no','$origin','$destination','$totalPassengers','$mode')";
	$bookingDataInsertQuery = $conn->query($bookingDataInsertSQL);
				
	$bookingIDSQL = "SELECT * FROM `flightbookings` ORDER BY `bookingID` DESC LIMIT 1";
	$bookingIDQuery = $conn->query($bookingIDSQL);
	$bookingIDGet = $bookingIDQuery ->fetch_array(MYSQLI_NUM);
	$latestBookingID = $bookingIDGet[0];
	$currentBookingID = $latestBookingID;

?>
		
<!-- saving the file as temp.html -->
<?php
file_put_contents('tickets\ticket'.$currentBookingID.'.html', ob_get_contents());
?>