<!-- This is the delete file of the Arriving Port table -->
<?php 
// Includes the DB connection file
include_once '../includes/dbcon.php';

    // If statement, checks if the Delete button gets clicked
    if (isset($_GET['ardel'])) {
        
        // Gets the ID of the row we want to delete
        $id = $_GET['ardel'];
        // This statement will delete our row
        $sql = "DELETE FROM arrivingport WHERE id='$id'";
        // Performs a query on the DB
        $result = mysqli_query($conn, $sql);

        // If statement, if the query executes succesfully you will be send back to the main page
        if ($result) {
            header('Location: ../index.php?delete=success');
        }
        // If not you will get an error
        else {
            echo 'Error, check your query';
        }
    }
    // If the delete button wasn't pressed you will be send back to the main page
    else {
        header('Location: ../index.php?delete=success');
    }