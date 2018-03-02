<?php


namespace feierabend\Logic;


class ReadAction
{
    public function __invoke()
    {
        echo '<br><center>';

        require "Formulare/Navigation.html";
        require "Formulare/Panel.html";

        $db = mysqli_connect("localhost", "root", "", "nico");

        if (isset($_POST["selector"])) {
            $sql = "SELECT * FROM arbeitszeit WHERE KW = $_POST[KW]";
        } else {
            $sql = "SELECT * FROM arbeitszeit";
        }

        $result = mysqli_query($db, $sql);

        echo '<br>';

        echo "<table border='3' style='text-align: center; border-color:black; background-color:yellowgreen' width='50%';><tr style='font-weight: bold; color:darkslategrey;'><td width='2%'>ID</td><td width='2%'>KW</td><td width='3%'>Datum</td><td width='5%'>Startzeit</td><td width='5%'>Pause</td><td width='3%'>Feierabend?</td><td width='3%'>Feierabend!</td><td width='3%'>Länger/Kürzer</td></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $jetzt = mktime($row['Stundestart'], $row['Minutestart'], 0, 0, 0, 0);
            $ergebnis = $jetzt + (8 * 3600) + ($row['Pause'] * 60);

            echo "<tr><td>" . $row['Id'] . "</td><td>" . $row['KW'] . '</td><td>' . $row['Datum'] . '</td><td>' . $row['Stundestart'] . ":" . $row['Minutestart'] . " Uhr</td><td>" . $row['Pause'] . " Minuten</td><td>" . date("H:i",
                    $ergebnis) . ' Uhr</td><td>' . $row['Stundeende'] . ":" . $row['Minuteende'] . " Uhr</td><td>" . $row['Overtime'] . "</td></tr>";
        }
        echo "</table>";

        mysqli_close($db);

//        -----------------------------------------------------------------------------------------------------------------------------------


        if (isset($_POST["selector"])) {

            $db4 = mysqli_connect("localhost", "root", "", "nico");
            $sql4 = "SELECT SUM(Overtime) AS Summe FROM arbeitszeit WHERE KW = $_POST[KW]";
            $result4 = mysqli_query($db4, $sql4);

            while ($row2 = mysqli_fetch_assoc($result4)) {

                echo "<h2 style='color:dodgerblue'>Überstunden diese Woche: <b style='color:red'>" . $row2['Summe'] . "</b> Minuten</h2>";
            }
        }
    }
}