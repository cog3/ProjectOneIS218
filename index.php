<?php
$hostname = "sql1.njit.edu";
$username = "cog3";
$password = "nguyen59";
$dbname = "cog3";
$conn = NULL;
try 
{
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname",
    $username, $password);
    echo 'Connected successfully'.'<br>';
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
	http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
}
// this is for the connection 
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up Page</title>
    <!-- Bootstrap core CSS -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

  </head>





  <body>
    <form action="index.php" method="POST">
    <div class="container">
      <div class="row" style="margin-top: 5em;">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="align-content: middle;" >
          <form class="form-signin">
            <h2 style="margin: 0; color: Gray;">Sign Up</h2>
            <input type="text" id="inputFirstname" class="form-control" placeholder="Firstname" name="fname" required />
            <input type="text" id="inputLastName" class="form-control" placeholder="Lastname" name="lname" required />
        </div>
      </div>
      <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <input type="text" id="inputEmail" class="form-control" placeholder="E-mail" name="reg_email" required />
            <input type="text" id="inputPhone" class="form-control" placeholder="Phone Number" name="reg_phone" required />
            <input type="text" id="inputBirth" class="form-control" placeholder="Birthday (mm/dd/yyyy)" name="reg_birth" required />
            <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id ="gender" data-toggle="dropdown" aria-haspopup = "true" aria-expanded = "true"> Gender
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" aria-labelled-by = "gender">
                    <li><a href="#">Female</a></li>
                    <li><a href="#">Male</a></li>
                    <li><a href="#">Other</a></li>
                  </ul>
            </div>      
          </div>
          <div class="col-sm-4"></div>
      </div>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <button class="btn btn-sm btn-success btn-block" type="submit" id="submitButton" name = "submit" style="margin-top: 2em;">Sign in</button>
        </div>
        <div class="col-sm-4">
      </div>  
      

      </form >

    </div> <!-- /container -->
  </body>
</html>



<?php

//$gender = $_POST['reg_gender']

	$firstname = $_POST['fname']; 
	$lastname = $_POST['lname'];
	$email = $_POST['reg_email'];
	$phonenumber = $_POST['reg_phone'];
	$birthdate = $_POST['reg_birth'];


function runQuery($query){
	global $conn;
	try{
	    $get = $conn->prepare($query);
	    $get->execute();
	    $products = $get->fetchAll();
	    $get->closeCursor();
	    return $products;
	}catch(PDOException $e){
		http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
		}	  
}
function http_error($message) 
{
	header("Content-type: text/plain");
	die($message);
}


?>



