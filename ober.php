<?php

include "database.php";

if (isset($_POST['submit'])) {
	
$reservering_ID =	$_POST['reservering_ID'];
$menuitem_ID =	$_POST['menuitem_ID'];
$aantal =	$_POST['aantal'];
$geserveerd =	$_POST['geserveerd'];
$connection = mysqli_connect('localhost', 'root', '', 'excellenttaste');

	if ($connection) {
		
		echo "We are connected";
	} else {
		die("Connection database failed");
	}


	$query = "INSERT INTO bestellingen(reservering_ID, menuitem_ID, aantal, geserveerd) VALUES ('$reservering_ID', '$menuitem_ID', '$aantal', $geserveerd')";

	$result = mysqli_query($connection, $query);

		if (!$result) {
			die('Query failed' . mysqli_error());
		}

	if ($username && $password) {
		echo $username;
		echo $password;
	} else {
		echo "Type your username and password";
	}

echo $username;
echo $password;

}




?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Create account</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<h2>Ober</h2>
</head>
<body>
	<div class="container">

		<div class="col-xs-6"> 
			<form action="loginEmployee.php" method="post">
				<div class="form-group">
				<label for="menuitem_ID">ID menuitem </label>
				<input type="int" name="menuitem_ID" class="form-control">
				</div>

				<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
				</div>

                <select name="color" id="color">
	                <option value="">--- Choose a color ---</option>
	                <option value="red">Red</option>
	                <option value="green">Green</option>
	                <option value="blue">Blue</option>
                </select>

				<input class="btn btn-primary" type="submit" name="submit" value="Send">

			</form>

			<a href="print.php">Print bon voor klant</a> 
		</div>
	
</body>
</html>