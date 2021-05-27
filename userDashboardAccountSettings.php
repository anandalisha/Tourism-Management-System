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
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>Dashboard | tourism_management</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap-select.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/userDashboard.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/bootstrap-select.js"></script>
    	<script src="js/bootstrap-dropdown.js"></script>
    	<script src="js/jquery-2.1.1.min.js"></script>
    	<script src="js/moment-with-locales.js"></script>
    	<script src="js/bootstrap-datetimepicker.js"></script>
    		
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "projectmeteor";
		
		// Creating a connection to projectmeteor MySQL database
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Checking if we've successfully connected to the database
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	
	?>
	
	<body>
	
		<div class="container-fluid">
		
			<div class="col-sm-12 userDashboard text-center">
			
			<?php include("common/headerDashboardTransparentLoggedIn.php"); ?>
			
			<div class="col-sm-12">
					
				<div class="heading">
					My Dashboard
				</div>
						
			</div>
			
			<div class="col-sm-1"></div>
			
			<div class="col-sm-3 containerBoxLeft">
				
				<a href="userDashboardProfile.php">
				<div class="col-sm-12 menuContainer bottomBorder">
					<span class="fa fa-user-o"></span> My Profile
				</div>
				</a>
				
				<a href="userDashboardBookings.php">
				<div class="col-sm-12 menuContainer bottomBorder">
					<span class="fa fa-copy"></span> My Bookings
				</div>
				</a>
				
				<a href="userDashboardETickets.php">
				<div class="col-sm-12 menuContainer bottomBorder">
					<span class="fa fa-clone"></span> My E-Tickets
				</div>
				</a>
				
				<a href="userDashboardCancelTicket.php">
				<div class="col-sm-12 menuContainer bottomBorder">
					<span class="fa fa-close"></span> Cancel Ticket
				</div>
				</a>
				
				<div class="col-sm-12 menuContainer active">
					<span class="fa fa-bar-chart"></span> Account Stats
				</div>
				
			</div>
			
			<div class="col-sm-7 containerBoxRight text-left">
				
				<?php
				
					$user = $_SESSION["username"];
				
					$flightBookingsSQL = "SELECT COUNT(*) FROM `flightbookings` WHERE Username='$user'";
					$flightBookingsQuery = $conn->query($flightBookingsSQL);
					$noOfFlightBookings = $flightBookingsQuery->fetch_array(MYSQLI_NUM);
				
					$hotelBookingsSQL = "SELECT COUNT(*) FROM `hotelbookings` WHERE Username='$user'";
					$hotelBookingsQuery = $conn->query($hotelBookingsSQL);
					$noOfHotelBookings = $hotelBookingsQuery->fetch_array(MYSQLI_NUM);
				
					/*$cabBookingsSQL = "SELECT COUNT(*) FROM `cabbookings` WHERE Username='$user'";
					$cabBookingsQuery = $conn->query($cabBookingsSQL);
					$noOfCabBookings = $cabBookingsQuery->fetch_array(MYSQLI_NUM);
				
					$busBookingsSQL = "SELECT COUNT(*) FROM `busbookings` WHERE Username='$user'";
					$busBookingsQuery = $conn->query($busBookingsSQL);
					$noOfBusBookings = $busBookingsQuery->fetch_array(MYSQLI_NUM);*/
				
					$trainBookingsSQL = "SELECT COUNT(*) FROM `trainbookings` WHERE Username='$user'";
					$trainBookingsQuery = $conn->query($trainBookingsSQL);
					$noOfTrainBookings = $trainBookingsQuery->fetch_array(MYSQLI_NUM);
				
				?>
				
				<div class="col-sm-12 settings">
							
					<div class="col-sm-6 settingsWrapper topMargin">
					<span class="tag">No. of flight bookings: </span><span class="content"><?php echo $noOfFlightBookings[0]; ?> </span>
					</div>
					<div class="col-sm-6 settingsWrapper topMargin">
					<span class="tag">No. of train bookings:  </span><span class="content text"><?php echo $noOfTrainBookings[0];?> </span>
					</div> <!-- change echo -->
					<div class="col-sm-12 settingsWrapper">
					<span class="tag">No. of hotel bookings: </span><span class="content"><?php echo $noOfHotelBookings[0]; ; ?> </span>
					</div> <!-- change echo -->
					<div class="col-sm-6 settingsWrapper">
					<span class="tag">Delete account: </span>
					<input type="button" class="button" id="deleteAccount" name="deleteAccount" value="Delete Account">
					</div> <!-- change echo -->
					<div class="col-sm-6 settingsWrapper warning">
						Please note that delete if you delete an account, you will lose access to all the data and E-tickets asociated with that account. Proceed with caution.
					</div>
					
				</div>
				
			</div>
			
			<div class="col-sm-1"></div>
			
			<div class="col-sm-12 spacer">a</div>
			<div class="col-sm-12 spacer">a</div>
			
			</div>
		
		</div> <!-- container-fluid -->
		
		<?php include("common/footer.php"); ?>
		
	</body>
	

	<!-- BODY TAG ENDS -->
	
</html>
	