<?php

include("db_connect.php");

if (isset($_POST['bclkcrime'])) {
    $cid = $_POST['CrimeID'];
    $type = $_POST['Type'];
    $date = $_POST['Date'];
    $city = $_POST['City'];
    $station = $_POST['Station'];
    $crno = $_POST['CriminalNo'];
    $vid = $_POST['VictimID'];

    $sql = "INSERT INTO `crime` (`crime_ID`, `type`, `date`, `city`, `station`,`criminal_ID`,`victim_ID`) VALUES ('$cid', '$type', '$date', '$city', '$station','$crno','$vid')";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    } else {
        header("Location: Crime.php");
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('AddData.html'); ?>

<div class="form">
    <form method="POST" action="AddCrime.php">
        <div class="contain">
            <span id="title">
                <h1>Add Crime</h1>
                <p>Please fill the details of the crime committed by the criminal</p>
            </span>
            <hr>

            <label for="Crime ID"><b>Crime ID: </b></label>
            <input type="text" placeholder="Enter Crime ID" name="CrimeID" id="Crime ID" required>
            <br>

            <label for="Category"><b>Category: </b></label>
            <input type="text" placeholder="Enter Category/Type" name="Type" id="Category" required>
            <br>

            <label for="Date"><b>Date: </b></label>
            <input type="text" placeholder="Enter Date of Crime:YYYY-MM-DD" name="Date" id="Date" required>
            <br>

            <label for="City"><b>City: </b></label>
            <input type="text" placeholder="Enter City" name="City" id="City" required>
            <br>

            <label for="Station"><b>Station: </b></label>
            <input type="text" placeholder="Enter Station" name="Station" id="Station" required>
            <br>

            <label for="Criminal Number"><b>Criminal No: </b></label>
            <input type="text" placeholder="Enter Criminal's ID" name="CriminalNo" id="Criminal Number" required>
            <br>

            <label for="Victim"><b>Victim ID: </b></label>
            <input type="text" placeholder="Enter the Victim's ID" name="VictimID" id="Victim" required>
            <br>

            <a class=" button-1 btn btn-secondary btn-lg" href="Crime.php" role="button">Go Back</a>
			<button  class=" button-1 btn btn-success btn-lg" value="Save" name="bclkcrime">Save</button>
        </div>
    </form>
</div>

</body>

</html>