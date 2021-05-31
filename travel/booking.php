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
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Booking | tourism_management</title>
    
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
		
			$mode=$_POST["modeHidden"];
		
		?>
		
		<?php
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "projectmeteor";
			
			// Creating a connection to MySQL database
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Checking if successfully connected to the database
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
		?>
		
		<div class="spacer">a</div>
		
		<div class="bookingWrapper">
			
			<div class="headingOne">
				
				Please review and confirm your booking
				
			</div>
			
			<!-- changing contents of the page based on mode -->
			
			
			<!----------------------------- ONE WAY FLIGHT --------------------------------->
			
			
			<?php if($mode=="OneWayFlight"): ?>
			
			<div class="col-sm-12 bookingOneWayFlight">
			
			<?php
				
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
				
				$outboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$outboundFlightQuery = $conn->query($outboundFlightSQL);
				$row = $outboundFlightQuery->fetch_assoc();
				
			?>
				
				<div class="col-sm-7"> <!-- departure container -->
				
				<div class="col-sm-12">
				
					<div class="boxLeftOneWayFlight">
					
						<div class="col-sm-12 mode">Departure</div>
						
						<div class="col-sm-4">
						
						<div class="origin"><?php echo $origin; ?></div>
						<div class="departs">Departs <?php echo $depart; ?> at: <?php echo $row["departs"]; ?></div>
						
						</div>
						
						<div class="col-sm-4">
							
							<div class="arrow"></div>
							
						</div>
						
						<div class="col-sm-4">
						
						<div class="destination"><?php echo $destination; ?></div>
						<div class="arrives">Arrives <?php echo $depart; ?> at: <?php echo $row["arrives"]; ?></div>
						
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="operator"><?php echo $row["operator"]; ?></div>
							<div class="operatorSubscript">Operator</div>
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="class"><?php echo $className; ?></div>
							<div class="classSubscript">Class</div>
						</div>
						
						
						<div class="col-sm-3 borderRight">
							<div class="adults"><?php echo $adults; ?></div>
							<div class="adultsSubscript">Adults</div>
						</div>
						
						<div class="col-sm-3">
							<div class="children"><?php echo $children; ?></div>
							<div class="childrenSubscript">Children</div>
						</div>
					
					</div> 
				
				</div> <!-- col-sm-7 Departure -->
				
				</div>
				
				<div class="col-sm-5"> <!-- fare container -->
				
				<div class="col-sm-12">
				
					<div class="boxRightOneWayFlight">
					
					<div class="col-sm-12 fareSummary">Fare Summary</div>
						
					<div class="col-sm-8">
						<div class="heading"><?php echo $adults; ?> Adults</div>
						<div class="heading"><?php echo $children; ?> Children</div>
						<div class="heading">Convenience Fee</div>	
					</div>
					
					<div class="col-sm-4">
						<div class="price"><span class="sansSerif">₹ </span><?php echo $adults*$row["fare"]; ?></div>
						<div class="price"><span class="sansSerif">₹ </span><?php echo $children*$row["fare"]; ?></div>
						<div class="price"><span class="sansSerif">₹ </span>250</div>
					</div>	
					
					<div class="col-sm-12">
							
							<div class="calcBar"></div>
							
					</div>
					
					<div class="col-sm-8">
						<div class="headingTotal">Total Fare</div>
					</div>
					
					<div class="col-sm-4">
						<div class="priceTotal"><span class="sansSerif">₹ </span><?php echo ($adults*$row["fare"])+($children*$row["fare"])+250; ?></div>
					</div>
					
					<form action="passengers.php" method="POST">
					
						<div class="bookingButton text-center">
							<input type="submit" class="confirmButton" value="Confirm Booking">
						</div>
						
						<?php $totalFare = ($adults*$row["fare"])+($children*$row["fare"])+250 ?>
						
						<input type="hidden" name="fareHidden" value="<?php echo $totalFare; ?>">
						<input type="hidden" name="typeHidden" value="<?php echo $type; ?>">
						<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
						<input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
						<input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
						<input type="hidden" name="departHidden" value="<?php echo $depart; ?>">
						<input type="hidden" name="returnHidden" value="<?php echo $return; ?>">
						<input type="hidden" name="adultsHidden" value="<?php echo $adults; ?>">
						<input type="hidden" name="childrenHidden" value="<?php echo $children; ?>">
						<input type="hidden" name="flightNoOutboundHidden" value="<?php echo $row["flight_no"]; ?>">
						<input type="hidden" name="modeHidden" value="<?php echo "OneWayFlight" ?>">
					
					</form>
					
				</div>
				
			</div> <!-- col-sm-5 Fare -->
			
				</div> <!-- fare container -->
				
			</div> <!-- bookingOneWayFlight -->
			
			
			<!----------------------------- RETURN TRIP FLIGHT --------------------------------->
			
			
			<?php elseif($mode=="ReturnTripFlight"): ?>
			
			<div class="col-sm-12 bookingReturnTripFlight">
			
			<?php
				
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
				
				$outboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoOutbound'";
				$outboundFlightQuery = $conn->query($outboundFlightSQL);
				$rowOutbound = $outboundFlightQuery->fetch_assoc();
				
				$inboundFlightSQL = "SELECT * FROM `flights` WHERE flight_no='$flightNoInbound'";
				$inboundFlightQuery = $conn->query($inboundFlightSQL);
				$rowInbound = $inboundFlightQuery->fetch_assoc();
				
			?>
			
				<div class="col-sm-7"> <!-- departure return container -->
			
				<div class="col-sm-12">
				
					<div class="boxLeftOneWayFlight">
					
						<div class="col-sm-12 mode">Departure</div>
						
						<div class="col-sm-4">
						
						<div class="origin"><?php echo $rowOutbound["origin"]; ?></div>
						<div class="departs">Departs <?php echo $depart; ?> at: <?php echo $rowOutbound["departs"]; ?></div>
						
						</div>
						
						<div class="col-sm-4">
							
							<div class="arrow"></div>
							
						</div>
						
						<div class="col-sm-4">
						
						<div class="destination"><?php echo $rowOutbound["destination"]; ?></div>
						<div class="arrives">Arrives <?php echo $depart; ?> at: <?php echo $rowOutbound["arrives"]; ?></div>
						
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="operator"><?php echo $rowOutbound["operator"]; ?></div>
							<div class="operatorSubscript">Operator</div>
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="class"><?php echo $className; ?></div>
							<div class="classSubscript">Class</div>
						</div>
						
						
						<div class="col-sm-3 borderRight">
							<div class="adults"><?php echo $adults; ?></div>
							<div class="adultsSubscript">Adults</div>
						</div>
						
						<div class="col-sm-3">
							<div class="children"><?php echo $children; ?></div>
							<div class="childrenSubscript">Children</div>
						</div>
					
					</div> 
				
				</div> <!-- col-sm-7 Departure -->
					
				<div class="col-sm-12">
					
						<div class="boxLeftOneWayFlight">
						
							<div class="col-sm-12 mode">Return</div>
							
							<div class="col-sm-4">
							
							<div class="origin"><?php echo $rowInbound["origin"]; ?></div>
							<div class="departs">Departs <?php echo $return; ?> at: <?php echo $rowInbound["departs"]; ?></div>
							
							</div>
							
							<div class="col-sm-4">
								
								<div class="arrow"></div>
								
							</div>
							
							<div class="col-sm-4">
							
							<div class="destination"><?php echo $rowInbound["destination"]; ?></div>
							<div class="arrives">Arrives <?php echo $return; ?> at: <?php echo $rowInbound["arrives"]; ?></div>
							
							</div>
							
							<div class="col-sm-3 borderRight">
								<div class="operator"><?php echo $rowInbound["operator"]; ?></div>
								<div class="operatorSubscript">Operator</div>
							</div>
							
							<div class="col-sm-3 borderRight">
								<div class="class"><?php echo $className; ?></div>
								<div class="classSubscript">Class</div>
							</div>
							
							
							<div class="col-sm-3 borderRight">
								<div class="adults"><?php echo $adults; ?></div>
								<div class="adultsSubscript">Adults</div>
							</div>
							
							<div class="col-sm-3">
								<div class="children"><?php echo $children; ?></div>
								<div class="childrenSubscript">Children</div>
							</div>
						
						</div> 
					
					</div> <!-- col-sm-7 Return -->
					
				</div> <!-- departure return container -->
					
				<div class="col-sm-5"> <!-- fare container -->
				
				<div class="col-sm-12">
				
					<div class="boxRightOneWayFlight">
					
					<div class="col-sm-12 fareSummary">Fare Summary</div>
						
					<div class="col-sm-8">
						<div class="heading"><?php echo $adults; ?> Adults</div>
						<div class="heading"><?php echo $children; ?> Children</div>
						<div class="heading">Convenience Fee</div>	
					</div>
					
					<div class="col-sm-4">
						<div class="price"><span class="sansSerif">₹ </span><?php echo $adults*($rowOutbound["fare"]+$rowInbound["fare"]); ?></div>
						<div class="price"><span class="sansSerif">₹ </span><?php echo $children*($rowOutbound["fare"]+$rowInbound["fare"]); ?></div>
						<div class="price"><span class="sansSerif">₹ </span>250</div>
					</div>	
					
					<div class="col-sm-12">
							
							<div class="calcBar"></div>
							
					</div>
					
					<div class="col-sm-8">
						<div class="headingTotal">Total Fare</div>
					</div>
					
					<div class="col-sm-4">
						<div class="priceTotal"><span class="sansSerif">₹ </span><?php echo ($adults*($rowOutbound["fare"]+$rowInbound["fare"]))+($children*($rowOutbound["fare"]+$rowInbound["fare"]))+250; ?></div> <!-- CHANGE -->
					</div>
					
					<form action="passengers.php" method="POST">
					
						<div class="bookingButton text-center">
							<input type="submit" class="confirmButton" value="Confirm Booking">
						</div>
						
						<?php $totalFare = ($adults*($rowOutbound["fare"]+$rowInbound["fare"]))+($children*($rowOutbound["fare"]+$rowInbound["fare"]))+250 ?>
						
						<!-- CHANGE -->
						
						<input type="hidden" name="fareHidden" value="<?php echo $totalFare; ?>">
						<input type="hidden" name="typeHidden" value="<?php echo $type; ?>">
						<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
						<input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
						<input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
						<input type="hidden" name="departHidden" value="<?php echo $depart; ?>">
						<input type="hidden" name="returnHidden" value="<?php echo $return; ?>">
						<input type="hidden" name="adultsHidden" value="<?php echo $adults; ?>">
						<input type="hidden" name="childrenHidden" value="<?php echo $children; ?>">
						<input type="hidden" name="flightNoOutboundHidden" value="<?php echo $rowOutbound["flight_no"]; ?>">
						<input type="hidden" name="flightNoInboundHidden" value="<?php echo $rowInbound["flight_no"]; ?>">
						<input type="hidden" name="modeHidden" value="<?php echo "ReturnTripFlight" ?>">
					
					</form>
					
				</div>
				
			</div> <!-- col-sm-5 Fare -->
			
				</div> <!-- fare return container -->
				
			</div> <!-- bookingReturnTripFlight -->
			
			
			<!----------------------------- HOTEL --------------------------------->
			
			
			<?php elseif($mode=="hotel"): ?>
			
			<div class="col-sm-12 bookingHotel">
			
			<?php
				
				$hotelID = $_POST["hotelIDHidden"];
				
				$hotelSQL = "SELECT * FROM `hotels` WHERE hotelID='$hotelID'";
				$hotelQuery = $conn->query($hotelSQL);
				$row = $hotelQuery->fetch_assoc();
				
			?>
				
				<div class="col-sm-7"> <!-- hotel summary container -->
				
				<div class="col-sm-12">
				
					<div class="boxLeftHotel">
					
						<div class="col-sm-12 hotelMode">Booking Summary</div>
						
						<div class="col-sm-12 hotelName">
							
							Name of the hotel: <span class="nameText"><?php echo $row["hotelName"].', '.$row["locality"].', '.$row["city"]; ?></span>
							
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="checkIn"><?php echo $_SESSION["checkIn"]; ?></div>
							<div class="checkInSubscript">Check In Date</div>
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="checkOut"><?php echo $_SESSION["checkOut"]; ?></div>
							<div class="checkOutSubscript">Check Out Date</div>
						</div>
						
						
						<div class="col-sm-3 borderRight">
							<div class="noOfRooms"><?php echo $_SESSION["noOfRooms"]; ?></div>
							<div class="noOfRoomsSubscript">No. of rooms</div>
						</div>
						
						<div class="col-sm-3">
							<div class="noOfGuests"><?php echo $_SESSION["noOfGuests"]; ?></div>
							<div class="noOfGuestsSubscript">No. of guests</div>
						</div>
					
					</div> <!-- boxLeft -->
				
				</div> <!-- col-sm-7 bookings -->
				
				</div>
				
				<div class="col-sm-5"> <!-- fare container -->
				
				<div class="col-sm-12">
				
					<div class="boxRightHotel">
					
					<div class="col-sm-12 fareSummary">Payment Summary</div>
						
					<div class="col-sm-8">
					
					<?php
						
						$var1 = $_SESSION["checkIn"];
						$var2 = $_SESSION["checkOut"];
						$date1 = date_create(str_replace('/', '-', $var1));
						$date2 = date_create(str_replace('/', '-', $var2));
						$diff=date_diff($date1,$date2);
					
					?>
					
						<div class="heading"><?php echo $_SESSION["noOfRooms"]; ?> Rooms x <?php echo $diff->format("%a Days"); ?></div>
						<div class="heading">Convenience Fee</div>	
					</div>
					
					<?php $noOfDays = $diff->format("%a"); ?>
					
					<div class="col-sm-4">
						<div class="price"><span class="sansSerif">₹ </span><?php echo $_SESSION["noOfRooms"]*$row["price"]*$noOfDays; ?></div>
						<div class="price"><span class="sansSerif">₹ </span>250</div>
					</div>	
					
					<div class="col-sm-12">
							
							<div class="calcBar"></div>
							
					</div>
					
					<div class="col-sm-8">
						<div class="headingTotal">Total Payment</div>
					</div>
					
					<div class="col-sm-4">
						<div class="priceTotal"><span class="sansSerif">₹ </span><?php echo ($_SESSION["noOfRooms"]*$row["price"]*$noOfDays)+250; ?></div>
					</div>
					
					<form action="payment.php" method="POST">
					
						<div class="bookingButton text-center">
							<input type="submit" class="confirmButton" value="Confirm Booking">
						</div>
						
						<?php $totalFare = ($_SESSION["noOfRooms"]*$row["price"]*$noOfDays)+250; ?>
						
						<input type="hidden" name="fareHidden" value="<?php echo $totalFare; ?>">
						<input type="hidden" name="hotelIDHidden" value="<?php echo $hotelID; ?>">
						<input type="hidden" name="modeHidden" value="<?php echo "hotel" ?>">
					
					</form>
					
				</div>
				
			</div> <!-- col-sm-5 Fare -->
			
				</div> <!-- fare container -->
				
			</div> <!-- hotel -->
			
			
			
			<!-------------------------------------------------train----------------------------------------->
			
			<?php elseif($mode=="train"): ?>
			
			<div class="col-sm-12 bookingTrain">
			
			<?php
				
				$trainID = $_POST["trainIdPass"];
				$date=$_POST["dateHidden"];
				$day=$_POST["dayHidden"];
				$origin=$_POST["originHidden"];
				$destination=$_POST["destinationHidden"];
				$class=$_POST["classHidden"];
				$noOfPassengers= $_POST["passengersHidden"];
				$priceClass = trim('price'.$class);
				
				$trainFinderSQL = "SELECT * FROM `trains` WHERE trainNo='$trainID'";
				$trainFinderQuery = $conn->query($trainFinderSQL);
				$row = $trainFinderQuery->fetch_assoc();
				
			?>
				
				<div class="col-sm-7"> <!-- departure container -->
				
				<div class="col-sm-12">
				
					<div class="boxLeftBus">
					
						<div class="col-sm-12 mode">Departure</div>
						
						<div class="col-sm-4">
						
						<div class="origin"><?php echo $origin; ?></div>
						<div class="departs">Departs at: <?php echo $row["originTime"]; ?></div>
						
						</div>
						
						<div class="col-sm-4">
							
							<div class="arrow"></div>
							
						</div>
						
						<div class="col-sm-4">
						
						<div class="destination"><?php echo $destination; ?></div>
						<div class="arrives">Arrives at: <?php echo $row["destinationTime"]; ?></div>
						
						</div>
						
						<div class="col-sm-3 borderRight">
							<div class="class"><?php echo $date; ?></div>
							<div class="classSubscript">Date of journey</div>
						</div>
						
						<div class="col-sm-5 borderRight">
							<div class="operator"><?php echo $row["trainName"]; ?></div>
							<div class="operatorSubscript">Name of the train</div>
						</div>
						
						<div class="col-sm-2 borderRight">
							<div class="operator"><?php echo $class; ?></div>
							<div class="operatorSubscript">Class</div>
						</div>
						
						<div class="col-sm-2">
							<div class="adults"><?php echo $noOfPassengers; ?></div>
							<div class="adultsSubscript">Passengers</div>
						</div>
					
					</div> 
				
				</div> <!-- col-sm-7 Departure -->
				
				</div>
				
				<div class="col-sm-5"> <!-- fare container -->
				
				<div class="col-sm-12">
				
					<div class="boxRightBus">
					
					<div class="col-sm-12 fareSummary">Fare Summary</div>
						
					<div class="col-sm-8">
						<div class="heading"><?php echo $noOfPassengers; ?> Passengers</div>
						<div class="heading">Convenience Fee</div>	
					</div>
					
					<div class="col-sm-4">
						<div class="price"><span class="sansSerif">₹ </span><?php echo $noOfPassengers*$row[$priceClass]; ?></div>
						<div class="price"><span class="sansSerif">₹ </span>250</div>
					</div>	
					
					<div class="col-sm-12">
							
							<div class="calcBar"></div>
							
					</div>
					
					<div class="col-sm-8">
						<div class="headingTotal">Total Fare</div>
					</div>
					
					<div class="col-sm-4">
						<div class="priceTotal"><span class="sansSerif">₹ </span><?php echo ($noOfPassengers*$row[$priceClass])+250; ?></div>
					</div>
					
					<form action="passengers.php" method="POST">
					
						<div class="bookingButton text-center">
							<input type="submit" class="confirmButton" value="Confirm Booking">
						</div>
						
						<?php $totalFare = ($noOfPassengers*$row[$priceClass])+250; ?>
						
						<input type="hidden" name="fareHidden" value="<?php echo $totalFare; ?>">
						<input type="hidden" name="dateHidden" value="<?php echo $date; ?>">
						<input type="hidden" name="dayHidden" value="<?php echo $day; ?>">
						<input type="hidden" name="originHidden" value="<?php echo $origin; ?>">
						<input type="hidden" name="destinationHidden" value="<?php echo $destination; ?>">
						<input type="hidden" name="classHidden" value="<?php echo $class; ?>">
						<input type="hidden" name="noOfPassengersHidden" value="<?php echo $noOfPassengers; ?>">
						<input type="hidden" name="modeHidden" value="<?php echo "train"; ?>">
						<input type="hidden" name="trainIDHidden" value="<?php echo $trainID; ?>">
					
					</form>
					
				</div>
				
			</div> <!-- col-sm-5 Fare -->
			
				</div> <!-- fare container -->
				
			</div> <!-- train -->
			
			<?php endif; ?>
			
		</div> <!--bookingWrapper -->
		
	<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>