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
  		<meta name="author" content="Joydeep Dev Nath">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="images/favicon.ico">
	
		<title>Hotels | Project Meteor</title>
    
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
		
			$(function () {
       				$('#datetimepicker5').datetimepicker({
		   			format: 'L',
		   			locale: 'en-gb',
					useCurrent: false,
					minDate: moment()
	   				});
				
        			$('#datetimepicker6').datetimepicker({
            		useCurrent: false,
					format: 'L',
					locale: 'en-gb'
					});
				
					$("#datetimepicker5").on("dp.change", function (e) {
            		$('#datetimepicker6').data("DateTimePicker").minDate(e.date);
        			});
				
        			$("#datetimepicker2").on("dp.change", function (e) {
            		$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        			});
    		});
			
		</script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid">
		
			<div class="hotels col-sm-12">
			
			<!-- HEADER SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="header">
					
						<?php include("common/headerTransparentLoggedIn.php"); ?>
					
						<div class="col-sm-12">
						
						<div class="menu text-center">
							
							<ul>
								<li class="selected">Hotels</li>
								<a href="flights.php"><li>Flights</li></a>
								<a href="trains.php"><li>Trains</li></a>
								<a href="bus.php"><li>Buses</li></a>
								<a href="cabs.php"><li>Cabs</li></a>
							</ul>
							
						</div>
						
					</div>
					
					</div> <!-- header -->
				
				</div> <!-- col-sm-12 -->
				
			<!-- HEADER SECTION ENDS -->
				
				
				
			<!-- TRAIN SEARCH SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="search" id="searchHotel">
   					
    					<div class="content">
    					
    					<form action="hotelSearch.php" method="GET">
    					
    						<div class="col-sm-3">			
   							<div class="form-group">
   								 <label for="city">City:<p> </p></label>
     
      								<select id= "city"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select City" name="city" required>
       									<option value="New Delhi" data-tokens="DEL New Delhi">New Delhi</option>
        								<option value="Mumbai" data-tokens="BOM Mumbai">Mumbai</option>
        								<option value="Kolkata" data-tokens="CCU Kolkata">Kolkata</option>
        								<option value="Bangalore" data-tokens="BLR Bangalore">Bangalore</option>
        								<option value="Chennai" data-tokens="MAA Chennai">Chennai</option>
        								<option value="Pune" data-tokens="PNQ Pune">Pune</option>
        								<option value="Kerala" data-tokens="KER Kerala">Kerala</option>
        								<option value="Guwahati" data-tokens="GAU Guwahati">Guwahati</option>
        								<option value="Manali" data-tokens="MAN Manali">Manali</option>
        								<option value="Shillong" data-tokens="SHL Shillong">Shillong</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime5">Check-in:<p> </p></label>
            						<div class="input-group date" id="datetimepicker5">
                						<input id="datetime5" type="text" class="inputDate form-control" placeholder="Select Check-in Date" name="checkIn" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
    						<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime6">Check-out:<p> </p></label>
            						<div class="input-group date" id="datetimepicker6">
                						<input id="datetime6" type="text" class="inputDate form-control" placeholder="Select Check-out Date" name="checkOut" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
							<div class="col-sm-3">
	
							<label for="rooms">No. of rooms:<p> </p></label>
    							<div class="form-group">
    								<select id= "rooms" class="selectpicker form-control" data-size="5" title="Select no. of rooms" name="rooms" required>
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
          							
          					<div class="col-sm-3" id="r1">
	
							<label for="room1">Room 1:<p> </p></label>
    							<div class="form-group">
    								<select id= "room1" class="selectpicker form-control" data-size="5" title="Select no. of guests" name="room1">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
         					
         					<div class="col-sm-3" id="r2">
	
							<label for="room2">Room 2:<p> </p></label>
    							<div class="form-group">
    								<select id= "room2" class="selectpicker form-control" data-size="5" title="Select no. of guests" name="room2">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
         					
         					<div class="col-sm-3" id="r3">
	
							<label for="room3">Room 3:<p> </p></label>
    							<div class="form-group">
    								<select id= "room3" class="selectpicker form-control" data-size="5" title="Select no. of guests" name="room3">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
         					
         					<div class="col-sm-3" id="r4">
	
							<label for="room3">Room 4:<p> </p></label>
    							<div class="form-group">
    								<select id= "room4" class="selectpicker form-control" data-size="5" title="Select no. of guests" name="room4">
  										<option value="1">1</option>
  										<option value="2">2</option>
  										<option value="3">3</option>
  										<option value="4">4</option>
									</select>
								</div>
							</div>
          					
          					
          					
          					
          					
          					
           				
            				<div class="col-sm-12 text-center">
            			
            					<input type="submit" class="button" name="searchHotels" value="Search Hotels" id="searchHotelButton">
            				
            				</div>

            			</form>
            			
    					</div> <!-- content -->
    					
					</div> <!-- search -->
					
				</div>
			
			<!-- TRAIN SEARCH SECTION ENDS -->
				
			</div> <!-- trains -->	
			
			
			
			<!-- POPULAR BUS SECTION STARTS -->
			
				<!-- <div class="col-sm-12"> -->
					
					<div class="popularHotels col-sm-12">
					
						<div class="heading">
						
								Popular Cities
						
						</div>
						
						<div class="bg">
						
							<!-- replace listItems below by PHP loops -->
							
							<div  class="col-sm-4">
						
								<div class="listItem">
								
									<div class="imageContainer text-center">
										
										<img src="images/hotels/cities/NewDelhi/piccadily.jpg" alt="New Delhi Hotels">
										
									</div>
									
									<div class="headings">
										
										New Delhi
										
									</div>
									
									<div class="info">
										
										3-star hotels averaging ₹ 2000
										
									</div>
									
									<div class="info">
										
										5-star hotels averaging ₹ 6500
										
									</div>
								
									
								</div> <!-- listItem 1 -->
							
							</div> <!-- col-sm-4 -->
							
							<div  class="col-sm-4">
						
								<div class="listItem">
								
									<div class="imageContainer text-center">
										
										<img src="images/hotels/cities/Mumbai/JWMarriott.jpg" alt="Mumbai Hotels">
										
									</div>
									
									<div class="headings">
										
										Mumbai
										
									</div>
									
									<div class="info">
										
										3-star hotels averaging ₹ 3900
										
									</div>
									
									<div class="info">
										
										5-star hotels averaging ₹ 9700
										
									</div>
								
									
								</div> <!-- listItem 2 -->
							
							</div> <!-- col-sm-4 -->
							
							<div  class="col-sm-4">
						
								<div class="listItem">
								
									<div class="imageContainer text-center">
										
										<img src="images/hotels/cities/Kolkata/HyattRegency.jpg" alt="kolkata Hotels">
										
									</div>
									
									<div class="headings">
										
										Kolkata
										
									</div>
									
									<div class="info">
										
										3-star hotels averaging ₹ 3000
										
									</div>
									
									<div class="info">
										
										5-star hotels averaging ₹ 7750
										
									</div>
								
									
								</div> <!-- listItem 3 -->
							
							</div> <!-- col-sm-4 -->
							
							
						</div> <!-- bg -->
						
					</div> <!-- popularBus -->
					
				<!-- </div> -->
				
			<!-- POPULAR BUS SECTION ENDS -->
			
			
			
			<!-- FOOTER SECTION STARTS -->
					
				<div class="footer col-sm-12">
					
					<div class="col-sm-4">
						
						<div class="footerHeading">
							Contact Us
						</div>
							
						<div class="footerText">
							3rd floor, Basai Enclave, Sector 10, <br> Gurugram-122006, Haryana, India
						</div>
				
						<div class="footerText">
							E-mail: queries@travelwale.com
						</div>
						
					</div>
					
					<div class="col-sm-4">
					
						<div class="footerHeading">
							Made with
						</div>
						
						<div class="fa fa-heart"></div>
						
						<div class="footerHeading">
							in India
						</div>
						
						<div class="flagContainer text-center">
							<img src="images/flag.png">
						</div>
						
					</div>
					
					<div class="col-sm-4">
					
						<div class="footerHeading">
							Social Links
						</div>
						
						<div class="socialLinks">
						
							<div class="fb">
								facebook.com/travelwale
							</div>
						
							<div class="gp">
								plus.google.com/travelwale
							</div>
						
							<div class="tw">
								twitter.com/travelwale
							</div>
						
							<div class="in">
								linkedin.com/travelwale
							</div>
						
						</div> <!-- social links -->
						
					</div>
						
					<div class="col-sm-12">
					<div class="copyrightContainer">
						<div class="copyright">
						Copyright &copy; 2018 Joydeep Dev Nath.
						</div>
					</div>
					</div>
							
				</div> <!-- footer -->
				
			<!-- FOOTER SECTION ENDS -->
			
			
		
		</div> <!-- container-fluid -->
	
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>