</head>

<body bgcolor="#EEFDEF">

<?php

$con = mysql_connect("localhost", "root", "", "excellenttaste");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysql_select_db("smart", $con);

 

$result = mysql_query("SELECT * FROM bestellingen");

 

echo "<table border='1'>

<tr>

<th>Id</th>

<th>naam</th>

<th>telefoon</th>

<th>email</th>

</tr>";

 

while($row = mysql_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['Id'] . "</td>";

  echo "<td>" . $row['naam'] . "</td>";

  echo "<td>" . $row['telefoon'] . "</td>";

  echo "<td>" . $row['email'] . "</td>";

  echo "</tr>";

  }

echo "</table>";

 

mysql_close($con);

?>

</body>

</html>