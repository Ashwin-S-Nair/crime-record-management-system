<?php

include('db_connect.php');

if (isset($_POST['dltc'])) {
    $Cno = $_POST['cno'];

    $sql = "DELETE FROM `victim` WHERE `victim_ID` = '$Cno'";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    } else {
        header('Location: Prison.php');
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>
<?php include('AddData.html'); ?>
<div class="form">
    <form method="POST" action="DeletePrison.php">
        <div class="contain">
            <span id="title">
                <h1>Delete Victim</h1>
                <p>Please fill the details of the victim to be deleted</p>
            </span>
            <hr>

            <label for="Name"><b>Victim ID: </b></label>
            <input type="text" placeholder="Enter Victim ID" name="cno" id="Name" required>
            <br>

            <a class=" button-1 btn btn-secondary btn-lg" href="Prison.php" role="button">Go Back</a>
            <button class=" button-1 btn btn-danger btn-lg" value="Save" name="dltc">Delete</button>
        </div>
    </form>
</div>
</body>

</html>