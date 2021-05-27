<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blockedBooking.php");
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
	
		<title>Flights | tourism_management</title>
    
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
    	<script src="js/scrolling-nav.js"></script>
    	<script src="js/jquery.easing.min.js"></script>
		<script type="text/javascript">
		
			$(function () {
       				$('#datetimepicker1').datetimepicker({
		   			format: 'L',
		   			locale: 'en-gb',
					useCurrent: false,
					minDate: moment()
	   				});
				
        			$('#datetimepicker2').datetimepicker({
            		useCurrent: false,
					format: 'L',
					locale: 'en-gb',
					minDate: moment()
					});
				
					$("#datetimepicker1").on("dp.change", function (e) {
            		$('#datetimepicker2').data("DateTimePicker").minDate(e.date);
        			});
				
        			$("#datetimepicker2").on("dp.change", function (e) {
            		$('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
        			});
    		});
			
		</script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid" id="book">
		
			<div class="flights col-sm-12">
			
			<!-- HEADER SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="header">
					
						<?php include("common/headerTransparentLoggedIn.php"); ?>
					
						<div class="col-sm-12">
						
						<div class="menu text-center">
							
							<ul>
								<a href="hotels.php"><li>Hotels</li></a>
								<li class="selected">Flights</li>
								<a href="trains.php"><li>Trains</li></a>
							</ul>
							
						</div>
						
					</div>
					
					</div> <!-- header -->
				
				</div> <!-- col-sm-12 -->
				
			<!-- HEADER SECTION ENDS -->
				
				
				
			<!-- FLIGHT SEARCH SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="search">
   					
    					<div class="content">
    					
    					<form name="flightSearch" action="returnTripOutboundFlightSearch.php" method="POST">
    					
    						<div class="radioContainer">
    					
    							<div class="col-sm-6 text-left">
    							
    								<input type="radio" name="flightType" value="One Way" id="oneWay">
    								<label for="oneWay"><span class="radioLeft">One Way</span></label>
 						
  									<input type="radio" name="flightType" value="Return Trip" id="returnTrip" checked>
    								<label for="returnTrip"><span class="radioLeft">Return Trip</span></label>
    							
    							</div>
    						
    							<div class="col-sm-6 text-right">
    							
    								<input type="radio" name="flightClass" value="Business Class" id="businessClass">
    								<label for="businessClass"><span class="radioRight">Business Class</span></label>
 									
  									<input type="radio" name="flightClass" value="Economy Class" id="economyClass" checked>
    								<label for="economyClass"><span class="radioRight">Economy Class</span></label>
    							
    							</div>
    						
							</div> <!-- radioContainer -->
    					
    						<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="origin">Origin:<p> </p></label>
     
      								<select id= "origin"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Origin" name="origin" required>
       									<option value="New Delhi" data-subtext="DEL" data-tokens="DEL New Delhi">New Delhi</option>
        								<option value="Mumbai" data-subtext="BOM" data-tokens="BOM Mumbai">Mumbai</option>
        								<option value="Kolkata" data-subtext="CCU" data-tokens="CCU Kolkata">Kolkata</option>
        								<option value="Bengaluru" data-subtext="BLR" data-tokens="BLR Bengaluru">Bengaluru</option>
        								<option value="Pune" data-subtext="PNQ" data-tokens="PNQ Pune">Pune</option>
        								<option value="Chennai" data-subtext="MAA" data-tokens="MAA Chennai">Chennai</option>
        								<option value="Guwahati" data-subtext="GAU" data-tokens="GAU Guwahati">Guwahati</option>
        								<option value="Bhopal" data-subtext="BHO" data-tokens="BHI Bhopal">Bhopal</option>
        								<option value="Jaipur" data-subtext="JAI" data-tokens="JAI Jaipur">Jaipur</option>
        								<option value="Ahmedabad" data-subtext="AMD" data-tokens="AMD Ahmedabad">Ahmedabad</option>
        								<option value="Hyderabad" data-subtext="HYD" data-tokens="HYD Hyderabad">Hyderabad</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="destination">Destination:<p> </p></label>
     
      								<select id= "destination"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination" name="destination" required>
       									<option value="New Delhi" data-subtext="DEL" data-tokens="DEL New Delhi">New Delhi</option>
        								<option value="Mumbai" data-subtext="BOM" data-tokens="BOM Mumbai">Mumbai</option>
        								<option value="Kolkata" data-subtext="CCU" data-tokens="CCU Kolkata">Kolkata</option>
        								<option value="Bengaluru" data-subtext="BLR" data-tokens="BLR Bengaluru">Bengaluru</option>
        								<option value="Pune" data-subtext="PNQ" data-tokens="PNQ Pune">Pune</option>
        								<option value="Chennai" data-subtext="MAA" data-tokens="MAA Chennai">Chennai</option>
        								<option value="Guwahati" data-subtext="GAU" data-tokens="GAU Guwahati">Guwahati</option>
        								<option value="Bhopal" data-subtext="BHO" data-tokens="BHI Bhopal">Bhopal</option>
        								<option value="Jaipur" data-subtext="JAI" data-tokens="JAI Jaipur">Jaipur</option>
        								<option value="Ahmedabad" data-subtext="AMD" data-tokens="AMD Ahmedabad">Ahmedabad</option>
        								<option value="Hyderabad" data-subtext="HYD" data-tokens="HYD Hyderabad">Hyderabad</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime1">Select Departure Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker1">
                						<input id="datetime1" type="text" class="inputDate form-control" placeholder="Select Departure Date" name="depart" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
    						<div class="col-sm-3">
       							<div class="form-group">
           							<label for="datetime2">Select Return Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker2">
                							<input  id="datetime2" type="text" class="inputDate form-control" placeholder="Select Return Date" name="return" required/>
                							<span class="input-group-addon">
                    						<span class="fa fa-calendar"></span>
                					</span>
            				</div>
        </div>
    </div>
            			
							<div class="col-sm-3">
	
							<label for="adults">No. of adults:<p> </p></label>
    							<div class="form-group">
    								<select id= "adults" class="selectpicker form-control" data-size="5" title="Aged 18 and above" name="adults" required>
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
  										<option value="5">5</option>
  										<option value="6">6</option>
									</select>
								</div>
							</div>
							
							<div class="col-sm-3">
							
							<label for="children">No. of children:<p> </p></label>
								<div class="form-group">
   									<select id= "children" class="selectpicker form-control" data-size="5" title="Aged upto 17" name="children" required>
  										<option value="0">0</option>
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
  										<option value="5">5</option>
  										<option value="6">6</option>
									</select>
								</div>
							</div>
            			
            				<div class="col-sm-12 text-center">
            			
            					<input type="submit" class="button" name="searchFlights" value="Search Flights">
            				
            				</div>
            				
            			</form>
            			
    					</div> <!-- content -->
    					
					</div> <!-- search -->
					
				</div>
			
			<!-- FLIGHT SEARCH SECTION ENDS -->
				
			</div> <!-- flights -->	
			
			
			
			<!-- POPULAR FLIGHTS SECTION STARTS -->
			
				<!-- <div class="col-sm-12"> -->
					
					<div class="popularFlights col-sm-12">
					
						<div class="heading">
						
								Popular Flights
						
						</div>
						
						<div class="bg">
						
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
							
							$popularFlightsSQL = "SELECT * FROM `flights` ORDER BY `noOfBookings` DESC LIMIT 3";
							$popularFlightsQuery = $conn->query($popularFlightsSQL);
							//$popularFlightsArray = $popularFlightsQuery->fetch_array(MYSQLI_NUM);
							
    						while($row = $popularFlightsQuery->fetch_assoc()) {
								
								$operator=$row["operator"];
							
						?>
						
							<!-- replace listItems below by PHP loops -->
						
							<div class="listItem">
													
								<!-- OPERATOR STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Operator
			
									</div>
		
									<div class="operatorLogo text-center">
			
										<?php if($operator=="IndiGo"): ?>
				
										<img src="images/flights/operatorLogos/indigo.jpg">
										
										<?php elseif($operator=="AirIndia"): ?>
										
										<img src="images/flights/operatorLogos/airindia.jpg">
										
										<?php elseif($operator=="Vistara"): ?>
										
										<img src="images/flights/operatorLogos/vistara.jpg">
										
										<?php elseif($row["operator"]=="Jet Airways"): ?>
							
										<img src="images/flights/operatorLogos/jetairways.jpg">
										
										<?php elseif($row["operator"]=="Spicejet"): ?>
										
										<img src="images/flights/operatorLogos/spicejet.jpg">
										
										<?php elseif($row["operator"]=="GoAir"): ?>
										
										<img src="images/flights/operatorLogos/goair.jpg">
							
										<?php elseif($row["operator"]=="AirAsia"): ?>
										
										<img src="images/flights/operatorLogos/airasia.jpg">
										
										<?php endif; ?>
										
										<!-- ADD OTHER OPERATORS HERE -->
			
									</div>
		
								</div>
	
								<!-- OPERATOR ENDS -->
	
	
								<!-- ORIGIN STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Origin
			
									</div>
		
									<div class="values origin">
		
										<?php echo $row["origin"]; ?>
			
									</div>
		
									<div class="originSubscript">
		
										<?php echo $row["origin_code"]; ?>
			
									</div>
		
								</div>
	
									<!-- ORIGIN ENDS -->
	
	
									<!-- DESTINATION STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Destination
			
									</div>
		
									<div class="values destination">
		
										<?php echo $row["destination"]; ?>
			
									</div>
		
									<div class="destinationSubscript">
		
										<?php echo $row["destination_code"]; ?>
			
									</div>
		
								</div>
	
									<!-- DESTINATION ENDS -->
	
	
									<!-- TIME STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Time
			
									</div>
		
									<div class="values time">
		
										<div class="departure">
											
											<?php echo $row["departs"]; ?>
											
										</div>
										
										<div class="arrival">
											
											<?php echo $row["arrives"]; ?>
											
										</div>
		
									</div>
		
								</div>
	
									<!-- TIME ENDS -->
	
	
									<!-- FARE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Fare
			
									</div>
		
									<div class="values fare">
		
										<?php echo $row["fare"]; ?>
			
									</div>
		
									<div class="fareSubscript">
		
										incl. of GST
			
									</div>
		
								</div>
	
									<!-- FARE ENDS -->
	
	
									<!-- AVAILABILITY STARTS -->
									
								<?php
				
								$flightNo = $row["flight_no"];
									
								$getSeatsAvailableSQL = "SELECT seats_available FROM `flights` WHERE flight_no='$flightNo'";
								$getSeatsAvailableQuery = $conn->query($getSeatsAvailableSQL);
								$SeatsAvailableGet = $getSeatsAvailableQuery ->fetch_array(MYSQLI_NUM);
							
								$seatsAvailable = $SeatsAvailableGet[0];
								
								?>
			
								<!-- allowing only those flights to be booked which have enough seats -->
				
								<?php if($seatsAvailable>0): ?>
					
								<div class="col-sm-2 text-center" style="border-right: none;">
								<!-- try to remove the inline css -->
	
									<div class="headings">
		
										Availability
			
									</div>
		
									<div class="values availabilityGreen">
		
										<?php echo $row["seats_available"]; ?>
			
									</div>
		
									<div class="availabilitySubscript">
		
										<a class="page-scroll" href="#book">
										<input type="submit" class="availabilityBookingButton" value="Book Now">
										</a>
			
									</div>
		
								</div>
								
								<?php else:  ?>
								
								<div class="col-sm-2 text-center" style="border-right: none;">
								<!-- try to remove the inline css -->
									
									<div class="headings">
		
										Availability
			
									</div>

									<div class="values availabilityRed">
				
										Unavailable
					
									</div>
				
									<div class="unavailabilitySubscript">
				
										Sold Out
					
									</div>

								</div>
				
								<?php endif;?>
	
									<!-- AVAILABILITY ENDS -->
				
							</div> <!-- listItem -->
							
						<?php } ?>
							
						</div> <!-- bg -->
						
					</div> <!-- popularFlights -->
					
				<!-- </div> -->
				
			<!-- POPULAR FLIGHTS SECTION ENDS -->
			
			
			
			<!-- FOOTER SECTION STARTS -->
					
				<div class="footer col-sm-12">
					
					<div class="col-sm-4">
						
						<div class="footerHeading">
							Contact Us
						</div>
							
						<div class="footerText">
							CUSAT,Cochin <br> Kerala, India
						</div>
				
						<div class="footerText">
							E-mail: queries@tourism_management.com
						</div>
						
					</div>
					
					<div class="col-sm-4">
						
					</div>
					
					<div class="col-sm-4">
					
						<div class="footerHeading">
							Social Links
						</div>
						
						<div class="socialLinks">
						
							<div class="fb">
								facebook.com/tourism_management
							</div>
						
							<div class="gp">
								plus.google.com/tourism_management
							</div>
						
							<div class="tw">
								twitter.com/tourism_management
							</div>
						
							<div class="in">
								linkedin.com/tourism_management
							</div>
						
						</div> <!-- social links -->
						
					</div>
						
					<div class="col-sm-12">
					<div class="copyrightContainer">
						<div class="copyright">
						Copyright &copy; 2021 Alisha Anand
						</div>
					</div>
					</div>
							
				</div> <!-- footer -->
				
			<!-- FOOTER SECTION ENDS -->
			
			
		
		</div> <!-- container-fluid -->
	
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>