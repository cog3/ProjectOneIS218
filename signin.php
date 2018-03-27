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

	if(isset($_POST['reg_email'], $_POST['reg_password'])){
		$password = $_POST['reg_password'];
    $email = $_POST['reg_email'];
	}


  //if email or password not found, prompt user again
  //if all match then take the user to the welcome page

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign In</title>
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
            <h2 style="margin: 0; color: Gray;">Sign In</h2>
        </div>
      </div>
      <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <input type="text" id="inputEmail" class="form-control" placeholder="E-mail" name="reg_email" required />
            <input type="text" id="inputPassword" class="form-control" placeholder="Password" name="reg_password" required />
          </div>
          <div class="col-sm-4"></div>
      </div>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <button class="btn btn-sm btn-success btn-block" type="submit" id="submitButton" name = "submit" value="submit" style="margin-top: 2em;">Sign In</button>
           <br>
          <h5 style="margin: auto;"><a href="index.php">Sign Up</a> here</h5>
        </div>
        <div class="col-sm-4">
      </div>  
      </form >
    </div> <!-- /container -->
  </body>
</html>