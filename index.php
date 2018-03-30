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


<style>
body{
  background-color: #D3D3D3;
}

</style>


  <body>
    <form action="index.php" method="POST" autocomplete="off">
    <div class="container">
      <div class="row" style="margin-top: 5em;">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="align-content: middle;" >
          <form class="form-signin">
            <h2 style="margin: 0; ">Sign Up</h2>
            



            <input type="text" id="inputFirstname" class="form-control" placeholder="First name" name="fname" value="<?php echo($firstname);?>" required />
            <input type="text" id="inputLastName" class="form-control" placeholder="Last name" name="lname" value="<?php echo($lastname);?>" required />
        



        </div>
      </div>
      <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">




            <input type="text" id="inputEmail" class="form-control" placeholder="E-mail" name="reg_email" value="<?php echo($email);?>" required />
            <input type="text" id="inputPhone" class="form-control" placeholder="Phone Number" name="reg_phone" value="<?php echo($number);?>" required />
            <input type="text" id="inputBirth" class="form-control" placeholder="Birthday (mm/dd/yyyy)" value="<?php echo($birthday);?>" name="reg_birth" required />
            <input type="password" id="inputPassword" class="form-control" placeholder="Enter password" value="<?php echo($password);?>" name="reg_password" required /> 
            <input type="password" id="inputMatchPassword" class="form-control" placeholder="Re-Enter password" value="<?php echo($password);?>" name="reg_Repassword" required /> 


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
          <br>
          <h5 style="margin: auto;"><a href="signin.php">Sign In </a> here</h5>
        </div>
        <div class="col-sm-4">
      </div>  
      </form >
    </div> <!-- /container -->
  </body>
</html>



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
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
	http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
}
function runQuery($query) {
	global $conn;
    try {
		$q = $conn->prepare($query);
		$q->execute();
		$results = $q->fetchAll();
		$q->closeCursor();
		return $results;	
	} catch (PDOException $e) {
		http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
	}	  
}
function http_error($message) 
{
	header("Content-type: text/plain");
	die($message);
}	


	if(isset($_POST['fname'], $_POST['lname'], $_POST['reg_email']
			, $_POST['reg_phone'], $_POST['reg_birth'], $_POST['reg_password'], $_POST['reg_Repassword'])){
		$email = $_POST['reg_email'];
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$number = $_POST['reg_phone'];
		$birthday = $_POST['reg_birth'];
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
		$password = $_POST['reg_password'];
    $match_password = $_POST['reg_Repassword'];
	}



	$sql = 'SELECT * FROM accounts where email="'.$email.'"';
	$results = runQuery($sql);
	if (count($results) > 0){
			header('HTTP/1.1 500 Internal Server Error');
			exit("</br><h4><blockquote> ERROR! This e-mail address already exists. Please try again! </blockquote> </h4><br>");
	}
if($password != $match_password){
  header('HTTP/1.1 500 Internal Server Error');
    exit("</br><h4><blockquote> ERROR! Passwords don't match. Please try again! </blockquote> </h4><br>");
}
	  $insertAccount = "INSERT INTO cog3.accounts (email, fname, lname, phone, birthday, gender, password) VALUES ('$email', '$firstname', '$lastname', '$number', '$birthday', '$gender', '$password')"; 
	  $resultsPositive = runQuery($insertAccount);
		header("Location: signin.php");
?>