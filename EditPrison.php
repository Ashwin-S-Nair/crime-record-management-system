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
                <h1>Edit Victim's Data</h1>
                <p>Select Victim ID</p>
            </span>

            <?php
            include('db_connect.php');
            if (isset($_GET['submit'])) {
                $victimID = $_GET['VictimID'];
                $name = $_GET['VictimName'];
                $identity = $_GET['Identity'];
                $city = $_GET['City'];
                $station = $_GET['Station'];
                
                $query = mysqli_query($conn, "update victim set name='$name', identity='$identity', city='$city', station='$station' where victim_ID='$victim_ID'");
                
            }
            $query = mysqli_query($conn, "select * from victim");
            while ($row = mysqli_fetch_array($query)) {
            echo "<b><a href='EditPrison.php?update={$row['victim_ID']}'>{$row['victim_ID']}</a></b> "; ?>&emsp;<?php } ?>
                <hr>
                <?php
                if (isset($_GET['update'])) {
                    $update = $_GET['update'];
                    $query1 = mysqli_query($conn, "select * from victim where victim_ID=$update");
                    while ($row1 = mysqli_fetch_array($query1)) {
                        echo "<form class='form' method='get'>";
                        echo "<input class='input' type='hidden' name='VictimID' value='{$row1['victim_ID']}' />";
                        echo "<label>" . "<b>Name:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='VictimName' value='{$row1['name']}' />";
                        echo "<br /><br />";
                        echo "<label>" . "<b>Identity No:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='Identity' value='{$row1['identity']}' />";
                        echo "<br /><br />";
                        echo "<label>" . "<b>City:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='City' value='{$row1['city']}' />";
                        echo "<br /><br />";
                        echo "<label>" . "<b>Station:</b>" . "</label>" . "<br />";
                        echo "<input class='input' type='text' name='Station' value='{$row1['station']}' />";
                        echo "<br />";
                        echo "<input class='submit' type='submit' name='back' value='Go Back' />";
                        ?>&emsp;<?php
                        echo "<input class='submit' type='submit' name='submit' value='Update' />";
                        echo "</form>";
                    }
                }
                if (isset($_GET['submit'])) {
                    header("Location: Prison.php");
                }
                if (isset($_GET['back'])) {
                    header("Location: Prison.php");
                }
                ?>
        </div>
    </div><?php
            mysqli_close($conn);
            ?>
</body>

</html>