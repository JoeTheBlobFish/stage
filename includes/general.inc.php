<?php 
    // Includes the DB connection file
    include_once 'dbcon.php';

    // Assigning variables 
    // The $_POST collects data submitted from the form
    $ship = $_POST['ship'];
    $captain = $_POST['captain'];
    $time = $_POST['time'];
    $date = $_POST['date'];

    // This converts the date format, the one we inserted in the form, into the one that MySQL(Unix Timestamp) uses so we don't get any problems
    $sqlDate=date("Y-m-d H:i:s",strtotime($date));

    // This statement inserts the information we inserted into the form into the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = "INSERT INTO general (ship, captain, curtime, curdate) 
        VALUES ('$ship', '$captain', '$time', '$sqlDate')";
    // Performs a query on the DB
    mysqli_query($conn, $sql);

// If completed succesfully this will send us back to the main page.  
header("Location: ../index.php?general=success");
