<!-- This is the edit page of the General table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';
    
    // Getting the ID of the row and selecting it.
    $genID= $_GET['genGetID'];
    $query = "SELECT * FROM general WHERE id=$genID";
    $result = mysqli_query($conn, $query);

    // mysqli_fetch_assoc fetches a result row as an associative array.
    $row=mysqli_fetch_assoc($result);
        // Here we declare our variables
        $genID = $row['id']; // Here we are declaring anssociative arrays to variables. 
        $genSHIP= $row['ship'];
        $genCPT = $row['captain'];
        $genCTIME = $row['curtime'];
        $genCDATE = $row['curdate'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update General</title>
</head>
    <body>
        <div class="forms">
            <!-- Update General Form Start -->
            <h3>General</h3>
            <!-- The action sends us to the update file with the ID of the row we want to edit--> 
            <form action="../update/genupdate.php?ID=<?php echo $genID ?>" name="general" method="POST">
                <label for="ship">Ship's name</label>
                <!-- Once we enter the edit page, the value will echo the data we want to edit and then we can edit it -->
                <input type="text" name="ship" value="<?php echo $genSHIP ?>">
                <label for="captain">Captain's name</label>
                <input type="text" name="captain" value="<?php echo $genCPT ?>">
                <label for="time">Current time UTC</label>
                <input type="time" name="time" value="<?php echo $genCTIME ?>">
                <label for="date">Current date UTC</label>
                <input type="date" name="date" value="<?php echo $genCDATE ?>">
                <button type="submit" name="generalupdate">Update</button>
            </form>
            <!-- Update General Form End -->
        </div>
    </body>
</html>