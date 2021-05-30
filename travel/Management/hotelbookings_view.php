<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Hotels </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
<link href="/css/main.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
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
$bookingID="";
$hotelName="";
$date="";
$username="";
$cancelled="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
	$conn = mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("");
}
//get data from the form
function getData()
{
	$data = array();

	$data[1]=$_POST['hotelName'];
	$data[2]=$_POST['date'];
	$data[3]=$_POST['username'];
	$data[4]=$_POST['cancelled'];
	return $data;
}
//search
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM hotelbookings WHERE bookingID = '$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$bookingID = $rows['bookingID'];
					$hotelName = $rows['hotelName'];
					$date = $rows['date'];
					$username = $rows['username'];
					$cancelled = $rows['cancelled'];

				}
			}else{
				echo("No data are available");
			}
		} else{
			echo("Result error");
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


	

    <div class="col-lg-8">
			<h1 class="text-danger text-center" style="font-weight:bold">Hotel Booking Details</h1>
			<br>
			<br>
			<div>
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

$sql = "SELECT bookingID,hotelName,date,username,cancelled FROM hotelbookings";
$result = $conn->query($sql);

echo "
<center>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black'>
<th>Booking ID</th>
<th>Hotel Name</th>
<th>Date</th>
<th>Username</th>
<th>Cancelled</th>

</tr>
</center>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<tr>";
echo "<td>" . $row['bookingID'] . "</td>";
echo "<td>" . $row['hotelName'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['cancelled'] . "</td>";

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
