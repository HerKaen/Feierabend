<?php

echo "<form action='' method='POST''>";

$db3 = mysqli_connect("localhost", "root", "", "nico");

$sql3 = "SELECT * FROM arbeitszeit";


echo '<br>';

echo "<table border='3' style='text-align: center; border-color:black; background-color:lightblue' width='40%';><tr style='font-weight: bold;'><td width='2%'>ID</td><td width='3%'>KW</td><td width='3%'>Datum</td><td width='5%'>Startstunde</td><td width='5%'>Startminute</td><td width='3%'>Pause</td><td width='3%'>Länger/Kürzer?</td></tr>";

echo "<tr><td>" . '<input type="text" name="Id2">' . "</td><td>" . '<input type="text" name="KW2">' . '</td><td>' . '<input type="text" name="Datum2">' . '</td><td>' . '<input type="text" name="Stunde2">' . "</td><td>" . '<input type="text" name="Minute2">' . "</td><td>" . '<input type="text" name="Pause2">' . "</td><td>" . '<input type="text" name="Overtime2">' . "</td></tr>";

echo "</table>";

echo '<br>';
echo '<input type="submit" name="submit2" value="Änderung abschicken" class="btn-primary">';

echo '<br><br>';

echo '<hr>';

echo '</form>';


if (!empty($_POST["submit2"])) {


    $id2 = $_POST['Id2'];
    $kw2 = $_POST['KW2'];
    $datum2 = $_POST['Datum2'];
    $stunde2 = $_POST['Stunde2'];
    $minute2 = $_POST['Minute2'];
    $pause2 = $_POST['Pause2'];
    $overtime2 = $_POST['Overtime2'];


    if (isset($_POST['KW2']) && $_POST['KW2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET KW='$kw2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Datum2']) && $_POST['Datum2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Datum='$datum2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Stunde2']) && $_POST['Stunde2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Stunde='$stunde2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Minute2']) && $_POST['Minute2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Minute='$minute2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Pause2']) && $_POST['Pause2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Pause='$pause2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Overtime2']) && $_POST['Overtime2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Overtime='$overtime2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    mysqli_close($db3);

}

?>