<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Hotels </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<style>
body{
    font-family: Courgette;
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
	$search_query="SELECT * FROM users WHERE UserID = '$info[0]'";
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
          $AdddressLine1 = $rows['AdddressLine1'];
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
      <a class="navbar-brand" href="http://localhost/management/"> Tourism Management System</a>
    </div>
     <div class="collapse navbar-collapse" id="nav">
    <ul class="nav navbar-nav">
		<li><a href="Home.html">HOME</a></li>
      <li><a href="users_add.php">USERS</a></li>
      <li><a href="hotels_add.php">HOTELS</a></li>
      <li><a href="flights_add.php">FLIGHTS</a></li>
      <li><a href="trains_add.php">TRAINS</a></li>
    </ul>
  </div>
</div>
</nav>
      </div>


	<div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-4">
<form method ="post"   action="">  
  <h1>UserID Number (Use to Search user's data)</h1>
  <input type="number" name="id"  class="form-control" placeholder="UserID No. /Automatic Number Genrates" value="<?php echo($UserID);?>" disabled>

	<div class="form-group row">
	<div class="col-xs-6">
		<h1>FullName</h1>
	<input type="text" name="FullName" class="form-control" placeholder="Enter FullName" value="<?php echo($FullName);?>" required>
</div>

<div class="col-xs-6">
	<h1>Username</h1>
	<input type="text" name="Username" class="form-control" placeholder="Enter Username" value="<?php echo($Username);?>" required>
</div>

<h1>Email</h1>
	<input type="email" name="EMail" class="form-control" placeholder="Enter Email" value="<?php echo($EMail);?>" required>

	<h1>Phone (10-digit)</h1>
	<input type="tel" pattern="^\d{10}$" class="form-control" name="Phone"  placeholder="10 digit Phone number" value="<?php echo($Phone);?>">


	<div class="col-xs-6">
		<h1>Password</h1>
  <input type="password" name="Password" class="form-control" placeholder="Ente password" value="<?php echo($Password);?>" required>
</div>

<div class="col-xs-6">
	<h1>Address Line1</h1>
<input type="text" name="AddressLine1" class="form-control" placeholder="Enter Address Line1" value="<?php echo($AddressLine1);?>" required>
</div>

<div class="col-xs-6">
	<h1>Address Line2</h1>
<input type="text" name="AddressLine2" class="form-control" placeholder="Enter Address Line2" value="<?php echo($AddressLine2);?>" required>
</div>

<div class="col-xs-6">
	<h1>City</h1>
<input type="text" name="City" class="form-control" placeholder="Enter city" value="<?php echo($City);?>" required>
</div>

<div class="col-xs-6">
	<h1>State</h1>
<input type="text" name="State" class="form-control" placeholder="Enter State" value="<?php echo($State);?>" required>
</div>

<div class="col-xs-6">
	<h1>Date</h1>
<input type="date" name="Date" class="form-control" placeholder="Enter date" value="<?php echo($Date);?>" required>
</div>
</div>

	<div>
		<input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add">
    <a href="users_update.php"class="btn btn-info btn-block btn-lg">Update | Delete | Find</a>


	</div>
</form>
</div>

    <div class="col-lg-8">
			<h2>USER'S DATA</h2>
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

echo "<table border='1'>
<tr>
<th>Search ID</th>
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

</tr>";

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
