<!DOCTYPE html>
<html lang="en">

<?php 
// Connection to database
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "utkarshini";

// Create connection
$conn = new mysqli($servername, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed ");
}

 ?>
</html>