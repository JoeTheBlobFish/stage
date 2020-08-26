<!-- This is the edit page of the Departing From Port table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';
    
    // Getting the ID of the row and selecting it.
    $dpID= $_GET['dpGetID'];
    $query = "SELECT * FROM departport WHERE id=$dpID";
    // Performs a query on the DB
    $result = mysqli_query($conn, $query);

    // mysqli_fetch_assoc fetches a result row as an associative array.
    $row=mysqli_fetch_assoc($result);
        // Here we declare our variables
        $dpID = $row['id']; // Here we are declaring anssociative arrays to variables. 
        $dpCCT= $row['cargocomptime'];
        $dpDT = $row['departtime'];
        $dpDD = $row['departdate'];
        $dpDRT = $row['droptime'];
        $dpDRD = $row['dropdate'];
        $dpNP = $row['nextport'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Depart Port</title>
</head>
    <body>
        <div class="forms">
            <!-- Update Arriving Port Form Start -->
            <h3>Departing from port</h3>
            <!-- The action sends us to the update file with the ID of the row we want to edit--> 
            <form action="../update/depupdate.php?ID=<?php echo $dpID ?>" name="departport" method="POST">
                <label for="cargocomptime">Time of completion cargo operations UTC</label>
                <!-- Once we enter the edit page, the value will echo the data we want to edit and then we can edit it -->
                <input type="time" name="cargocomptime" value="<?php echo $dpCCT ?>">
                <label for="departtime">Time of departure UTC</label>
                <input type="time" name="departtime" value="<?php echo $dpDT ?>">
                <label for="departdate">Date of departure</label>
                <input type="date" name="departdate" value="<?php echo $dpDD ?>">
                <label for="droptime">Time of drop pilot UTC</label>
                <input type="time" name="droptime" value="<?php echo $dpDRT ?>">
                <label for="dropdate">Date of drop pilot</label>
                <input type="date" name="dropdate" value="<?php echo $dpDRD ?>">
                <label for="dropdate">Next port</label>
                <input type="text" name="nextport" value="<?php echo $dpNP ?>">
                <button type="submit" name="departupdate">Update</button>
            </form>
            <!-- Update Arriving Port Form End -->
        </div>
    </body>
</html>