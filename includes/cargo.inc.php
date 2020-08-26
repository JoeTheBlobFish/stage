<?php 
    // Includes the DB connection file
    include_once 'dbcon.php';

    // Assigning variables 
    // The $_POST collects data submitted from the form
    $cargodesc = $_POST['cargodescription'];
    $cargodim = $_POST['cargodim'];
    $cargoweight = $_POST['cargoweight'];

    // This statement inserts the information we inserted into the form into the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = "INSERT INTO cargo (cargodescription, cargodimM, cargoweightT) 
        VALUES ('$cargodesc', '$cargodim', '$cargoweight')";
    // Performs a query on the DB
    mysqli_query($conn, $sql);

// If completed succesfully this will send us back to the main page.
header("Location: ../index.php?cargo=success");