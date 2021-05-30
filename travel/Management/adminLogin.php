<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://fonts.googleapis.com/css?family=Courgette"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <style>
     body
      {
        background-image: url('home1.jpg');
        background-repeat:no-repeat;
      }
      


#div_login{
    border: 1px solid gray;
    border-radius: 3px;
    width: 500px;
    height: 390px;
    box-shadow: 0px 2px 2px 0px  gray;
    margin: 0 auto;
     background-color:black;
        opacity: 0.7;
}

#div_login h1{
    margin-top: 0px;
    font-weight: normal;
    padding: 10px;
    background-color: cornflowerblue;
    color: white;
    font-family: sans-serif;
}

#div_login div{
    clear: both;
    margin-top: 10px;
    padding: 5px;
}

#div_login .textbox{
    width: 96%;
    padding: 7px;
}

    </style>

    <title>Login | Admin Panel</title>
    
</head>

<body> 
<center> 

<h1 class="text-center" style="font-size: 60px;
        font-family: Courgette;
        text:black">Admin Panel</h1>
<br>
<br>
<br>
<br>
<div class="container">
    <form method="post" action="">
        <div class="align-center" id="div_login">
            <h1 class="text-center">Login</h1>
            <div>
                <h3 class="text-white">Username:</h3>
                <input type="text" class="textbox " id="txt_uname" name="username" placeholder="Enter Username" />
            </div>
            <div>
            <h3 class="text-white">Password:</h3>
                <input type="password" class="textbox" id="txt_uname" name="password" placeholder="Enter Password"/>
            </div>
            <br>
            <div>
               <h3><input class="btn-success" type="submit" value="Login" name="but_submit" id="but_submit" /></h3>
            </div>
        </div>
    </form>
</div>
</center>

<?php
session_start();

        $servername = "localhost";
		$usernameConn = "root";
		$passwordConn = "";
		$dbname = "projectmeteor";
		
		// Creating a connection to projectmeteor MySQL database
		$conn = mysqli_connect($servername, $usernameConn, $passwordConn, $dbname);
		
		// Checking if we've successfully connected to the database
		if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['but_submit'])){

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if ($username != "" && $password != ""){

        $sql_query = "SELECT count(*) as cntUser FROM `admin` WHERE username='".$username."' AND password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['username'] = $username;
            header('Location: Home.php');
        }else{
            echo "<h4 class='text-center bg-danger' style='font-weight:bold';>Invalid username and password</h4>";
        }

    }

}
?>



</body>
</html>