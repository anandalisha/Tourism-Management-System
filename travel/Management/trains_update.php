<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Trains </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="js/bootstrap.min.js"></script>
<style>
body{
    background: linear-gradient(45deg, #ff8080, #ffffb3);
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
    width:100%;
}
</style>
</head>
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="projectmeteor";
$trainNo="";
$region="";
$returnTrainNo="";
$trainName="";
$origin="";
$destination="";
$originCode="";
$destinationCode="";
$originTime="";
$destinationTime="";
$originPlatform="";
$destinationPlatform="";
$duration="";
$classes="";
$seats1AC="";
$seats2AC="";
$seats3AC="";
$seatsSL="";
$seatsChairCar="";
$seatsChairCarAC="";
$price1AC="";
$price2AC="";
$price3AC="";
$priceSL="";
$priceChairCar="";
$priceChairCarAC="";
$runsOn="";
$noOfBookings="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("Connection Error");
}
//get data from the form
function getData()
{
	$data = array();

    $data[0]=$_POST['trainNo'];
	$data[1]=$_POST['region'];
	$data[2]=$_POST['returnTrainNo'];
	$data[3]=$_POST['trainName'];
	$data[4]=$_POST['origin'];
    $data[5]=$_POST['destination'];
    $data[6]=$_POST['originCode'];
    $data[7]=$_POST['destinationCode'];
    $data[8]=$_POST['originTime'];
    $data[9]=$_POST['destinationTime'];
	$data[10]=$_POST['originPlatform'];
	$data[11]=$_POST['destinationPlatform'];
	$data[12]=$_POST['duration'];
	$data[13]=$_POST['classes'];
    $data[14]=$_POST['seats1AC'];
    $data[15]=$_POST['seats2AC'];
    $data[16]=$_POST['seats3AC'];
    $data[17]=$_POST['seatsSL'];
    $data[18]=$_POST['seatsChairCar'];
    $data[19]=$_POST['seatsChairCarAC'];
    $data[20]=$_POST['price1AC'];
    $data[21]=$_POST['price2AC'];
    $data[22]=$_POST['price3AC'];
    $data[23]=$_POST['priceSL'];
    $data[24]=$_POST['priceChairCar'];
    $data[25]=$_POST['priceChairCarAC'];
    $data[26]=$_POST['runsOn'];
    $data[27]=$_POST['noOfBookings'];
	return $data;
}
//search
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM trains WHERE trainNo ='$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$trainNo = $rows['trainNo'];
					$region = $rows['region'];
					$returnTrainNo= $rows['returnTrainNo'];
					$trainName= $rows['trainName'];
					$origin = $rows['origin'];
                    $destination = $rows['destination'];
                    $originCode = $rows['originCode'];
                    $destinationCode = $rows['destinationCode'];
                    $originTime = $rows['originTime'];
                    $destinationTime = $rows['destinationTime'];
                    $originPlatform = $rows['originPlatform'];
                    $destinationPlatform = $rows['destinationPlatform'];
                    $duration = $rows['duration'];
                    $classes = $rows['classes'];
                    $seats1AC = $rows['seats1AC'];
                    $seats2AC = $rows['seats2AC'];
                    $seats3AC = $rows['seats3AC'];
                    $seatsSL = $rows['seatsSL'];
                    $seatsChairCar = $rows['seatsChairCar'];
                    $seatsChairCarAC = $rows['seatsChairCarAC'];
                    $price1AC = $rows['price1AC'];
                    $price2AC = $rows['price2AC'];
                    $price3AC = $rows['price3AC'];
                    $priceSL = $rows['priceSL'];
					$priceChairCar = $rows['priceChairCar'];
					$priceChairCarAC = $rows['priceChairCarAC'];
					$runsOn = $rows['runsOn'];
					$noOfBookings = $rows['noOfBookings'];


				}
			}else{
				echo("No data are available");
			}
		} else{
			echo("Result error");
		}

}
//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `trains`(`region`, `returnTrainNo`, `trainName`, `origin`,`destination`,`originCode`,`destinationCode`,`originTime`,`destinationTime`,`originPlatform`,`destinationPlatform`,`duration`,`classes`,`seats1AC`,`seats2AC`,`seats3AC`,`seatsSL`,`seatsChairCar`,`seatsChairCarAC`,`price1AC`,`price2AC`,`price3AC`,`priceSL`,`priceChairCar`,`priceChairCarAC`,`runsOn`,`noOfBookings`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]','$info[14]','$info[15]','$info[16]','$info[17]','$info[18]','$info[19]','$info[20]','$info[21]','$info[22]','$info[23]','$info[24]','$info[25]','$info[26]','$info[27]')";
	try{
		$insert_result=mysqli_query($conn, $insert_query);
		if($insert_result)
		{
			if(mysqli_affected_rows($conn)>0){
				echo("Data inserted successfully");

			}else{
				echo("Data not inserted");
			}
		}
	}catch(Exception $ex){
		echo("error inserted".$ex->getMessage());
	}
}
//delete
if(isset($_POST['delete'])){
	$info = getData();
	$delete_query = "DELETE FROM `trains` WHERE trainNo = '$info[0]'";
	try{
		$delete_result = mysqli_query($conn, $delete_query);
		if($delete_result){
			if(mysqli_affected_rows($conn)>0)
			{
				echo("Data deleted");
			}else{
				echo("Data not deleted");
			}
		}
	}catch(Exception $ex){
		echo("Error in deleting".$ex->getMessage());
	}
}
//edit
if(isset($_POST['update'])){
	$info = getData();
	$update_query="UPDATE `trains` SET region='$info[1]',returnTrainNo='$info[2]',trainName='$info[3]',origin='$info[4]',destination='$info[5]',originCode='$info[6]',destinationCode='$info[7]',originTime='$info[8]',destinationTime='$info[9]',originPlatform='$info[10]',destinationPlatform='$info[11]',duration='$info[12]',classes='$info[13]',seats1AC='$info[14]',seats2AC='$info[15]',seats3AC='$info[16]',seatsSL='$info[17]',seatsChairCar='$info[18]',seatsChairCarAC='$info[19]',price1AC='$info[20]',price2AC='$info[21]',price3AC='$info[22]',priceSL='$info[23]',priceChairCar='$info[24]',priceChairCarAC='$info[25]',runsOn='$info[26]',noOfBookings='$info[27]' WHERE trainNo = '$info[0]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				echo("Data updated");
			}else{
				echo("Data not updated");
			}
		}
	}catch(Exception $ex){
		echo("Error in updating".$ex->getMessage());
	}
}

