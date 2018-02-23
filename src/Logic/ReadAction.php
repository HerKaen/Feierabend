<?php


namespace feierabend\Logic;


class ReadAction
{
    public function __invoke()
    {
        echo '<br><center>';

        require "Navigation.html";
        require "Panel.html";

        $db = mysqli_connect("localhost", "root", "", "nico");

        if (isset($_POST["selector"])) {
            $sql = "SELECT * FROM arbeitszeit WHERE KW = $_POST[KW]";
        } else {
            $sql = "SELECT * FROM arbeitszeit";
        }

        $result = mysqli_query($db, $sql);

        echo '<br>';

        echo "<table border='3' style='text-align: center; border-color:black; background-color:yellowgreen' width='50%';><tr style='font-weight: bold; color:darkslategrey;'><td width='2%'>ID</td><td width='2%'>KW</td><td width='3%'>Datum</td><td width='5%'>Startzeit</td><td width='5%'>Pause</td><td width='3%'>Feierabend?</td><td width='3%'>Länger/Kürzer?</td></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $jetzt = mktime($row['Stunde'], $row['Minute'], 0, 0, 0, 0);
            $ergebnis = $jetzt + (8 * 3600) + ($row['Pause'] * 60);

            echo "<tr><td>" . $row['Id'] . "</td><td>" . $row['KW'] . '</td><td>' . $row['Datum'] . '</td><td>' . $row['Stunde'] . ":" . $row['Minute'] . " Uhr</td><td>" . $row['Pause'] . " Minuten</td><td>" . date("H:i",
                    $ergebnis) . " Uhr</td><td>" . $row['Overtime'] . " Minuten</td></tr>";
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
        echo '<script>';
        echo '$("#hiddendiv1").hide();';
        echo '$("button").on("click", function(e){';
        echo 'e.preventDefault();';
        echo '$("#hiddendiv1").toggle();';
        echo '});';
        echo '</script>';

        echo '<script>';
        echo '$("#hiddendiv2").hide();';
        echo '$("button").on("click", function(e){';
        echo 'e.preventDefault();';
        echo '$("#hiddendiv2").toggle();';
        echo '});';
        echo '</script>';

        echo '<script>';
        echo '$("#hiddendiv3").hide();';
        echo '$("button").on("click", function(e){';
        echo 'e.preventDefault();';
        echo '$("#hiddendiv3").toggle();';
        echo '});';
        echo '</script>';
    }
}