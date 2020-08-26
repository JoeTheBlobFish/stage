<?php
// Includes the DB connection file 
include_once 'dbcon.php';

// General
$sqlgeneral = "SELECT * FROM general;"; // This statement selects everything inside the table general in the DB.
$resultgeneral = mysqli_query($conn, $sqlgeneral); // Performs a query with the above statement.
$resultcheckgeneral = mysqli_num_rows($resultgeneral); // This will check how many rows our query found inside the table.

// The code below is identical to the code above in function. It's just for a different table.

// At Sea 
$sqlatsea = "SELECT * FROM atsea;";
$resultatsea = mysqli_query($conn, $sqlatsea);
$resultcheckatsea = mysqli_num_rows($resultatsea);

//  Arriving Port
$sqlarrivingport = "SELECT * FROM arrivingport;";
$resultarrivingport = mysqli_query($conn, $sqlarrivingport);
$resultcheckarrivingport = mysqli_num_rows($resultarrivingport);

// Departing from Port
$sqldepartport = "SELECT * FROM departport;";
$resultdepartport = mysqli_query($conn, $sqldepartport);
$resultcheckdepartport = mysqli_num_rows($resultdepartport);

// Cargo
$sqlcargo = "SELECT * FROM cargo;";
$resultcargo = mysqli_query($conn, $sqlcargo);
$resultcheckcargo = mysqli_num_rows($resultcargo);