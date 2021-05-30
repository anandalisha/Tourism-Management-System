<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Flights </title>
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
$flight_no="";
$origin="";
$destination="";
$distance="";
$fare="";
$class="";
$seats_available="";
$departs="";
$arrives="";
$operator="";
$origin_code="";
$destination_code="";
$refundable="";
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

	$data[1]=$_POST['origin'];
	$data[2]=$_POST['destination'];
	$data[3]=$_POST['distance'];
	$data[4]=$_POST['fare'];
  $data[5]=$_POST['class'];
  $data[6]=$_POST['seats_available'];
  $data[7]=$_POST['departs'];
  $data[8]=$_POST['arrives'];
  $data[9]=$_POST['operator'];
	$data[10]=$_POST['origin_code'];
	$data[11]=$_POST['destination_code'];
	$data[12]=$_POST['refundable'];
	$data[13]=$_POST['noOfBookings'];
	return $data;
}
//search
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM flights WHERE flight_no = '$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$flight_no = $rows['flight_no'];
					$origin = $rows['origin'];
					$destination= $rows['destinattion'];
					$distance= $rows['distance'];
					$fare = $rows['fare'];
                    $class = $rows['class'];
                    $seats_available = $rows['seats_available'];
                    $departs = $rows['departs'];
                    $arrives = $rows['arrives'];
                    $operator = $rows['operator'];
					$origin_code = $rows['origin_code'];
					$destination_code = $rows['destination_code'];
					$refundable = $rows['refundable'];
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
	$insert_query="INSERT INTO `flights`(`origin`, `destination`, `distance`, `fare`,`class`,`seats_available`,`departs`,`arrives`,`operator`,`origin_code`,`destination_code`,`refundable`,`noOfBookings`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]')";
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
	$delete_query = "DELETE FROM `flights` WHERE flight_no = '$info[0]'";
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
	$update_query="UPDATE `flights` SET origin='$info[1]',destination='$info[2]',distance='$info[3]',fare='$info[4]',class='$info[5]',seats_available='$info[6]',departs='$info[7]',arrives='$info[8]',operator='$info[9]',origin_code='$info[10]',destination_code='$info[11]',refundable='$info[12]',noOfBookings='$info[13]' WHERE flight_no = '$info[0]'";
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
	  <div class="row mx-5 my-5" style="display: flex;
  justify-content: center;">
	    <div class="col-lg-4">
<form method ="post"   action="">  
  <h4>Flight Number (Use to Search flight's details)</h4>
  <input type="number" name="flight_no"  class="form-control" placeholder="Flight No. /Automatic Number Genrates" value="<?php echo($flight_no);?>" disabled>

	<div class="form-group row">
	<div class="col-xs-6">
		<h4>Origin</h4>
	<input type="text" name="origin" class="form-control" placeholder="Enter origin" value="<?php echo($origin);?>" required>
</div>

<div class="col-xs-6">
	<h4>Destination</h4>
	<input type="text" name="destination" class="form-control" placeholder="Enter destination" value="<?php echo($destination);?>" required>
</div>

<div class="col-xs-6">
	<h4>Distance</h4>
	<input type="number" name="distance" class="form-control" placeholder="Enter distance" value="<?php echo($distance);?>" required>
</div>

<div class="col-xs-6">
<h4>Fare</h4>
	<input type="number" name="fare" class="form-control" placeholder="Enter fare" value="<?php echo($fare);?>" required>
</div>

<div class="col-xs-6">
	<h4>Class</h4>
	<input type="text" class="form-control" name="class"  placeholder="Business or Economy" value="<?php echo($class);?>"required>
</div>


	<div class="col-xs-6">
		<h4>Seats Available</h4>
  <input type="number" name="seats_available" class="form-control" placeholder="Enter number of seats available" value="<?php echo($seats_available);?>" required>
</div>

<div class="col-xs-6">
	<h4>Departs from</h4>
<input type="time" name="departs" class="form-control" placeholder="Enter departure" value="<?php echo($departs);?>" required>
</div>

<div class="col-xs-6">
	<h4>Arrival at</h4>
<input type="time" name="arrives" class="form-control" placeholder="Enter arrival" value="<?php echo($arrives);?>" required>
</div>

<div class="col-xs-6">
	<h4>Operator</h4>
<input type="text" name="operator" class="form-control" placeholder="Enter operator name" value="<?php echo($operator);?>" required>
</div>

<div class="col-xs-6">
	<h4>Origin Code</h4>
<input type="text" name="origin_code" class="form-control" placeholder="Enter origin code" value="<?php echo($origin_code);?>" required>
</div>

<div class="col-xs-6">
	<h4>Destination Code</h4>
<input type="text" name="destination_code" class="form-control" placeholder="Enter destination code" value="<?php echo($destination_code);?>" required>
</div>

<div class="col-xs-6">
	<h4>Refundable</h4>
<input type="text" name="refundable" class="form-control" placeholder="Refundable or non-refundable" value="<?php echo($refundable);?>" required>
</div>

<div class="col-xs-6">
	<h4>Number of Bookings</h4>
<input type="number" name="noOfBookings" class="form-control" placeholder="Enter number of bookings" value="<?php echo($noOfBookings);?>" required>
</div>
</div>

	<div>
		<input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add">
    <a href="flights_update.php"class="btn btn-info btn-block btn-lg">Update | Delete | Search</a>
<br>
<br>

	</div>
</form>
</div>
</div>

    <div class="col-lg-8">
			<h1 class="text-danger text-center" style="font-weight:bold">FLIGHTS INFORMATION</h1>
			<hr>
			<br>
			<br>
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

$sql = "SELECT flight_no,origin,destination,distance,fare,class,seats_available,departs,arrives,operator,origin_code,destination_code,refundable,noOfBookings FROM flights";
$result = $conn->query($sql);

echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black;'>
<th>Flight No.</th>
<th>Origin</th>
<th>Destination</th>
<th>Distance</th>
<th>Fare</th>
<th>Class</th>
<th>Seats_Available</th>
<th>Departure</th>
<th>Arrival</th>
<th>Operator</th>
<th>Origin code</th>
<th>Destination code</th>
<th>Refundable</th>
<th>No. of bookings</th>

</tr>
</div>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<tr>";
echo "<td>" . $row['flight_no'] . "</td>";
echo "<td>" . $row['origin'] . "</td>";
echo "<td>" . $row['destination'] . "</td>";
echo "<td>" . $row['distance'] . "</td>";
echo "<td>" . $row['fare'] . "</td>";
echo "<td>" . $row['class'] . "</td>";
echo "<td>" . $row['seats_available'] . "</td>";
echo "<td>" . $row['departs'] . "</td>";
echo "<td>" . $row['arrives'] . "</td>";
echo "<td>" . $row['operator'] . "</td>";
echo "<td>" . $row['origin_code'] . "</td>";
echo "<td>" . $row['destination_code'] . "</td>";
echo "<td>" . $row['refundable'] . "</td>";
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
