<?php

include('db_connect.php');
include('role.php');

$sql = 'SELECT * FROM victim';

$result = mysqli_query($conn, $sql);

$victims = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<div id="main-div-1">
    <!--Heading-->
    <div>
        <h1>&nbsp;VICTIMS</h1>
    </div>
    <?php if ($role == 1 || $role == 2) { ?>
        <div id="div-1">
            <div class="dropdown">
            </div>
            <div id="div-button-1">
                <a class=" button-1 btn btn-success btn-lg" href="AddPrison.php" role="button">Add Data</a>
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            <div id="div-button-1">
                <a class=" button-1 btn btn-danger btn-lg" href="DeletePrison.php" role="button">Delete Data</a>
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            <div id="div-button-1">
                <a class=" button-1 btn btn-primary btn-lg" href="EditPrison.php" role="button">Edit Data</a>
            </div>
        </div>
    <?php } ?>
</div>


<div id="main-div-2">

    <?php foreach ($victims as $victim) { ?>
        <div class="div-2">
            <p><b>Victim ID: </b><?php echo htmlspecialchars($victim['victim_ID']); ?></p>
            <p><b>Victim Name: </b><?php echo htmlspecialchars($victim['name']); ?></p>
            <p><b>Identity No: </b><?php echo htmlspecialchars($victim['identity']); ?></p>
            <p><b>City: </b><?php echo htmlspecialchars($victim['city']); ?></p>
            <p><b>Station: </b><?php echo htmlspecialchars($victim['station']); ?></p>
        </div>
    <?php } ?>

</div>


</body>

</html>