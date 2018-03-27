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

	if(isset($_POST['fname'], $_POST['lname'], $_POST['reg_email']
			, $_POST['reg_phone'], $_POST['reg_birth'])){
		$email = $_POST['reg_email'];
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$number = $_POST['reg_phone'];
		$birhday = $_POST['reg_birth'];
		$gender = null;
		if(isset($_POST['isMale'])){
			$gender = $_POST['isMale'];
		}
		if(isset($_POST['isFemale'])){
			$gender = $_POST['isFemale'];
		}
		if(isset($_POST['isOther'])){
			$gender = $_POST['isOther'];
		}
		echo "Your name is {$firstname} {$lastname} and your email is {$email}.<br> Your gender is {$gender}.<br>";
	}
print_r($_POST);


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
            



            <input type="text" id="inputFirstname" class="form-control" placeholder="First name" name="fname" required />
            <input type="text" id="inputLastName" class="form-control" placeholder="Last name" name="lname" required />
        



        </div>
      </div>
      <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">




            <input type="text" id="inputEmail" class="form-control" placeholder="E-mail" name="reg_email" required />
            <input type="text" id="inputPhone" class="form-control" placeholder="Phone Number" name="reg_phone" required />
            <input type="text" id="inputBirth" class="form-control" placeholder="Birthday (mm/dd/yyyy)" name="reg_birth" required />




           	<input type="radio" name="isMale" value="male"> Male
			<input type="radio" name="isFemale" value="female"> Female
			<input type="radio" name="isOther" value="other"> Other<br>





          </div>
          <div class="col-sm-4"></div>
      </div>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <button class="btn btn-sm btn-success btn-block" type="submit" id="submitButton" name = "submit" value="submit" style="margin-top: 2em;">Sign Up</button>
        </div>
        <div class="col-sm-4">
      </div>  
      </form >
    </div> <!-- /container -->
  </body>
</html>