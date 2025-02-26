<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
</head>

<?php include('header.html'); ?>

<?php include('EditData.html'); ?>


<body>
    <div class="form">
        <div class="contain">
            <span id="title">
                <h1>Edit Crime Data</h1>
                <p>Select Crime ID</p>
            </span>
            <?php
            include('db_connect.php');
            if (isset($_GET['submit'])) {
                $cid = $_POST['crime_ID'];
                $type = $_POST['type'];
                $date = $_POST['date'];
                $city = $_POST['city'];
                $station = $_POST['station'];
                $crno = $_POST['criminal_ID'];
                $vid = $_POST['victim_ID'];
                
                $query = mysqli_query($conn, "update crime set crime_ID='$cid', type='$type', date='$date', city='$city', station='$station', criminal_ID='$crno', victim_ID='$vid' where crime_ID='$cid'");

            }
            $query = mysqli_query($conn, "select * from crime");
            while ($row = mysqli_fetch_array($query)) {
            echo "<b><a href='EditCrime.php?update={$row['crime_ID']}'>{$row['crime_ID']}</a></b> "; ?>&emsp;<?php } ?>
                <hr>
                <?php
                if (isset($_GET['update'])) {
                    $update = $_GET['update'];
                    $query1 = mysqli_query($conn, "select * from crime where crime_ID=$update");
                    while ($row1 = mysqli_fetch_array($query1)) {
                        echo "<form class='form' method='get'>";
                        echo "<input class='input' type='hidden' name='CrimeID' value='{$row1['crime_ID']}' />";
                        echo "<label>" . "<b>Type:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='Type' value='{$row1['type']}' />";
                        echo "<br /><br />";
                        echo "<label>" . "<b>Date of Crime:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='Date' value='{$row1['date']}' />";
                        echo "<br /><br />";
                        echo "<label>" . "<b>City:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='City' value='{$row1['city']}' />";
                        echo "<br /><br />";
                        echo "<label>" . "<b>Station:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='Station' value='{$row1['station']}' />";
                        echo "<br /><br />";
                        echo "<label>" . "<b>Criminal Number:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='CriminalNo' value='{$row1['criminal_ID']}' />";
                        echo "<br /><br />";
                        echo "<label>" . "<b>Victim ID:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='VictimID' value='{$row1['victim_ID']}' />";
                        echo "<br />";
                        echo "<input class='submit' type='submit' name='back' value='Go Back' />";
                        ?>&emsp;<?php
                        echo "<input class='submit' type='submit' name='submit' value='Update' />";
                        echo "</form>";
                    }
                }
                if (isset($_GET['submit'])) {
                    header("Location: Crime.php");
                }
                if (isset($_GET['back'])) {
                    header("Location: Crime.php");
                }
                ?>
        </div>
    </div><?php
            mysqli_close($conn);
            ?>
</body>

</html>