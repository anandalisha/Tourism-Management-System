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
	
		<title>Receipt | tourism_management</title>
    
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
		
		$hotelID=$_POST["hotelIDHidden"];
		$fare=$_POST["fareHidden"];
		
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
		
		
		?>
		
		<div class="col-sm-12 generateReceipt">
		
			<div class="commonHeader">
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-7 text-left">
					
					<div class="headingOne">
						
						Booking Receipt
						
					</div>
					
					<div class="dateTime">
						
						<span class="generated">Generated: </span><?php echo $date; ?>
						
					</div>
					
				</div>
				
				<div class="col-sm-3 text-right">
					
					
				</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div>
				
				<div class="col-sm-1"></div>
				<div class="col-sm-10 bar"></div>
				<div class="col-sm-1"></div>
					
			</div> <!-- contains the header  -->
				
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Booking Information:
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
			
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10 boxCenter"> <!-- outboundFlight Box -->
				
					<?php
					
						$sql = "SELECT * FROM hotels WHERE hotelID='$hotelID'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc()
					
					?>
					
					<div class="col-sm-1 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Hotel ID
							
						</div>
						
						<div class="flightOperator">
						
							<?php $hotelID=$row["hotelID"];
							echo substr($hotelID,0,3) ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php $hotelID=$row["hotelID"];
							echo substr($hotelID,3) ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-3 borderRight text-center">
					
						<div class="flightOperatorHeading">
						
							Hotel Name
							
						</div>
						
						<div class="flightOperator">
						
							<?php echo $row["hotelName"]; ?>
							
						</div>
						
						<div class="flightNo">
						
							<?php echo $row["locality"].', '.$row["city"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="departsHeading">
						
							Check In
							
						</div>
						
						<div class="departs">
						
							<?php echo $_SESSION["checkIn"]; ?>
							
						</div>
						
						<div class="departsSubscript">
						
							<?php echo $row["checkIn"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="arrivesHeading">
						
							Check Out
							
						</div>
						
						<div class="arrives">
						
							<?php echo $_SESSION["checkOut"]; ?>
							
						</div>
						
						<div class="arrivesSubscript">
						
							<?php echo $row["checkOut"]; ?>
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 borderRight text-center">
					
						<div class="originHeading">
						
							No. of rooms
							
						</div>
						
						<div class="origin">
						
							<?php echo $_SESSION["noOfRooms"]; ?>
							
						</div>
						
						<div class="originSubscript">
						
							rooms
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
					<div class="col-sm-2 text-center">
					
						<div class="destinationHeading">
						
							No. of guests
							
						</div>
						
						<div class="origin">
						
							<?php echo $_SESSION["noOfGuests"]; ?>
							
						</div>
						
						<div class="destinationSubscript">
						
							guests
							
						</div>
						
					</div> <!-- col-sm-4 -->
					
				</div> <!-- outboundFlight Box -->
			
				<div class="col-sm-12 spacer">a</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-10">
			
					<div class="subHeading">
						
						Payment Information
						
					</div>
				
				</div>
							
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
				
				<div class="col-sm-12"></div> <!-- empty class -->
				
				<div class="col-sm-1"></div>
			
					<div class="col-sm-10 boxCenter">
					
						<div class="columnHeaders">
							
							<div class="col-sm-4 borderBottom">
								
								<div class="serialNoHeader text-center">
									
									Charge per room
									
								</div>
								
							</div>
							
							<div class="col-sm-4 borderBottom">
								
								<div class="passengerNameHeader text-center">
									
									Amount paid
									
								</div>
								
							</div>
							
							<div class="col-sm-4 borderBottom">
								
								<div class="genderHeader text-center">
									
									Payment Mode
									
								</div>
								
							</div>
							
						</div> <!-- columnHeaders -->
						
						<div class="col-sm-4">
								
							<div class="serialNo text-center">
								
								<span class="rupee">₹</span><?php echo $row["price"]; ?>
								
							</div>
								
						</div>
						
						<div class="col-sm-4">
								
							<div class="serialNo text-center">
								
								<span class="rupee">₹</span><?php echo $fare ?>
								
							</div>
								
						</div>
						
						<div class="col-sm-4">
								
							<div class="serialNo text-center">
								
								Card Payment
								
							</div>
								
						</div>	
						
					</div> <!-- boxCenter -->
				
				<div class="col-sm-1"></div>
			
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
						
						<span class="strong">1.</span> A printed copy of this receipt must be presented at the time of check-in.						
						
					</div>
					
					<div class="info">
						
						<span class="strong">2.</span> It is mandatory to have a Government recognised photo identification (ID) when checking-in. This can include: Driving License, Passport, PAN Card, Voter ID Card or any other ID issued by the Government of India.
						
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
	$dateFormatted = date("d-m-Y"); //formatting the date as DD-MM-YY
	$hotelName = $row["hotelName"].', '.$row["locality"].', '.$row["city"];
	$bookingDataInsertSQL = "INSERT INTO `hotelbookings`(hotelName,date,username,cancelled) VALUES('$hotelName','$dateFormatted','$user','no')";
	$bookingDataInsertQuery = $conn->query($bookingDataInsertSQL);
				
	$bookingIDSQL = "SELECT * FROM `hotelbookings` ORDER BY `bookingID` DESC LIMIT 1";
	$bookingIDQuery = $conn->query($bookingIDSQL);
	$bookingIDGet = $bookingIDQuery ->fetch_array(MYSQLI_NUM);
	$latestBookingID = $bookingIDGet[0];
	$currentBookingID = $latestBookingID;
								
?>
		
<!-- saving the file as temp.html -->
<?php
file_put_contents('receipts\receipt'.$currentBookingID.'.html', ob_get_contents());
?>