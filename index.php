<?php
// Includes the DB connection file 
include_once 'includes/dbcon.php';
// Includes the select files
include_once 'includes/select.inc.php' 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Forms Start -->
<div class="forms">
    <h3>General</h3>
    <!-- General form Start -->
    <form action="includes/general.inc.php" name="general" method="POST">  
        <label for="ship">Ship's name</label>
        <input type="text" name="ship" placeholder="">
        <label for="captain">Captain's name</label>
        <input type="text" name="captain" placeholder="">
        <label for="time">Current time UTC</label>
        <input type="time" name="time" placeholder="">
        <label for="date">Current date UTC</label>
        <input type="date" name="date" placeholder="">
        <button type="submit" name="generalsubmit">Button</button>
    </form>
    <!-- General form End -->

    <h3>At Sea</h3>
    <!-- At Sea form Start -->
    <form action="includes/atsea.inc.php" name="atsea" method="POST">
        <label for="seacondition">Current sea condition</label>
        <input type="text" name="seacondition" placeholder="">
        <label for="speed">Current speed in Knots</label>
        <input type="text" name="speed" placeholder="">
        <label for="pilotdistance">Distance to pilot station NM</label>
        <input type="text" name="pilotdistance" placeholder="">
        <label for="pilottime">Time of arrival at pilot station UTC</label>
        <input type="time" name="pilottime" placeholder="">
        <label for="pilotdate">Date of arrival at pilot station</label>
        <input type="date" name="pilotdate" placeholder="">
        <label for="destport">Port of destination</label>
        <input type="text" name="destport" placeholder="">
        <button type="submit" name="atseasubmit">Button</button>
    </form>
    <!-- At Sea form End -->

    <h3>Arriving port</h3>
    <!-- Arriving port form Start -->
    <form action="includes/arrivingport.inc.php" name="arrivingport" method="POST">
        <label for="timepassend">Time end of sea passage UTC</label>
        <input type="time" name="timepassend" placeholder="">
        <label for="dateepassend">Date end of sea passage</label>
        <input type="date" name="datepassend" placeholder="">
        <label for="pilotboardtime">Time of pilot boarding UTC</label>
        <input type="time" name="pilotboardtime" placeholder="">
        <label for="pilotboarddate">Date of pilot boarding</label>
        <input type="date" name="pilotboarddate" placeholder="">
        <label for="distsailed">Distance sailed since last port NM</label>
        <input type="text" name="distsailed" placeholder="">
        <label for="berthtime">Time of berthing UTC</label>
        <input type="time" name="berthtime" placeholder="">
        <label for="berthdate">Date of berthing</label>
        <input type="date" name="berthdate" placeholder="">
        <button type="submit" name="arrivesubmit">Button</button>
    </form>
    <!-- Arriving port form End -->

    <h3>Departing from port</h3>
    <!-- Departing from port form Start -->
    <form action="includes/departport.inc.php" name="departport" method="POST">
        <label for="cargocomptime">Time of completion cargo operations UTC</label>
        <input type="time" name="cargocomptime" placeholder="">
        <label for="departtime">Time of departure UTC</label>
        <input type="time" name="departtime" placeholder="">
        <label for="departdate">Date of departure</label>
        <input type="date" name="departdate" placeholder="">
        <label for="droptime">Time of drop pilot UTC</label>
        <input type="time" name="droptime" placeholder="">
        <label for="dropdate">Date of drop pilot</label>
        <input type="date" name="dropdate" placeholder="">
        <label for="dropdate">Next port</label>
        <input type="text" name="nextport" placeholder="">
        <button type="submit" name="departsubmit">Button</button>
    </form>
    <!-- Departing from port form End -->

    <h3>Cargo</h3>
    <!-- Cargo form Start -->
    <form action="includes/cargo.inc.php" name="cargo" method="POST">
        <label for="cargodescription">Describe the cargo</label>
        <input type="text" name="cargodescription" placeholder="">
        <label for="cargodim">Dimensions of the cargo in Meters</label>
        <input type="text" name="cargodim" placeholder="">
        <label for="cargoweight">Weight of the cargo in Tonnes</label>
        <input type="text" name="cargoweight" placeholder="">
        <button type="submit" name="cargosubmit">Button</button>
    </form>
    <!-- Cargo form End -->
