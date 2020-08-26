<!-- This is the edit page of the At Sea table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';
    
    // Getting the ID of the row and selecting it.
    $atID= $_GET['atGetID'];
    $query = "SELECT * FROM atsea WHERE id=$atID";
    // Performs a query on the DB
    $result = mysqli_query($conn, $query);

    // mysqli_fetch_assoc fetches a result row as an associative array.
    $row=mysqli_fetch_assoc($result);
    // Here we declare our variables
    $atID = $row['id']; // Here we are declaring anssociative arrays to variables. 
    $atSC= $row['seacondition'];
    $atSPD = $row['speedknots'];
    $atPDIST = $row['pilotdistNM'];
    $atPTIME = $row['pilottime'];
    $atPDATE = $row['pilotdate'];
    $atPORT = $row['destport'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update At Sea</title>
</head>
    <body>
        <div class="forms">
            <!-- Update At Sea Form Start -->
            <!-- The action sends us to the update file with the ID of the row we want to edit--> 
            <h3>At Sea</h3>
            <form action="../update/atseaupdate.php?ID=<?php echo $atID ?>" name="atsea" method="POST">
                <!-- Once we enter the edit page, the value will echo the data we want to edit and then we can edit it -->
                <label for="seacondition">Current sea condition</label>
                <input type="text" name="seacondition" value="<?php echo $atSC ?>">
                <label for="speed">Current speed in Knots</label>
                <input type="text" name="speed" value="<?php echo $atSPD ?>">
                <label for="pilotdistance">Distance to pilot station NM</label>
                <input type="text" name="pilotdistance" value="<?php echo $atPDIST ?>">
                <label for="pilottime">Time of arrival at pilot station UTC</label>
                <input type="time" name="pilottime" value="<?php echo $atPTIME ?>">
                <label for="pilotdate">Date of arrival at pilot station</label>
                <input type="date" name="pilotdate" value="<?php echo $atPDATE ?>">
                <label for="destport">Port of destination</label>
                <input type="text" name="destport" value="<?php echo $atPORT ?>">
                <button type="submit" name="atseaupdate">Update</button>
            </form>
            <!-- Update Arriving Port Form End -->
        </div>
    </body>
</html>