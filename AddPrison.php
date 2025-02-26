<?php
include ('db_connect.php');

if (isset($_POST['bclkprison'])) {
	$victimID = ($_POST['VictimID']);
	$name = ($_POST['VictimName']);
	$identity = ($_POST['Identity']);
	$city = ($_POST['City']);
	$station = ($_POST['Station']);

	$sql = "INSERT INTO `victim` (`victim_ID`,`name`,`identity`,`city`,`station`) VALUES ('$victimID', '$name', '$identity','$city','$station')";

	$rs = mysqli_query($conn, $sql);

	if (!$rs) {
		echo mysqli_error($conn);
	} else {
		header("Location: Prison.php");
	}
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('AddData.html'); ?>

<div class="form">
	<form method="POST" action="AddPrison.php">
		<div class="contain">
			<span id="title">
				<h1>Add Victim</h1>
				<p>Please fill the details of the victim</p>
			</span>
			<hr>

			<label for="Victim ID"><b>Victim ID: </b></label>
			<input type="text" placeholder="Enter Victim ID" name="VictimID" id="vid" required>
			<br>

			<label for="Victim Name"><b>Name: </b></label>
			<input type="text" placeholder="Enter Victim's Name" name="VictimName" id="vname" required>
			<br>

			<label for="Identity"><b>Identity No: </b></label>
			<input type="text" placeholder="Enter Identity" name="Identity" id="id" required>
			<br>

			<label for="City"><b>City: </b></label>
			<input type="text" placeholder="Enter City" name="City" id="cty" required>
			<br>

			<label for="Station"><b>Station: </b></label>
			<input type="text" placeholder="Enter Station" name="Station" id="stn" required>

			<a class=" button-1 btn btn-secondary btn-lg" href="Prison.php" role="button">Go Back</a>
			<button  class=" button-1 btn btn-success btn-lg" value="Save" name="bclkprison">Save</button>
		</div>
	</form>
</div>

</body>

</html>