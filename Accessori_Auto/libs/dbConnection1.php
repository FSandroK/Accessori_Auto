<?php

//CONNESSIONE AL DATABASE

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accessori_auto";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
