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
	
		<title>Hotel Search | Project Meteor</title>
    
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
		
			$city=$_GET["city"];
			$checkIn=$_GET["checkIn"];
			$checkOut=$_GET["checkOut"];
			$noOfRooms=$_GET["rooms"];
		
			if($noOfRooms=="1") {
				$room1=$_GET["room1"];
			}
			elseif($noOfRooms=="2") {
				$room1=$_GET["room1"];
				$room2=$_GET["room2"];
			}
			elseif($noOfRooms=="3") {
				$room1=$_GET["room1"];
				$room2=$_GET["room2"];
				$room3=$_GET["room3"];
			}
			elseif($noOfRooms=="4") {
				$room1=$_GET["room1"];
				$room2=$_GET["room2"];
				$room3=$_GET["room3"];
				$room4=$_GET["room4"];
			}
		
			$_SESSION["city"]=$city;
			$_SESSION["checkIn"]=$checkIn;
			$_SESSION["checkOut"]=$checkOut;
			$_SESSION["noOfRooms"]=$noOfRooms;
			
			if($noOfRooms=="1") {
				$_SESSION["room1"]=$room1;
				$_SESSION["noOfGuests"]=(int)$room1;
			}
			elseif($noOfRooms=="2") {
				$_SESSION["room1"]=$room1;
				$_SESSION["room2"]=$room2;
				$_SESSION["noOfGuests"]=(int)$room1+(int)$room2;
			}
			elseif($noOfRooms=="3") {
				$_SESSION["room1"]=$room1;
				$_SESSION["room2"]=$room2;
				$_SESSION["room3"]=$room3;
				$_SESSION["noOfGuests"]=(int)$room1+(int)$room2+(int)$room3;
			}
			elseif($noOfRooms=="4") {
				$_SESSION["room1"]=$room1;
				$_SESSION["room2"]=$room2;
				$_SESSION["room3"]=$room3;
				$_SESSION["room4"]=$room4;
				$_SESSION["noOfGuests"]=(int)$room1+(int)$room2+(int)$room3+(int)$room4;
			}
		
		?>
		
		<div class="spacer">a</div>
		
		<div class="searchHotels">
					
			<div class="query">
						
				Hotels in <?php echo $city; ?>	
						
			</div>
			

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
		
			$sql = "SELECT * FROM hotels WHERE city='$city'";
			$rowcount = mysqli_num_rows(mysqli_query($conn,$sql));
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				
		?>
		
			<div class="col-sm-12 noOfHotels">
				<?php echo $rowcount ." hotels found.";?>
			</div>
			
		</div> <!-- searchFlights -->
		
		<div class="col-sm-12 searchHotels">
		
		<?php
				while($row = $result->fetch_assoc()) {
        			
		?>
					
			<div class="col-sm-4 text-center">
												
				<div class="col-sm-12 listItem">
													
				<!-- FLIGHT INFO STARTS -->

				<div class="col-sm-12 imageContainer text-center">
										
					<img src="<?php echo $row["mainImage"]; ?>" alt="<?php echo $row["hotelName"] ?>">
										
				</div>
				
				
				<div class="col-sm-12 hotelName"><?php echo $row["hotelName"]; ?></div>
				
				<div class="col-sm-12 starContainer">
					
					<?php
					
						$noOfStars=$row["stars"];
					
						for($i=0; $i<$noOfStars; $i++) {?>
						
						<i class="fa fa-star"></i>
						
						<?php } ?>
					
				</div>
				
				<div class="col-sm-12 priceContainer">
					
					₹ <?php echo $row["price"] ?>
					
				</div>
				
				<div class="col-sm-12 priceNote">
					
					per room per night
					
				</div>
				
				<div class="col-sm-12 view">
					
					<a href="hotelDetails.php?hotelId=<?php echo $row["hotelID"]; ?>"><input type="button" class="viewDetails" name="viewDetails" value="View Hotel Details"/></a>
					
				</div>
	
				
			</div> <!-- listItem 1 -->
  		
  		</div>
   		

   		<?php
    			
				} ?>
				
				</div>
			
		<?php	} else {
    			
		?>
		
		<div class="col-sm-12 searchHotels">
		
			<div class="noHotels">
			
				No hotels found. Please consider modifying your search query.
			
			</div>
		
		</div>
		
		<?php
			
			}
		
		?>
		
		<?php $conn->close(); //closing the connection to the database ?>
			
		<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>