<?php
    // Includes the DB connection file
    include_once 'dbcon.php';

    // Assigning variables 
    // The $_POST collects data submitted from the form
    $cargocomptime = $_POST['cargocomptime'];
    $departtime = $_POST['departtime'];
    $departdate = $_POST['departdate'];
    $droptime = $_POST['droptime'];
    $dropdate = $_POST['dropdate'];
    $nextport = $_POST['nextport'];

    // This converts the date format, the one we inserted in the form, into the one that MySQL(Unix Timestamp) uses so we don't get any problems
    $sqldepartDate=date("Y-m-d H:i:s",strtotime($departdate));
    $sqldropDate=date("Y-m-d H:i:s",strtotime($dropdate));

    // This statement inserts the information we inserted into the form into the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = "INSERT INTO departport (cargocomptime, departtime, departdate, droptime, dropdate, nextport) 
            VALUES ('$cargocomptime', '$departtime', '$sqldepartDate', '$droptime', '$sqldropDate', '$nextport')";
    // Performs a query on the DB
    mysqli_query($conn, $sql);

// If completed succesfully this will send us back to the main page.    
header("Location: ../index.php?departport=success");