<!-- This is the update page of the Depart from Port table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';

// If the Update button on the Update Depart from Port page is pressed it will execute this if statement.
if (isset($_POST['departupdate'])) {

    // Here we declare our variables
    $dpID = $_GET['ID'];
    $dpCCT = $_POST['cargocomptime']; // These are the names of the inputs from the Depart from Port Form.
    $dpDT = $_POST['departtime'];    // Don't accidentally use the DB Table row namess here!
    $dpDD = $_POST['departdate'];
    $dpDRT = $_POST['droptime'];
    $dpDRD = $_POST['dropdate'];
    $dpNP = $_POST['nextport'];

    // This statement updates the information we inserted into the Depart from Port Update form in the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = ("UPDATE departport SET cargocomptime='$dpCCT', departtime='$dpDT', departdate='$dpDD', droptime='$dpDRT', dropdate='$dpDRD', nextport='$dpNP' WHERE id=$dpID");
    // Performs a query on the DB
    $result = mysqli_query($conn, $sql);

    // If statement, if the query executes succesfully you will be send back to the main page
    if ($result) {
    header('Location: ../index.php?update=success');
    }
    // If not you will get an error
    else {
        echo 'Error';
    }
}
// If the update button wasn't pressed you will be send back to the main page
else {
    header('location: ../index.php');
}