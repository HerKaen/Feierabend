<?php

echo "<form action='' method='POST''>";

$db3 = mysqli_connect("localhost", "root", "", "nico");

$sql3 = "SELECT * FROM arbeitszeit";

echo '<br>';

echo "<table border='3' style='text-align: center; border-color:black; background-color:lightblue; width:24%';><tr style='font-weight: bold;'><td width='2%'>ID</td><td width='3%'>KW</td><td width='3%'>Datum</td><td width='5%'>Startstunde</td><td width='5%'>Startminute</td><td width='3%'>Pause</td><td width='3%'>Endstunde</td><td>Endminute</td></tr>";

echo "<tr><td>" . '<input type="text" name="Id2">' . "</td><td>" . '<input type="text" name="KW2">' . '</td><td>' . '<input type="text" name="Datum2">' . '</td><td>' . '<input type="text" name="Stunde2">' . "</td><td>" . '<input type="text" name="Minute2">' . "</td><td>" . '<input type="text" name="Pause2">' . "</td><td>" . '<input type="text" name="Stunde22">' . "</td><td>" . '<input type="text" name="Minute22">' . "</td></tr>";

echo "</table>";

echo '<br>';
echo '<input type="submit" name="submit2" value="Änderung abschicken" class="btn-primary">';

echo '</form>';


if (!empty($_POST["submit2"])) {


    $id2 = $_POST['Id2'];
    $kw2 = $_POST['KW2'];
    $datum2 = $_POST['Datum2'];
    $stunde2 = $_POST['Stunde2'];
    $minute2 = $_POST['Minute2'];
    $pause2 = $_POST['Pause2'];
    $stunde22 = $_POST['Stunde22'];
    $minute22 = $_POST['Minute22'];


    if (isset($_POST['KW2']) && $_POST['KW2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET KW='$kw2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Datum2']) && $_POST['Datum2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Datum='$datum2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Stunde2']) && $_POST['Stunde2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Stundestart='$stunde2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Minute2']) && $_POST['Minute2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Minutestart='$minute2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Stunde22']) && $_POST['Stunde22'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Stundeende='$stunde22' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Minute22']) && $_POST['Minute22'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Minuteende='$minute22' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    if (isset($_POST['Stunde22']) && $_POST['Minute22']) {

        $sqlx = "SELECT Stundestart, Minutestart, Pause FROM arbeitszeit WHERE Id='$id2'";
        $resultx = mysqli_query($db3, $sqlx);
        while ($rowx = mysqli_fetch_assoc($resultx)) {
            $stunde2 = $rowx['Stundestart'];
            $minute2 = $rowx['Minutestart'];
            $pause2 = $rowx['Pause'];
        }

        $overtimestdX = $stunde22 - $stunde2;
        $overtimestdY = ($overtimestdX - 8) * 60;
        $overtimestd = $overtimestdY - $pause2;
        $overtimemin = ($minute22 - $minute2);
        $overtime = $overtimestd + $overtimemin;
        $sql5 = "UPDATE arbeitszeit SET Overtime='$overtime' WHERE Id='$id2'";
        mysqli_query($db3, $sql5);
    }

    if (isset($_POST['Pause2']) && $_POST['Pause2'] != '') {
        $sql3 = "UPDATE arbeitszeit SET Pause='$pause2' WHERE Id='$id2'";
        mysqli_query($db3, $sql3);
    }

    mysqli_close($db3);

}

?>