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
	
		<title>Hotel Details | tourism_management</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/hotelDetails.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
		
		<?php include("common/headerLoggedIn.php"); ?>
		
		<?php
		
			$hotelID=$_GET["hotelId"];
		
		?>
		
		<div class="spacer">a</div>
		<div class="spacer">a</div>
		
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
		
			$sql = "SELECT * FROM hotels WHERE hotelID='$hotelID'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc()
			
		?>
		
		<div class="col-sm-1"></div> <!-- empty div -->
		
		<div class="col-sm-10 hotelDetails">
		
			<div class="col-sm-12 listItem">
			
				<div class="col-sm-8 leftBox">
				
					<div class="col-sm-12 imageContainer">
						
						<img src="<?php echo $row["mainImage"]; ?>" alt="Image not found" />
						
					</div>
				
				</div>
				
				<div class="col-sm-4 rightBox borderLeft">
				
					<div class="hotelName col-sm-12 text-center noMargin">
						
						<?php echo $row["hotelName"]; ?>
						
					</div>
					
					<div class="location col-sm-12 text-center">
						
						<span class="fa fa-map-marker"></span> <?php echo $row["locality"].', '.$row["city"]; ?>
						
					</div>
				
					<div class="col-sm-5 text-center">
					
						<div class="col-sm-12 rating noMargin">
							
							<?php echo $row["rating"]; ?>
							
						</div>
						
						<div class="col-sm-12 ratingText noMargin">
							
							<?php
					
							$rating=$row["rating"];
					
							if($rating>=4): ?>
								
								Excellent
									
							<?php
						
							elseif($rating>=3 and $rating<4): ?>
							
								Average
								
							<?php
						
							elseif($rating<3): ?>
							
								Bad
								
							<?php endif; ?>
								
						</div>
					
					</div>
					
					<div class="col-sm-7 text-center">
						
						<div class="col-sm-12 starContainer">
					
						<?php
					
							$noOfStars=$row["stars"];
					
							for($i=0; $i<$noOfStars; $i++) {?>
								
								<i class="fa fa-star"></i>
						
						<?php } ?>
					
						</div>
						
					</div>
					
					<div class="col-sm-12 amenities text-center">
						
						<ul>
							
							<?php if($row["wifi"]=="Yes") {?>
								<li class="fa fa-wifi icons" id="wifi"></li>
							<?php } ?>
								
							<?php if($row["swimmingPool"]=="Yes") {?>
								<li class="fa fa-life-buoy icons" id="pool"></li>
							<?php } ?>
							
							<?php if($row["parking"]=="Yes") {?>
								<li class="fa fa-car icons" id="parking"></li>
							<?php } ?>
							
							<?php if($row["restaurant"]=="Yes") {?>
								<li class="fa fa-cutlery icons" id="restaurant"></li>
							<?php } ?>
							
							<?php if($row["laundry"]=="Yes") {?>
								<li class="fa fa-shirtsinbulk icons" id="laundry"></li>
							<?php } ?>
							
							<?php if($row["cafe"]=="Yes") {?>
								<li class="fa fa-coffee icons" id="cafe"></li>
							<?php } ?>
							
						</ul>
						
					</div> <!-- amenities -->
					
					<div class="col-sm-12 checkInOut text-center">
						
						<div class="col-sm-6 checkIn">
							
							<div class="col-sm-12 time">
								
								<?php echo $row["checkIn"]; ?>
								
							</div>
							
							<div class="col-sm-12 timeTag">
								
								Check In
								
							</div>
							
						</div>
						
						<div class="col-sm-6 checkOut">
							
							<div class="col-sm-12 time">
								
								<?php echo $row["checkOut"]; ?>
								
							</div>
							
							<div class="col-sm-12 timeTag">
								
								Check Out
								
							</div>
							
						</div>
						
					</div> <!-- checkInOut -->
					
					<div class="col-sm-12 priceContainer text-center">
						
						₹ <?php echo $row["price"]; ?>
						
					</div>
						
					<div class="col-sm-12 priceNote text-center">
						
						per room per night
						
					</div>
					
					<!-- creating a form -->
					
					<form action="booking.php" method="POST">
					
						<div class="col-sm-12 text-center">
							
							<input type="submit" class="bookNow" value="Book Now" /> 
				
						</div>
						
						<input type="hidden" name="modeHidden" value="hotel" />
						<input type="hidden" name="hotelIDHidden" value="<?php echo $hotelID; ?>" />
					
					</form>
				
				</div> <!-- right box -->
				
				<div class="col-sm-12 hotelDesc">
					
					<?php echo $row["hotelDesc"]; ?>
					
				</div>
		
			</div>
			
		</div>
		
		<div class="col-sm-1"></div> <!-- empty div -->
		
		<div class="col-sm-12 spacer">.</div> <!-- just a dummy class for creating some space -->
		<div class="col-sm-12 spacer">.</div> <!-- just a dummy class for creating some space -->
		<div class="col-sm-12 spacer">.</div> <!-- just a dummy class for creating some space -->
				
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>