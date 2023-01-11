<?php 

include 'database.php';
$db = new database();
$db->addUser();

if(isset($_POST['submit'])){

    $fieldnames = ['username', 'password'];

    $error = false; 

    foreach ($fieldnames as $field) {
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $error = true; 
            }
        }

        if(!$error){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $db = new database();
            $db->login($username, $password);
        }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Homepage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
  font-family: Arial, Helvetica, sans-serif;
}
.navbar {
  overflow: hidden;
  background-color: white;
  border-top: 15px solid black;
  border-bottom: 15px solid white;
  
}
.navbar a {
  float: left;
  font-size: 16px;
  color: grey;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.dropdown {
  float: left;
  overflow: hidden;
}
.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: grey;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: white;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.dropdown-content a:hover {
  background-color: white;
}
.dropdown:hover .dropdown-content {
  display: block;
}

</style>
</head>
<body>
<div class="navbar">
    <a class="active" href="#home">Home</a>
    
    <a href="reservering.php">Reserveringen</a>
    
    <div class="dropdown">
    <button class="dropbtn">Serveren 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="kok.php">Voor kok</a>
      <a href="barman.php">Voor barman</a>
      <a href="ober.php">Voor ober</a>
    </div>
</div>

<div class="dropdown">
    <button class="dropbtn">Gegevens
      <i class="fa fa-caret-down"></i>
    </button>
    
    <div class="dropdown-content">
      <a href="drinken.php">Drinken</a>
      <a href="eten.php">Eten</a>
      <a href="klanten.php">Klanten</a>   
      <a href="hoofdgroepen.php">Gerecht hoofdgroepen</a>
      <a href="subgroepen.php">Gerecht subgroepen</a>
    </div>
    
</div> 
<a href="register.php">Account maken medewerkers</a>
</div> 
<div>
<div>
<img style="float:right" src="restaurant.jpg" alt="restaurant" width="500" height="300"/>
<p>
    Welkom bij de reserverings- en bestellingenapplicatie van Restaurant Excellent Taste.
    <br><br>
    Vul eerst een reservering in. Deze kan telefonisch binnenkomen of kan worden ingevoerd als gasten plaatsnemen aan een vrije tafel.
    <br><br>
    Daarna kan een bestelling worden opgenomen.

</p>
</div>

</div>

</div>
</body>
</html>