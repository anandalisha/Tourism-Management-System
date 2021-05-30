<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Hotels </title>
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
$hotelID="";
$hotelName="";
$city="";
$locality="";
$stars="";
$rating="";
$hotelDesc="";
$checkIn="";
$checkOut="";
$price="";
$roomsAvailable="";
$wifi="";
$swimmingPool="";
$parking="";
$restaurant="";
$laundry="";
$cafe="";
$mainImage="";

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

	$data[1]=$_POST['hotelName'];
	$data[2]=$_POST['city'];
	$data[3]=$_POST['locality'];
	$data[4]=$_POST['stars'];
    $data[5]=$_POST['rating'];
    $data[6]=$_POST['hotelDesc'];
    $data[7]=$_POST['checkIn'];
    $data[8]=$_POST['checkOut'];
    $data[9]=$_POST['price'];
	$data[10]=$_POST['roomsAvailable'];
	$data[11]=$_POST['wifi'];
	$data[12]=$_POST['swimmingPool'];
	$data[13]=$_POST['parking'];
	$data[14]=$_POST['restaurant'];
	$data[15]=$_POST['laundry'];
	$data[16]=$_POST['cafe'];
	$data[17]=$_POST['mainImage'];
	return $data;
}
//search
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM hotels WHERE hotelID = '$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$hotelID = $rows['hotelID'];
					$hotelName = $rows['hotelName'];
					$city= $rows['city'];
					$locality= $rows['locality'];
					$stars = $rows['stars'];
                    $rating = $rows['rating'];
                    $hotelDesc = $rows['hotelDesc'];
                    $checkIn = $rows['checkIn'];
                    $checkOut = $rows['checkOut'];
                    $price = $rows['price'];
					$roomsAvailable = $rows['roomsAvailable'];
					$wifi = $rows['wifi'];
					$swimmingPool = $rows['swimmingPool'];
					$parking = $rows['parking'];
					$restaurant = $rows['restaurant'];
					$laundry = $rows['laundry'];
					$cafe = $rows['cafe'];
					$mainImage = $rows['mainImage'];

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
	$insert_query="INSERT INTO `hotels`(`hotelName`, `city`, `locality`, `stars`,`rating`,`hotelDesc`,`checkIn`,`checkOut`,`price`,`roomsAvailable`,`wifi`,`swimmingPool`,`parking`,`restaurant`,`laundry`,`cafe`,`mainImage`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]','$info[11]','$info[12]','$info[13]','$info[14]','$info[15]','$info[16]','$info[17]')";
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
	$delete_query = "DELETE FROM `hotels` WHERE hotelID = '$info[0]'";
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
	$update_query="UPDATE `hotels` SET hotelName='$info[1]',city='$info[2]',locality='$info[3]',stars='$info[4]',rating='$info[5]',hotelDesc='$info[6]',checkIn='$info[7]',checkOut='$info[8]',price='$info[9]',roomsAvailable='$info[10]',wifi='$info[11]',swimmingPool='$info[12]',parking='$info[13]',restaurant='$info[14]',laundry='$info[15]',cafe='$info[16]',parkingmainImage='$info[17]' WHERE hotelID = '$info[0]'";
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
  <h4>Hotel ID (Use to Search hotel's detail)</h4>
  <input type="number" name="hotelID"  class="form-control" placeholder="Hotel ID /Automatic Number Genrates" value="<?php echo($hotelID);?>" disabled>

	<div class="form-group row">
	<div class="col-xs-6">
		<h4>Hotel Name</h4>
	<input type="text" name="hotelName" class="form-control" placeholder="Enter hotel name" value="<?php echo($hotelName);?>" required>
</div>

<div class="col-xs-6">
	<h4>City</h4>
	<input type="text" name="city" class="form-control" placeholder="Enter city" value="<?php echo($city);?>" required>
</div>

<div class="col-xs-6">
	<h4>Locality</h4>
	<input type="text" name="locality" class="form-control" placeholder="Enter locality" value="<?php echo($locality);?>" required>
</div>

<div class="col-xs-6">
<h4>Stars</h4>
	<input type="int" name="stars" class="form-control" placeholder="Enter no. of stars" value="<?php echo($stars);?>" required>
</div>

<div class="col-xs-6">
	<h4>Rating</h4>
	<input type="text" class="form-control" name="rating"  placeholder="Give rating" value="<?php echo($rating);?>"required>
</div>


	<div class="col-xs-6">
		<h4>Description</h4>
  <input type="text" name="hotelDesc" class="form-control" placeholder="Enter description" value="<?php echo($hotelDesc);?>" required>
</div>

<div class="col-xs-6">
	<h4>Check In</h4>
<input type="time" name="checkIn" class="form-control" placeholder="Enter checkin time" value="<?php echo($checkIn);?>" required>
</div>

<div class="col-xs-6">
	<h4>Check Out</h4>
<input type="time" name="checkOut" class="form-control" placeholder="Enter checkOut time" value="<?php echo($checkOut);?>" required>
</div>

<div class="col-xs-6">
	<h4>Price</h4>
<input type="number" name="price" class="form-control" placeholder="Enter price" value="<?php echo($price);?>" required>
</div>

<div class="col-xs-6">
	<h4>Rooms Available</h4>
<input type="number" name="roomsAvailable" class="form-control" placeholder="Enter no. of available rooms" value="<?php echo($roomsAvailable);?>" required>
</div>

<div class="col-xs-6">
	<h4>Wifi</h4>
<input type="text" name="wifi" class="form-control" placeholder="Enter yes or no" value="<?php echo($wifi);?>" required>
</div>

<div class="col-xs-6">
	<h4>Swimming Pool</h4>
<input type="text" name="swimmingPool" class="form-control" placeholder="Enter yes or no" value="<?php echo($swimmingPool);?>" required>
</div>

<div class="col-xs-6">
	<h4>Parking</41>
<input type="text" name="parking" class="form-control" placeholder="Enter yes or no" value="<?php echo($parking);?>" required>
</div>

<div class="col-xs-6">
	<h4>Restaurant</h4>
<input type="text" name="restaurant" class="form-control" placeholder="Enter yes or no" value="<?php echo($restaurant);?>" required>
</div>

<div class="col-xs-6">
	<h4>Laundry</h4>
<input type="text" name="laundry" class="form-control" placeholder="Enter yes or no" value="<?php echo($laundry);?>" required>
</div>

<div class="col-xs-6">
	<h4>Cafe</h4>
<input type="text" name="cafe" class="form-control" placeholder="Enter yes or no" value="<?php echo($cafe);?>" required>
</div>

<div class="col-xs-6">
	<h4>Image</h4>
<input type="text" name="mainImage" class="form-control" placeholder="Enter link of image" value="<?php echo($mainImage);?>" required>
</div>
</div>

	<div>
		<input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add">
    <a href="hotels_update.php"class="btn btn-info btn-block btn-lg">Update | Delete | Search</a>


	</div>
</form>
</div>
</div>
<br>
<br>

    <div class="col-lg-8">
			<h1 class="text-danger text-center" style="font-weight:bold">HOTELS DETAILS</h1>
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

$sql = "SELECT hotelID,hotelName,city,locality,stars,rating,hotelDesc,checkIn,checkOut,price,roomsAvailable,wifi,swimmingPool,parking,restaurant,laundry,cafe,mainImage FROM hotels";
$result = $conn->query($sql);

echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black;'>
<th>Hotel ID</th>
<th>Hotel Name</th>
<th>City</th>
<th>Locality</th>
<th>Stars</th>
<th>Rating</th>
<th>Description</th>
<th>Check In</th>
<th>Check Out</th>
<th>Price</th>
<th>Rooms available</th>
<th>Wifi</th>
<th>Swimming Pool</th>
<th>Parking</th>
<th>Restaurant</th>
<th>Laundry</th>
<th>Cafe</th>
<th>Image</th>

</tr>
</div>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<tr>";
echo "<td>" . $row['hotelID'] . "</td>";
echo "<td>" . $row['hotelName'] . "</td>";
echo "<td>" . $row['city'] . "</td>";
echo "<td>" . $row['locality'] . "</td>";
echo "<td>" . $row['stars'] . "</td>";
echo "<td>" . $row['rating'] . "</td>";
echo "<td>" . $row['hotelDesc'] . "</td>";
echo "<td>" . $row['checkIn'] . "</td>";
echo "<td>" . $row['checkOut'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['roomsAvailable'] . "</td>";
echo "<td>" . $row['wifi'] . "</td>";
echo "<td>" . $row['swimmingPool'] . "</td>";
echo "<td>" . $row['parking'] . "</td>";
echo "<td>" . $row['restaurant'] . "</td>";
echo "<td>" . $row['laundry'] . "</td>";
echo "<td>" . $row['cafe'] . "</td>";
echo "<td>" . $row['mainImage'] . "</td>";

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