<!-- Forms End -->
</div>
<!-- Tables Start -->
    <!-- General Table Start -->
    <table class="general">
        <thead>General</thead>
        <!-- Table headers -->
        <tr>
            <th>Ship:</th>
            <th>Captain:</th>
            <th>Time:</th>
            <th>Date:</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    <!-- See the includes/select.inc.php file -->
    <?php if ($resultcheckgeneral > 0) { // Checks if the result of rows in the DB is > 0
    // The while loop keeps executing the code inside as long as the condition is true
    while ($row = mysqli_fetch_assoc($resultgeneral)) { // mysqli_fetch_assoc fetches a result row as an associative array.
        // Assigning variables to the associative arrays.
        $genID = $row['id']; // Here we are declaring anssociative arrays to variables. 
        $genSHIP = $row['ship'];
        $genCPT = $row['captain'];
        $genCTIME = $row['curtime'];
        $genCDATE = $row['curdate']; 
    ?>
        <!-- Table content -->
        <tr>
            <!-- This echoes the variables above -->
            <td><?php echo $genSHIP; ?></td> 
            <td><?php echo $genCPT; ?></td>
            <td><?php echo $genCTIME; ?></td>
            <td><?php echo $genCDATE; ?></td>
            <!-- These are our Edit and Delete button, it will send you to the General edit page -->
            <td><a href="edit/genedit.php?genGetID=<?php echo $genID; ?>">Edit</a></td>
            <!-- The delete button will delete the information from the table -->
            <td><a href="delete/gendelete.php?gendel=<?php echo $genID; ?>">Delete</a></td>
        </tr>
    <?php }} ?>
    </table>
    <!-- General Table End -->

    <!-- At Sea Table Start -->
    <table class="atsea">
        <thead>At Sea</thead>
        <tr>
            <th>Sea Condition:</th>
            <th>Speed | Kn:</th>
            <th>Distance to pilot station:</th>
            <th>Date pilot station:</th>
            <th>Time pilot station:</th>
            <th>Destination Port:</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    <?php if ($resultcheckatsea > 0) { 
    while ($row = mysqli_fetch_assoc($resultatsea)) { 
        // Assigning varibales to the associative arrays.  
        $atID = $row['id'];
        $atSC= $row['seacondition'];
        $atSPD = $row['speedknots'];
        $atPDIST = $row['pilotdistNM'];
        $atPTIME = $row['pilottime'];
        $atPDATE = $row['pilotdate'];
        $atPORT = $row['destport'];
    ?>
        <tr>
            <td><?php echo $atSC ?></td>
            <td><?php echo $atSPD ?></td>
            <td><?php echo $atPDIST ?></td>
            <td><?php echo $atPTIME ?></td>
            <td><?php echo $atPDATE ?></td>
            <td><?php echo $atPORT ?></td>
            <!-- These are our Edit and Delete button, it will send you to the At Sea edit page -->
            <td><a href="edit/atseaedit.php?atGetID=<?php echo $atID; ?>">Edit</a></td>
            <!-- The delete button will delete the information from the table -->
            <td><a href="delete/atseadelete.php?atdel=<?php echo $atID; ?>">Delete</a></td>
        </tr>
    <?php }} ?>
    </table>
    <!-- At Sea Table End -->

    <!-- Arriving Port Table Start -->
    <table class="arrivingport">
        <thead>Arriving port</thead>
        <tr>
            <th>Date end of sea passage:</th>
            <th>Time end of sea passage:</th>
            <th>Date pilot boarding:</th>
            <th>Time pilot boarding:</th>
            <th>Distance sailed since last port | NM:</th>
            <th>Date of berthing</th>
            <th>Time of berthing</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    <?php if ($resultcheckarrivingport > 0) { 
    while ($row = mysqli_fetch_assoc($resultarrivingport)) { 
        // Assigning varibales to the associative arrays.
        $arID = $row['id'];
        $arTPE = $row['timepassend'];
        $arDPE = $row['datepassend'];
        $arPBT = $row['pilotboardtime'];
        $arPBD = $row['pilotboarddate'];
        $arDS = $row['distsailedNM'];
        $arBT = $row['berthtime'];
        $arBD = $row['berthdate'];
    ?>
        <tr>
            <td><?php echo $arTPE ?></td>
            <td><?php echo $arDPE ?></td>
            <td><?php echo $arPBT ?></td>
            <td><?php echo $arPBD ?></td>
            <td><?php echo $arDS ?></td>
            <td><?php echo $arBT ?></td>
            <td><?php echo $arBD ?></td>
            <!-- These are our Edit and Delete button, it will send you to the Arriving Port edit page -->
            <td><a href="edit/arriveedit.php?arGetID=<?php echo $arID; ?>">Edit</a></td>
            <!-- The delete button will delete the information from the table -->
            <td><a href="delete/arrivedelete.php?ardel=<?php echo $arID; ?>">Delete</a></td>
        </tr>
    <?php }} ?>
    </table>
    <!-- Arriving Port Table End -->

    <!-- Depart From Port Table Start -->
    <table class="departport">
        <thead>Departing from port</thead>
        <tr>
            <th>Time of completion cargo operations:</th>
            <th>Time of departure:</th>
            <th>Date of departure</th>
            <th>Time of drop pilot:</th>
            <th>Date of drop pilot</th>
            <th>Next port</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    <?php if ($resultcheckdepartport > 0) { 
    while ($row = mysqli_fetch_assoc($resultdepartport)) { 
        // Assigning varibales to the associative arrays.
        $dpID = $row['id'];
        $dpCCT = $row['cargocomptime'];
        $dpDT = $row['departtime'];
        $dpDD = $row['departdate'];
        $dpDRT = $row['droptime'];
        $dpDRD = $row['dropdate'];
        $dpNP = $row['nextport'];
    ?>
        <tr>
            <td><?php echo $dpCCT ?></td>
            <td><?php echo $dpDT ?></td>
            <td><?php echo $dpDD ?></td>
            <td><?php echo $dpDRT ?></td>
            <td><?php echo $dpDRD ?></td>
            <td><?php echo $dpNP ?></td>
            <!-- These are our Edit and Delete button, it will send you to the Depart from Port edit page -->
            <td><a href="edit/depedit.php?dpGetID=<?php echo $dpID; ?>">Edit</a></td>
            <!-- The delete button will delete the information from the table -->
            <td><a href="delete/depdelete.php?dpdel=<?php echo $dpID; ?>">Delete</a></td>
        </tr>
    <?php }} ?>
    </table>
    <!-- Depart From Port Table End -->

    <!-- Cargo Table Start -->
    <table class="cargo">
        <thead>Cargo</thead>
        <tr>
            <th>Cargo description:</th>
            <th>Cargo dimensions | M:</th>
            <th>Cargo Weight | T:</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    <?php if ($resultcheckcargo > 0) { 
    while ($row = mysqli_fetch_assoc($resultcargo)) { 
        // Assigning varibales to the associative arrays.
        $cID = $row['id'];
        $cDESC = $row['cargodescription'];
        $cDIM = $row['cargodimM'];
        $cW = $row['cargoweightT'];
    ?>
        <tr>
            <td><?php echo $cDESC ?></td>
            <td><?php echo $cDIM ?></td>
            <td><?php echo $cW ?></td>
            <!-- These are our Edit and Delete button, it will send you to the Cargo edit page -->
            <td><a href="edit/cargoedit.php?cGetID=<?php echo $cID; ?>">Edit</a></td>
            <!-- The delete button will delete the information from the table -->
            <td><a href="delete/cargodelete.php?cdel=<?php echo $cID; ?>">Delete</a></td>
        </tr>
    <?php }} ?>
    </table>
    <!-- Cargo Table End -->
</body>
</html>