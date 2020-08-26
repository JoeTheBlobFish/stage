<!-- This is the edit page of the Cargo table -->
<?php 
    // Includes the DB connection file
    include_once '../includes/dbcon.php';

    // Getting the ID of the row and selecting it.
    $cID= $_GET['cGetID'];
    $query = "SELECT * FROM cargo WHERE id=$cID";
    // Performs a query on the DB
    $result = mysqli_query($conn, $query);

    // mysqli_fetch_assoc fetches a result row as an associative array.
    $row=mysqli_fetch_assoc($result);
    // Here we declare our variables
    $cID = $row['id'];
    $cDESC = $row['cargodescription'];
    $cDIM = $row['cargodimM'];
    $cW = $row['cargoweightT'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Cargo</title>
</head>
    <body>
        <div class="forms">
            <!-- Update Arriving Port Form Start -->
            <h3>Cargo</h3>
            <!-- The action sends us to the update file with the ID of the row we want to edit--> 
            <form action="../update/cargoupdate.php?ID=<?php echo $cID ?>" name="cargo" method="POST">
                <label for="cargodescription">Describe the cargo</label>
                <!-- Once we enter the edit page, the value will echo the data we want to edit and then we can edit it -->
                <input type="text" name="cargodescription" value="<?php echo $cDESC ?>">
                <label for="cargodim">Dimensions of the cargo in Meters</label>
                <input type="text" name="cargodim" value="<?php echo $cDIM ?>">
                <label for="cargoweight">Weight of the cargo in Tonnes</label>
                <input type="text" name="cargoweight" value="<?php echo $cW ?>">
                <button type="submit" name="cargoupdate">Update</button>
            </form>
            <!-- Update Arriving Port Form End -->
        </div>
    </body>
</html>