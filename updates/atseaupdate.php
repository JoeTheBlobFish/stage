<!-- This is the update page of the At Sea table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';

// If the Update button on the Update At Sea page is pressed it will execute this if statement.
if (isset($_POST['atseaupdate'])) {

    // Here we assign our variables
    $atID = $_GET['ID'];
    $atSC= $_POST['seacondition']; // These are the names of the inputs from the At Sea Form.
    $atSPD = $_POST['speed'];     // Don't accidentally use the DB Table row names here! 
    $atPDIST = $_POST['pilotdistance'];
    $atPTIME = $_POST['pilottime'];
    $atPDATE = $_POST['pilotdate'];
    $atPORT = $_POST['destport'];

    // This statement updates the information we inserted into the At Sea Update form in the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = ("UPDATE atsea SET seacondition='$atSC', speedknots='$atSPD', pilotdistNM='$atPDIST', 
    pilottime='$atPTIME', pilotdate='$atPDATE', destport='$atPORT' WHERE id=$atID");
    // Performs a query on the DB
    $result = mysqli_query($conn, $sql);

    // If statement, if the query executes succesfully you will be send back to the main page
    if ($result) {
    header('Location: ../index.php?update=success');
    }
    // If not you will get an error
    else {
        echo 'Error, check your query';
    }
}
// If the update button wasn't pressed you will be send back to the main page
else {
    header('location: ../index.php');
}