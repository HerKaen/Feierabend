<?php
echo "<form action='' method='POST''>";

$db2 = mysqli_connect("localhost", "root", "", "nico");

$sql2 = "SELECT * FROM arbeitszeit";

echo "<table border='3' style='text-align: center; border-color:black; background-color:orangered' width='15%';><tr style='font-weight: bold;'><td>ID</td></tr>";

echo "<tr><td>" . '<input type="text" name="Id2">' . "</td></tr>";

echo "</table>";

echo '<br>';
echo '<input type="submit" name="submit" value="Eintrag Löschen" style="background: orangered; color:white">';

echo '<br><br>';

echo '<hr>';

if (!empty($_POST["submit"]) && $_POST['Id2'] != '') {

    $id2 = $_POST['Id2'];

    $sql2 = "DELETE FROM arbeitszeit WHERE Id='$id2'";
    mysqli_query($db2, $sql2);

    mysqli_close($db2);

}

echo '</form>';

?>