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
	
		<title>Trains | tourism_management</title>
    
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
				
                $('#datetimepicker3').datetimepicker({
					format: 'L',
		   			locale: 'en-gb',
					useCurrent: false,
					minDate: moment()
				});
				
				$('#datetimepicker3').on('dp.change',function(e){
					console.log(e.date.format('dddd'));
					$('#dayTrain').val(e.date.format('dddd'));
				});
            });
		
		</script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
	
		<div class="container-fluid">
		
			<div class="trains col-sm-12">
			
			<!-- HEADER SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="header">
					
						<?php include("common/headerTransparentLoggedIn.php"); ?>
					
						<div class="col-sm-12">
						
						<div class="menu text-center">
							
							<ul>
								<a href="hotels.php"><li>Hotels</li></a>
								<a href="flights.php"><li>Flights</li></a>
								<li class="selected">Trains</li>
								<!--<a href="bus.php"><li>Buses</li></a>
								<a href="cabs.php"><li>Cabs</li></a>-->
							</ul>
							
						</div>
						
					</div>
					
					</div> <!-- header -->
				
				</div> <!-- col-sm-12 -->
				
			<!-- HEADER SECTION ENDS -->
				
				
				
			<!-- TRAIN SEARCH SECTION STARTS -->
				
				<div class="col-sm-12">
					
					<div class="search">
   					
    					<div class="content">
    					
    					<form action="trainSearch.php" method="POST">
    					
    						<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="originTrain">Origin:<p> </p></label>
     
      								<select id= "originTrain"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Origin Station" name="origin" required>
       									<option value="New Delhi" data-subtext="DLI" data-tokens="DLI New Delhi">New Delhi</option>
        								<option value="Howrah" data-subtext="HWH" data-tokens="HWH Howrah">Howrah</option>
        								<option value="New Jalpaiguri" data-subtext="NJP" data-tokens="NJP New Jalpaiguri">New Jalpaiguri</option>
       									<option value="Guwahati" data-subtext="GHY" data-tokens="GHY Guwahati">Guwahati</option>
        								<option value="Silchar" data-subtext="SCL" data-tokens="SCL Silchar">Silchar</option>
        								<option value="Dimapur" data-subtext="DMV" data-tokens="DMV Dimapur">Dimapur</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-6">			
   							<div class="form-group">
   								 <label for="destinationTrain">Destination:<p> </p></label>
     
      								<select id= "destinationTrain"  data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination Station" name="destination" required>
       									<option value="New Delhi" data-subtext="DLI" data-tokens="DLI New Delhi">New Delhi</option>
        								<option value="Howrah" data-subtext="HWH" data-tokens="HWH Howrah">Howrah</option>
        								<option value="New Jalpaiguri" data-subtext="NJP" data-tokens="NJP New Jalpaiguri">New Jalpaiguri</option>
       									<option value="Guwahati" data-subtext="GHY" data-tokens="GHY Guwahati">Guwahati</option>
        								<option value="Silchar" data-subtext="SCL" data-tokens="SCL Silchar">Silchar</option>
        								<option value="Dimapur" data-subtext="DMV" data-tokens="DMV Dimapur">Dimapur</option>
      								</select>
							</div>
            			</div>
            			
            				<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime3">Select Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker3">
                						<input id="datetime3" type="text" class="inputDate form-control" placeholder="Select Date" name="date" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
    						
    						<div class="col-sm-3">
	
							<label for="class">Select Class: <p> </p></label>
    							<div class="form-group">
    								<select id= "class" class="selectpicker form-control" data-size="5" title="Select Class" name="class" required>
  										<option value="1AC">First AC</option>
  										<option value="2AC">Second AC</option>
  										<option value="3AC">Third AC</option>
  										<option value="SL">Sleeper</option>
  										<option value="CC">AC Chair Car</option>
									</select>
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
           			
           					<input type="hidden" name="day" value="null" id="dayTrain"/>
            			
            				<div class="col-sm-12 text-center">
            			
            					<input type="submit" class="button" name="searchTrains" value="Search Trains">
            				
            				</div>
            				
            				</form>

    					</div> <!-- content -->
    					
					</div> <!-- search -->
					
				</div>
			
			<!-- TRAIN SEARCH SECTION ENDS -->
				
			</div> <!-- trains -->	
			
			
			
			<!-- POPULAR TRAINS SECTION STARTS -->
			
				<!-- <div class="col-sm-12"> -->
					
					<div class="popularTrains col-sm-12">
					
						<div class="heading">
						
								Popular Trains
						
						</div>
						
						<div class="bg">
						
							<!-- replace listItems below by PHP loops -->
						
							<div class="listItem">
													
								<!-- TRAIN NUMBER STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Train Number
			
									</div>
		
									<div class="values number">
		
										12952
			
									</div>
									
									<div class="numberSubscript">
		
										Return #12951
			
									</div>
		
								</div>
	
								<!-- TRAIN NUMBER ENDS -->
	
	
								<!-- TRAIN NAME STARTS -->

								<div class="col-sm-4 text-center">
	
									<div class="headings">
		
										Train Name
			
									</div>
		
									<div class="values name">
		
										Rajdhani Express
			
									</div>
									
									<div class="nameSubscript">
		
										New Delhi - Mumbai Central
			
									</div>
		
								</div>
	
									<!-- TRAIN NAME ENDS -->
	
	
									<!-- ZONE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Zone
			
									</div>
		
									<div class="values zone">
		
										WR
			
									</div>
									
									<div class="zoneSubscript">
		
										Western
			
									</div>
		
								</div>
	
									<!-- ZONE ENDS -->
	
	
									<!-- DEPARTS STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Departs
			
									</div>
		
									<div class="values departs">
		
										16:25
			
									</div>
									
									<div class="departsSubscript">
		
										Platform #3
												
									</div>
		
		
								</div>
	
									<!-- DEPARTS ENDS -->
	
	
									<!-- ARRIVES STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Arrives
			
									</div>
		
									<div class="values arrives">
		
										08:15
			
									</div>
									
									<div class="arrivesSubscript">
		
										Platform #4
												
									</div>
		
		
								</div>
	
									<!-- ARRIVES ENDS -->
				
							</div> <!-- listItem 1 -->
							
							<div class="listItem">
													
								<!-- TRAIN NUMBER STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Train Number
			
									</div>
		
									<div class="values number">
		
										12259
			
									</div>
									
									<div class="numberSubscript">
		
										Return #12260
			
									</div>
		
								</div>
	
								<!-- TRAIN NUMBER ENDS -->
	
	
								<!-- TRAIN NAME STARTS -->

								<div class="col-sm-4 text-center">
	
									<div class="headings">
		
										Train Name
			
									</div>
		
									<div class="values name">
		
										Duronto Express
			
									</div>
									
									<div class="nameSubscript">
		
										Sealdah - New Delhi
			
									</div>
		
								</div>
	
									<!-- TRAIN NAME ENDS -->
	
	
									<!-- ZONE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Zone
			
									</div>
		
									<div class="values zone">
		
										ER
			
									</div>
									
									<div class="zoneSubscript">
		
										Eastern
			
									</div>
		
								</div>
	
									<!-- ZONE ENDS -->
	
	
									<!-- DEPARTS STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Departs
			
									</div>
		
									<div class="values departs">
		
										18:30
			
									</div>
									
									<div class="departsSubscript">
		
										Platform #9B
												
									</div>
		
		
								</div>
	
									<!-- DEPARTS ENDS -->
	
	
									<!-- ARRIVES STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Arrives
			
									</div>
		
									<div class="values arrives">
		
										11:30
			
									</div>
									
									<div class="arrivesSubscript">
		
										Platform #9
												
									</div>
		
		
								</div>
	
									<!-- ARRIVES ENDS -->
				
							</div> <!-- listItem 2 -->
							
							<div class="listItem">
													
								<!-- TRAIN NUMBER STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Train Number
			
									</div>
		
									<div class="values number">
		
										12910
			
									</div>
									
									<div class="numberSubscript">
		
										Return #12909
			
									</div>
		
								</div>
	
								<!-- TRAIN NUMBER ENDS -->
	
	
								<!-- TRAIN NAME STARTS -->

								<div class="col-sm-4 text-center">
	
									<div class="headings">
		
										Train Name
			
									</div>
		
									<div class="values name">
		
										Garib Rath Express
			
									</div>
									
									<div class="nameSubscript">
		
										Hazrat Nizamuddin - Bandra Terminus
			
									</div>
		
								</div>
	
									<!-- TRAIN NAME ENDS -->
	
	
									<!-- ZONE STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Zone
			
									</div>
		
									<div class="values zone">
		
										WR
			
									</div>
									
									<div class="zoneSubscript">
		
										Western
			
									</div>
		
								</div>
	
									<!-- ZONE ENDS -->
	
	
									<!-- DEPARTS STARTS -->

								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Departs
			
									</div>
		
									<div class="values departs">
		
										15:35
			
									</div>
									
									<div class="departsSubscript">
		
										Platform #7
												
									</div>
		
		
								</div>
	
									<!-- DEPARTS ENDS -->
	
	
									<!-- ARRIVES STARTS -->
	
								<div class="col-sm-2 text-center">
	
									<div class="headings">
		
										Arrives
			
									</div>
		
									<div class="values arrives">
		
										08:10
			
									</div>
									
									<div class="arrivesSubscript">
		
										Platform #2
												
									</div>
		
		
								</div>
	
									<!-- ARRIVES ENDS -->
				
							</div> <!-- listItem 3 -->
							
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
							CUSAT,Cochin, <br> Kerala,India
						</div>
				
						<div class="footerText">
							E-mail: queries@tourism_management.com
						</div>
						
					</div>
					
					<div class="col-sm-4">
					
						<!--<div class="footerHeading">
							Made with
						</div>
						
						<div class="fa fa-heart"></div>
						
						<div class="footerHeading">
							in India
						</div>
						
						<div class="flagContainer text-center">
							<img src="images/flag.png">
						</div>-->
						
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