?>

<body>
	<div class="container-fliud">
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
      <h1 class="navbar-brand"> Tourism Management System</h1>
    </div>
     <div class="collapse navbar-collapse" id="nav">
    <ul class="nav navbar-nav" style="float:right">
        <li><a href="Home.php">HOME</a></li>
		<li><a href="users_add.php">USERS</a></li>
              <li><a href="hotels_add.php">ADD HOTELS</a></li>
              <li><a href="hotelbookings_view.php">HOTEL BOOKINGS</a></li>
              <li><a href="flights_add.php">ADD FLIGHTS</a></li>
              <li><a href="flightbookings_view.php">FLIGHT BOOKINGS</a></li>
              <li><a href="trains_add.php">ADD TRAINS</a></li>
              <li><a href="trainbookings_view.php">TRAIN BOOKINGS</a></li>
			  <h3><a href="adminLogout.php">LOGOUT</a></h3>
    </ul>
  </div>
</div>
</nav>
</div>
	
	
	
	
	  <div class="container-fluid" >
	  <div class="row mx-5 my-5" style="margin-left:80px;text-align:center;">
	    <div class="col-lg-4">
<form method ="post"   action="">  

  <h4>Train Number (Use to Search train's details)</h4>
  <input type="number" name="trainNo"  class="form-control" placeholder="Train No. /Automatic Number Genrates" value="<?php echo($trainNo);?>">

  <div class="form-group row">
	<div class="col-xs-6">
		<h4>Region</h4>
	<input type="text" name="region" class="form-control" placeholder="Enter region" value="<?php echo($region);?>">
</div>


<div class="form-group row">
	<div class="col-xs-6">
		<h4>Return Train NO.</h4>
	<input type="number" name="returnTrainNO" class="form-control" placeholder="Enter return train no." value="<?php echo($returnTrainNo);?>">
</div>

<div class="form-group row">
	<div class="col-xs-6">
		<h4>Train Name</h4>
	<input type="text" name="trainName" class="form-control" placeholder="Enter train name" value="<?php echo($trainName);?>">
</div>


<div class="form-group row">
	<div class="col-xs-6">
		<h4>Origin</h4>
	<input type="text" name="origin" class="form-control" placeholder="Enter origin" value="<?php echo($origin);?>">
</div>


<div class="form-group row">
	<div class="col-xs-6">
		<h4>Destination</h4>
	<input type="text" name="destination" class="form-control" placeholder="Enter destnation" value="<?php echo($destination);?>">
</div>


	<div class="form-group row">
	<div class="col-xs-6">
		<h4>Origin Code</h4>
	<input type="text" name="originCode" class="form-control" placeholder="Enter origin code" value="<?php echo($originCode);?>">
</div>

<div class="col-xs-6">
	<h4>Destination code</h4>
	<input type="text" name="destinationCode" class="form-control" placeholder="Enter destination code" value="<?php echo($destinationCode);?>">
</div>

<div class="form-group row">
	<div class="col-xs-6">
		<h4>Origin time</h4>
	<input type="time" name="originTime" class="form-control" placeholder="Enter origin time" value="<?php echo($originTime);?>">
</div>

<div class="col-xs-6">
	<h4>Destination time</h4>
	<input type="time" name="destinationTime" class="form-control" placeholder="Enter destination time" value="<?php echo($destinationTime);?>">
</div>

<div class="form-group row">
	<div class="col-xs-6">
		<h4>Origin Platform</h4>
	<input type="text" name="originPlatform" class="form-control" placeholder="Enter origin platform" value="<?php echo($originPlatform);?>">
</div>

<div class="col-xs-6">
	<h4>Destination Platform</h4>
	<input type="text" name="destinationPlatform" class="form-control" placeholder="Enter destination platform" value="<?php echo($destinationPlatform);?>">
</div>

<div class="col-xs-6">
	<h4>Duration</h4>
	<input type="text" name="duration" class="form-control" placeholder="Enter duration" value="<?php echo($duration);?>">
</div>

<div class="col-xs-6">
<h4>Classes</h4>
	<input type="text" name="classes" class="form-control" placeholder="Enter available classes" value="<?php echo($classes);?>">
</div>

<div class="col-xs-6">
	<h4>Seats1AC</h4>
	<input type="number" class="form-control" name="seats1AC"  placeholder="Enter no. of seats available" value="<?php echo($seats1AC);?>">
</div>

<div class="col-xs-6">
	<h4>Seats2AC</h4>
	<input type="number" class="form-control" name="seats2AC"  placeholder="Enter no. of seats available" value="<?php echo($seats2AC);?>">
</div>

<div class="col-xs-6">
	<h4>Seats3AC</h4>
	<input type="number" class="form-control" name="seats3AC"  placeholder="Enter no. of seats available" value="<?php echo($seats3AC);?>">
</div>

<div class="col-xs-6">
	<h4>SeatsSL</h4>
	<input type="number" class="form-control" name="seatsSL"  placeholder="Enter no. of seats available" value="<?php echo($seatsSL);?>">
</div>

<div class="col-xs-6">
	<h4>Seats Chair Car</h4>
	<input type="number" class="form-control" name="seatsChairCar"  placeholder="Enter no. of seats available" value="<?php echo($seatsChairCar);?>">
</div>

<div class="col-xs-6">
	<h4>Seats Chair Car AC</h4>
	<input type="number" class="form-control" name="seatsChairCarAC"  placeholder="Enter no. of seats available" value="<?php echo($seatsChairCarAC);?>">
</div>

<div class="col-xs-6">
	<h4>Price1AC</h4>
	<input type="number" class="form-control" name="price1AC"  placeholder="Enter price" value="<?php echo($price1AC);?>">
</div>

<div class="col-xs-6">
	<h4>Price2AC</h4>
	<input type="number" class="form-control" name="price2AC"  placeholder="Enter price" value="<?php echo($price2AC);?>">
</div>

<div class="col-xs-6">
	<h4>Price3AC</h4>
	<input type="number" class="form-control" name="price3AC"  placeholder="Enter price" value="<?php echo($price3AC);?>">
</div>

<div class="col-xs-6">
	<h4>PriceSL</h4>
	<input type="number" class="form-control" name="priceSL"  placeholder="Enter price" value="<?php echo($priceSL);?>">
</div>

<div class="col-xs-6">
	<h4>Price Chair Car</h4>
	<input type="number" class="form-control" name="priceChairCar"  placeholder="Enter price" value="<?php echo($priceChairCar);?>">
</div>

<div class="col-xs-6">
	<h4>Price Chair Car AC</h4>
	<input type="number" class="form-control" name="priceChairCarAC"  placeholder="Enter price" value="<?php echo($priceChairCarAC);?>">
</div>

<div class="col-xs-6">
	<h4>Runs On</h4>
	<input type="text" class="form-control" name="runsOn"  placeholder="Enter days" value="<?php echo($runsOn);?>">
</div>
	

<div class="col-xs-6">
	<h4>Number of Bookings</h4>
<input type="number" name="noOfBookings" class="form-control" placeholder="Enter number of bookings" value="<?php echo($noOfBookings);?>">
</div>
</div>
<br>
<br>



		<div class="form-group row">
		<hr/>
		<div class="col-xs-4">
				<input type="submit" class="btn btn-primary btn-block btn-lg" name="search" value="Search">
			</div>
			<div class="col-xs-4">
					<input type="submit" class="btn btn-warning btn-block btn-lg" name="update" value="Update">
				</div>
				<div class="col-xs-4">
		<input type="submit" class="btn btn-danger btn-block btn-lg" name="delete" value="Delete">
	</div>
</div>
</form>
</div>
</div>

    <div class="col-lg-8">
			<h1 class="text-danger text-center" style="font-weight:bold">Train's Data Update | Delete </h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmeteor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT trainNo,region,returnTrainNo,trainName,origin,destination,originCode,destinationCode,originTime,destinationTime,originPlatform,destinationPlatform,duration,classes,seats1AC,seats2AC,seats3AC,seatsSL,seatsChairCar,seatsChairCarAC,price1AC,price2AC,price3AC,priceSL,priceChairCar,priceChairCarAC,runsOn,noOfBookings FROM trains";
$result = $conn->query($sql);

echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black;'>

<th>Train No.</th>
<th>Region</th>
<th>Return Train No.</th>
<th>Train Name</th>
<th>Origin</th>
<th>Destination</th>
<th>Origin Code</th>
<th>Destination Code</th>
<th>Origin Time</th>
<th>Destination Time</th>
<th>Origin Platform</th>
<th>Destination Platform</th>
<th>Duration</th>
<th>Classes</th>
<th>Seats1AC</th>
<th>Seats2AC</th>
<th>Seats3AC</th>
<th>SeatsSL</th>
<th>SeatsChairCar</th>
<th>SeatsChairCarAC</th>
<th>price1AC</th>
<th>price2AC</th>
<th>price3AC</th>
<th>priceSL</th>
<th>priceChairCar</th>
<th>priceChairCarAC</th>
<th>runsOn</th>
<th>No. of bookings</th>


</tr>
</div>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

       echo "<tr>";
echo "<td>" . $row['trainNo'] . "</td>";
echo "<td>" . $row['region'] . "</td>";
echo "<td>" . $row['returnTrainNo'] . "</td>";
echo "<td>" . $row['trainName'] . "</td>";
echo "<td>" . $row['origin'] . "</td>";
echo "<td>" . $row['destination'] . "</td>";
echo "<td>" . $row['originCode'] . "</td>";
echo "<td>" . $row['destinationCode'] . "</td>";
echo "<td>" . $row['originTime'] . "</td>";
echo "<td>" . $row['destinationTime'] . "</td>";
echo "<td>" . $row['originPlatform'] . "</td>";
echo "<td>" . $row['destinationPlatform'] . "</td>";
echo "<td>" . $row['duration'] . "</td>";
echo "<td>" . $row['classes'] . "</td>";
echo "<td>" . $row['seats1AC'] . "</td>";
echo "<td>" . $row['seats2AC'] . "</td>";
echo "<td>" . $row['seats3AC'] . "</td>";
echo "<td>" . $row['seatsSL'] . "</td>";
echo "<td>" . $row['seatsChairCar'] . "</td>";
echo "<td>" . $row['seatsChairCarAC'] . "</td>";
echo "<td>" . $row['price1AC'] . "</td>";
echo "<td>" . $row['price2AC'] . "</td>";
echo "<td>" . $row['price3AC'] . "</td>";
echo "<td>" . $row['priceSL'] . "</td>";
echo "<td>" . $row['priceChairCar'] . "</td>";
echo "<td>" . $row['priceChairCarAC'] . "</td>";
echo "<td>" . $row['runsOn'] . "</td>";
echo "<td>" . $row['noOfBookings'] . "</td>";
echo "</tr>";


    }
} else {
    echo "0 results";
}

$conn->close();
?>
</div>
</div>
</body>
</html>
