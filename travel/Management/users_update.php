<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Users </title>
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
$UserID="";
$FullName="";
$EMail="";
$Phone="";
$Username="";
$Password="";
$AddressLine1="";
$AddressLine2="";
$City="";
$State="";
$Date="";

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

$data[0]=$_POST['UserID'];
$data[1]=$_POST['FullName'];
$data[2]=$_POST['EMail'];
$data[3]=$_POST['Phone'];
$data[4]=$_POST['Username'];
$data[5]=$_POST['Password'];
$data[6]=$_POST['AddressLine1'];
$data[7]=$_POST['AddressLine2'];
$data[8]=$_POST['City'];
$data[9]=$_POST['State'];
$data[10]=$_POST['Date'];
	return $data;
}
//search
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM users WHERE UserID ='$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$UserID = $rows['UserID'];
					$FullName = $rows['FullName'];
					$EMail = $rows['EMail'];
					$Phone = $rows['Phone'];
					$Username = $rows['Username'];
                    $Password = $rows['Password'];
                    $AddressLine1 = $rows['AddressLine1'];
                    $AddressLine2 = $rows['AddressLine2'];
                    $City = $rows['City'];
                    $State = $rows['State'];
					$Date = $rows['Date'];

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
	$insert_query="INSERT INTO `users`(`FullName`, `EMail`, `Phone`, `Username`,`Password`,`AddressLine1`,`AddressLine2`,`City`,`State`,`Date`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]','$info[10]')";
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
	$delete_query = "DELETE FROM `users` WHERE UserID = '$info[0]'";
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
	$update_query="UPDATE `users` SET FullName='$info[1]',EMail='$info[2]',Phone='$info[3]',Username='$info[4]',Password='$info[5]',AddressLine1='$info[6]',AddressLine2='$info[7]',City='$info[8]',State='$info[9]',Date='$info[10]' WHERE UserID = '$info[0]'";
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
  <h4>UserID (Use to Search users data)</h4>
  <input type="number" name="UserID"  class="form-control" placeholder="UserID No. /Automatic Number Genrates" value="<?php echo($UserID);?>">

	<div class="form-group row">
	<div class="col-xs-6">
		<h4>FullName</h4>
	<input type="text" name="FullName" class="form-control" placeholder="Enter FullName" value="<?php echo($FullName);?>">
</div>

<div class="col-xs-6">
	<h4>Username</h4>
	<input type="text" name="Username" class="form-control" placeholder="Enter Username" value="<?php echo($Username);?>" >
</div>

<div class="col-xs-6">
<h4>Email</h4>
	<input type="email" name="EMail" class="form-control" placeholder="Enter Email" value="<?php echo($EMail);?>">
</div>

     <div class="col-xs-6">
	<h4>Phone (10-digit)</h4>
	<input type="tel" pattern="^\d{10}$" class="form-control" name="Phone"  placeholder="10 digit Phone number" value="<?php echo($Phone);?>">
</div>


	<div class="col-xs-6">
		<h4>Password</h1>
  <input type="password" name="Password" class="form-control" placeholder="Ente password" value="<?php echo($Password);?>">
</div>

<div class="col-xs-6">
	<h4>Address Line1</h4>
<input type="text" name="AddressLine1" class="form-control" placeholder="Enter Address Line1" value="<?php echo($AddressLine1);?>" >
</div>

<div class="col-xs-6">
	<h4>Address Line2</h4>
<input type="text" name="AddressLine2" class="form-control" placeholder="Enter Address Line2" value="<?php echo($AddressLine2);?>">
</div>

<div class="col-xs-6">
	<h4>City</h4>
<input type="text" name="City" class="form-control" placeholder="Enter city" value="<?php echo($City);?>">
</div>

<div class="col-xs-6">
	<h4>State</h4>
<input type="text" name="State" class="form-control" placeholder="Enter State" value="<?php echo($State);?>">
</div>

<div class="col-xs-6">
	<h4>Date</h4>
<input type="date" name="Date" class="form-control" placeholder="Enter date" value="<?php echo($Date);?>">
</div>
</div>
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
			<h1 class="text-danger text-center" style="font-weight:bold">Users Data Update | Delete </h1>
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


$sql = "SELECT UserID,FullName,EMail,Phone,Username,Password,AddressLine1,AddressLine2,City,State,Date FROM users";
$result = $conn->query($sql);

$result = $conn->query($sql);

echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black;'>

<th>UserID</th>
<th>FullName</th>
<th>EMail</th>
<th>Phone</th>
<th>Username</th>
<th>Password</th>
<th>AddressLine1</th>
<th>AddressLine2</th>
<th>City</th>
<th>State</th>
<th>Date</th>


</tr>
</div>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

       echo "<tr>";
echo "<td>" . $row['UserID'] . "</td>";
echo "<td>" . $row['FullName'] . "</td>";
echo "<td>" . $row['EMail'] . "</td>";
echo "<td>" . $row['Phone'] . "</td>";
echo "<td>" . $row['Username'] . "</td>";
echo "<td>" . $row['Password'] . "</td>";
echo "<td>" . $row['AddressLine1'] . "</td>";
echo "<td>" . $row['AddressLine2'] . "</td>";
echo "<td>" . $row['City'] . "</td>";
echo "<td>" . $row['State'] . "</td>";
echo "<td>" . $row['Date'] . "</td>";

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
