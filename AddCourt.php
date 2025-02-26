<?php

include ('db_connect.php');
if (isset($_POST['bclkcourt'])) {
    $caseID = ($_POST['CaseID']);
    $courtname = ($_POST['CourtName']);
    $courtcity = ($_POST['CourtCity']);
    $crimeID = ($_POST['CrimeID']);

    $sql = "INSERT INTO `courts` (`case_ID`,`court_name`,`court_city`,`crime_ID`) VALUES ('$caseID', '$courtname', '$courtcity','$crimeID')";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    } else {
        header("Location: Court.php");
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('AddData.html'); ?>

<div class="form" method="POST" action="AddCourt.php">
    <form method="POST" action="AddCourt.php">
        <div class="contain">
            <span id="title">
                <h1>Add Court</h1>
                <p>Please fill the details of the new court</p>
            </span>
            <hr>

            <label for="Caseid"><b>Case ID: </b></label>
            <input type="text" placeholder="Enter Case ID" name="CaseID" id="Caseid" required>
            <br>

            <label for="Courtname"><b>Court Name: </b></label>
            <input type="text" placeholder="Enter Court Name" name="CourtName" id="Courtname" required>
            <br>

            <label for="City"><b>Court City: </b></label>
            <input type="text" placeholder="Enter Court City" name="CourtCity" id="City" required>
            <br>

            <label for="Crime ID"><b>Crime ID: </b></label>
            <input type="text" placeholder="Enter Crime ID" name="CrimeID" id="Crime ID" required>
            <br>

            <a class=" button-1 btn btn-secondary btn-lg" href="Court.php" role="button">Go Back</a>
			<button  class=" button-1 btn btn-success btn-lg" value="Save" name="bclkcourt">Save</button>
        </div>
    </form>
</div>

</body>

</html>