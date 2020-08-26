<!-- This is the edit page of the Arriving Port table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';

    // Getting the ID of the row and selecting it.
    $arID = $_GET['arGetID'];
    $query = "SELECT * FROM arrivingport WHERE id=$arID";
    // Performs a query on the DB
    $result = mysqli_query($conn, $query);

    // mysqli_fetch_assoc fetches a result row as an associative array.
    $row=mysqli_fetch_assoc($result);
        // Here we declare our variables
        $arID = $row['id']; // Here we are declaring anssociative arrays to variables. 
        $arTPE = $row['timepassend']; 
        $arDPE = $row['datepassend'];
        $arPBT = $row['pilotboardtime'];
        $arPBD = $row['pilotboarddate'];
        $arDS = $row['distsailedNM'];
        $arBT = $row['berthtime'];
        $arBD = $row['berthdate'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Arriving Port</title>
</head>
    <body>
        <div class="forms">
            <!-- Update Arriving Port Form Start -->
            <h3>Arriving Port</h3>
            <!-- The action sends us to the update file with the ID of the row we want to edit--> 
            <form action="../update/arrivingupdate.php?ID=<?php echo $arID ?>" name="arrivingport" method="POST">
                <label for="timepassend">Time end of sea passage UTC</label>
                <!-- Once we enter the edit page, the value will echo the data we want to edit and then we can edit it -->
                <input type="time" name="timepassend" value="<?php echo $arTPE ?>">
                <label for="dateepassend">Date end of sea passage</label>
                <input type="date" name="datepassend" value="<?php echo $arDPE ?>">
                <label for="pilotboardtime">Time of pilot boarding UTC</label>
                <input type="time" name="pilotboardtime" value="<?php echo $arPBT ?>">
                <label for="pilotboarddate">Date of pilot boarding</label>
                <input type="date" name="pilotboarddate" value="<?php echo $arPBD ?>">
                <label for="distsailed">Distance sailed since last port NM</label>
                <input type="text" name="distsailed" value="<?php echo $arDS ?>">
                <label for="berthtime">Time of berthing UTC</label>
                <input type="time" name="berthtime" value="<?php echo $arBT ?>">
                <label for="berthdate">Date of berthing</label>
                <input type="date" name="berthdate" value="<?php echo $arBD ?>">
                <button type="submit" name="arrivingupdate">Update</button>
            </form>
            <!-- Update Arriving Port Form End -->
        </div>
    </body>
</html>