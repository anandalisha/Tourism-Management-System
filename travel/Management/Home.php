<?php session_start();
if(!isset($_SESSION['username'])){
    header('Location: adminLogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css?family=Courgette"
      rel="stylesheet"
    />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
    <style>
     body {
        background-image: url('home1.jpg');
        background-repeat:no-repeat;
      }
      h3{
        text:white:
      }
     h1{
        font-size: 60px;
        font-family: Courgette;
        text:black
      }
  
      .options{
        background-color:#fffae6;
        opacity: 0.7;
        margin: 5%;
        font-weight: bold;
        border: 5px solid white;
      }
      a:hover {
        color: #003366;
        text-decoration: none;
      }

    </style>
    <title>Admin Panel | Home</title>
  </head>
  <body >
            <center>
            <h1>
              Tourism Management System</h1
            >
          <h1>Admin Panel</h1>
          </center>
             <div class="options">
              <center>
              <h3><a href="users_add.php">USERS</a></h3>
              <h3><a href="hotels_add.php">ADD HOTELS</a></h3>
              <h3><a href="hotelbookings_view.php">HOTEL BOOKINGS</a></h3>
              <h3><a href="flights_add.php">ADD FLIGHTS</a></h3>
              <h3><a href="flightbookings_view.php">FLIGHT BOOKINGS</a></h3>
              <h3><a href="trains_add.php">ADD TRAINS</a></h3>
              <h3><a href="trainbookings_view.php">TRAIN BOOKINGS</a></h3>
              <h3><a href="adminLogout.php">LOGOUT</a></h3>
    </center>
    </div>
    <center>
    <button class="btn btn-secondary"> <a href="\travel\index.php"><h5>Click here to go to user panel</h5></a></button>
    </center>   
  </body>
</html>
