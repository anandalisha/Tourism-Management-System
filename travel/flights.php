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