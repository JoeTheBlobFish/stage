<!-- This is the update page of the Arriving Port table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';

// If the Update button on the Update Arriving Port page is pressed it will execute this if statement.
if (isset($_POST['arrivingupdate'])) {

    // Here we declare our variables
    $arID = $_GET['ID'];
    $arTPE = $_POST['timepassend'];  // These are the names of the inputs from the Arriving Port Form.
    $arDPE = $_POST['datepassend']; // Don't accidentally use the DB Table row namess here!
    $arPBT = $_POST['pilotboardtime'];
    $arPBD = $_POST['pilotboarddate'];
    $arDS = $_POST['distsailed'];
    $arBT = $_POST['berthtime'];
    $arBD = $_POST['berthdate'];

    // This statement updates the information we inserted into the Arriving Port Update form in the DB
    // Don't accidentally use the name of the form inputs in the SQL statement, use the names of the DB table rows!!!
    $sql = ("UPDATE arrivingport SET timepassend='$arTPE', datepassend='$arDPE', pilotboardtime='$arPBT', pilotboarddate='$arPBD', distsailedNM='$arDS', berthtime='$arBT', berthdate='$arBD' WHERE id=$arID");
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