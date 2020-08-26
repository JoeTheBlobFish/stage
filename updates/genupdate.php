<!-- This is the update page of the General table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';

// If the Update button on the Update General page is pressed it will execute this if statement.
if (isset($_POST['generalupdate'])) {

    // Here we declare our variables
    $genID = $_GET['ID'];
    $genSHIP= $_POST['ship'];     // These are the names of the inputs from the General Form.
    $genCPT = $_POST['captain']; // Don't accidentally use the DB Table row namess here!
    $genCTIME = $_POST['time'];
    $genCDATE = $_POST['date'];

    // This statement updates the information we inserted into the General Update form in the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = ("UPDATE general SET ship='$genSHIP', captain='$genCPT', curtime='$genCTIME', curdate='$genCDATE' WHERE id=$genID");
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
    header('location: index.php');
}