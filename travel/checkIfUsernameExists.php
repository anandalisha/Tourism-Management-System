<?php
	
	//database connection
	$servername = "localhost";
	$usernameConn = "root";
	$password = "";
	$dbname = "projectmeteor";

	$username = $_POST["username"];
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernameConn, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("SELECT Username FROM users WHERE Username=?");
    	$stmt->execute([$username]);
		$count=$stmt->rowCount();
		
		if($count>0)
   		{
   		 echo "true";
   		}
   		else
   		{
   		 echo "false";
   }
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

?>