<?php 
    // Includes the DB connection file
    include_once 'dbcon.php';

     // Assigning variables 
    // The $_POST collects data submitted from the form
    $seacon = $_POST['seacondition'];
    $speed = $_POST['speed'];
    $pilotdist = $_POST['pilotdistance'];
    $pilottime = $_POST['pilottime'];
    $pilotdate = $_POST['pilotdate'];
    $destport = $_POST['destport'];

    // This converts the date format, the one we inserted in the form, into the one that MySQL(Unix Timestamp) uses so we don't get any problems
    $sqlpilotDate=date("Y-m-d H:i:s",strtotime($pilotdate));

    // This statement inserts the information we inserted into the form into the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = "INSERT INTO atsea (seacondition, speedknots, pilotdistNM, pilottime, pilotdate, destport) 
        VALUES ('$seacon', '$speed', '$pilotdist', '$pilottime', '$sqlpilotDate', '$destport')";
    // Performs a query on the DB
    mysqli_query($conn, $sql);

// If completed succesfully this will send us back to the main page.
header("Location: ../index.php?atsea=success");