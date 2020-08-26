<?php 
// Assigning DB information to variables
$dbServerame = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "stage";

// This statement will connect us to the DB
$conn = mysqli_connect($dbServerame, $dbUsername, $dbPassword, $dbName);

// If statement which will terminate the script and send a message if no connection can be made with the DB.
if (!$conn) {
    die ('Failed to connect to DB');
}


