<!-- This is the update page of the Cargo table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';

// If the Update button on the Update Arriving Port page is pressed it will execute this if statement.
if (isset($_POST['cargoupdate'])) {

    // Here we assign our variables
    $cID = $_GET['ID']; // These are the names of the inputs from the Cargo Form.
    $cDESC = $_POST['cargodescription']; // Don't accidentally use the DB Table row names here!
    $cDIM = $_POST['cargodim'];
    $cW = $_POST['cargoweight'];

    // This statement updates the information we inserted into the Cargo Update form in the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = ("UPDATE cargo SET cargodescription='$cDESC', cargodimM='$cDIM', cargoweightT='$cW' WHERE id=$cID");
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