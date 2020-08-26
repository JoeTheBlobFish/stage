<?php 
    // Includes the DB connection file
    include_once 'dbcon.php';

    // Assigning variables 
    // The $_POST collects data submitted from the form
    $timepassend = $_POST['timepassend'];
    $datepassend = $_POST['datepassend'];
    $pilotboardtime = $_POST['pilotboardtime'];
    $pilotboarddate = $_POST['pilotboarddate'];
    $distsailed = $_POST['distsailed'];
    $berthtime = $_POST['berthtime'];
    $berthdate = $_POST['berthdate'];

    // This converts the date format, the one we inserted in the form, into the one that MySQL(Unix Timestamp) uses so we don't get any problems
    $sqlpassendDate=date("Y-m-d H:i:s",strtotime($datepassend));
    $sqlpilotboardDate=date("Y-m-d H:i:s",strtotime($pilotboarddate));
    $sqlpilotboardDate=date("Y-m-d H:i:s",strtotime($pilotboarddate));
    $sqlberthDate=date("Y-m-d H:i:s",strtotime($berthdate));

    // This statement inserts the information we inserted into the form into the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = "INSERT INTO arrivingport (timepassend, datepassend, pilotboardtime, pilotboarddate, distsailedNM, berthtime, berthdate) 
        VALUES ('$timepassend', '$sqlpassendDate', '$pilotboardtime', '$sqlpilotboardDate', '$distsailed', '$berthtime', '$sqlberthDate')";
    // Performs a query on the DB
    mysqli_query($conn, $sql);

// If completed succesfully this will send us back to the main page.
header("Location: ../index.php?arrivingport=success");