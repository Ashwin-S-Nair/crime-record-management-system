<?php

include('db_connect.php');
include('role.php');

$sql = 'SELECT * FROM crime ORDER BY crime_ID';

$result = mysqli_query($conn, $sql);

$crimes = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<div id="main-div-1">
    <!--Heading-->
    <div>
        <h1>&nbsp;CRIMES</h1>
    </div>

    <div id="div-1">
        <div class="dropdown">
        </div>
        <div id="div-button-1">
            <a class=" button-1 btn btn-success btn-lg" href="AddCrime.php" role="button">Add Data</a>
        </div>
        &nbsp;
        &nbsp;
        &nbsp;
        <div id="div-button-1">
            <a class=" button-1 btn btn-danger btn-lg" href="DeleteCrime.php" role="button">Delete Data</a>
        </div>
        &nbsp;
        &nbsp;
        &nbsp;
        <div id="div-button-1">
            <a class=" button-1 btn btn-primary btn-lg" href="EditCrime.php" role="button">Edit Data</a>
        </div>
        &nbsp;
        &nbsp;
        &nbsp;
        <div id="div-button-1">
            <a class=" button-1 btn btn-secondary btn-lg" href="OldCrime.php" role="button">Old Data</a>
        </div>
    </div>

</div>

<div id="main-div-2">

    <?php foreach ($crimes as $crime) { ?>
        <div class="div-2">
            <p><b>Crime ID: </b><?php echo htmlspecialchars($crime['crime_ID']); ?></p>
            <p><b>Category: </b><?php echo htmlspecialchars($crime['type']); ?></p>
            <p><b>Date: </b><?php echo htmlspecialchars($crime['date']); ?></p>
            <p><b>City: </b><?php echo htmlspecialchars($crime['city']); ?></p>
            <p><b>Registered Station: </b><?php echo htmlspecialchars($crime['station']); ?></p>
            <p><b>Criminal ID: </b><?php echo htmlspecialchars($crime['criminal_ID']); ?></p>
            <p><b>Victim ID: </b><?php echo htmlspecialchars($crime['victim_ID']); ?></p>
        </div>
    <?php } ?>

</div>


</body>

</html>