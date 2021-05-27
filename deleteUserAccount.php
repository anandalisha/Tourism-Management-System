<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

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

	$user = $_SESSION["username"];
	
	$deleteUserSQL = "DELETE FROM `users` WHERE Username='$user'";
	$deleteUserQuery = $conn->query($deleteUserSQL);

	$deleteFlightBookingsSQL = "DELETE FROM `flightbookings` WHERE Username='$user'";
	$deleteFlightBookingsQuery = $conn->query($deleteFlightBookingsSQL);

	/*-------------------------------------------------------------------------------
	
	
				Add SQL statements to delete train
	
	
	-------------------------------------------------------------------------------*/


?>