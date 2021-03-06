<?php
$dbx = mysqli_connect("localhost", "root", "", "nico");

$sqlx = "SELECT * FROM arbeitszeit";
$sql = mysqli_query($dbx, $sqlx);

$nr = mysqli_num_rows($sql);

if (isset($_GET['pn'])) {
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);
//    $pn = ereg_replace("[^0-9]", "", $_GET['pn']);
} else {
    $pn = 1;
}
$itemsPerPage = 10;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1) {
    $pn = 1;
} else {
    if ($pn > $lastPage) {
        $pn = $lastPage;
    }
}
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . '/show' . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else {
    if ($pn == $lastPage) {
        $centerPages .= '&nbsp; <a href="' . '/show' . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
        $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    } else {
        if ($pn > 2 && $pn < ($lastPage - 1)) {
            $centerPages .= '&nbsp; <a href="' . '/show' . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
            $centerPages .= '&nbsp; <a href="' . '/show' . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
            $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
            $centerPages .= '&nbsp; <a href="' . '/show' . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
            $centerPages .= '&nbsp; <a href="' . '/show' . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
        } else {
            if ($pn > 1 && $pn < $lastPage) {
                $centerPages .= '&nbsp; <a href="' . '/show' . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
                $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
                $centerPages .= '&nbsp; <a href="' . '/show' . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
            }
        }
    }
}
$limit = 'LIMIT ' . ($pn - 1) * $itemsPerPage . ',' . $itemsPerPage;
$sqly = "SELECT * from arbeitszeit ORDER BY Id DESC $limit";

$sql2 = mysqli_query($dbx, $sqly);

$paginationDisplay = "";

if ($lastPage != "1") {
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage . '&nbsp;  &nbsp;  &nbsp; ';

    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .= '&nbsp;  <a href="' . '/show' . '?pn=' . $previous . '"> Back</a> ';
    }

    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';

    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .= '&nbsp;  <a href="' . '/show' . '?pn=' . $nextPage . '"> Next</a> ';
    }
}


echo "<table border='3' style='text-align: center; border-color:black; background-color:yellowgreen' width='50%';><tr style='font-weight: bold; color:darkslategrey;'><td width='2%'>ID</td><td width='2%'>KW</td><td width='3%'>Datum</td><td width='5%'>Startzeit</td><td width='5%'>Pause</td><td width='3%'>Feierabend?</td><td width='3%'>Feierabend!</td><td width='3%'>Länger/Kürzer</td></tr>";

while ($row = mysqli_fetch_array($sql2)) {

    $jetzt = mktime($row['Stundestart'], $row['Minutestart'], 0, 0, 0, 0);
    $ergebnis = $jetzt + (8 * 3600) + ($row['Pause'] * 60);

    echo "<tr><td>" . $row['Id'] . "</td><td>" . $row['KW'] . '</td><td>' . $row['Datum'] . '</td><td>' . $row['Stundestart'] . ":" . $row['Minutestart'] . " Uhr</td><td>" . $row['Pause'] . " Minuten</td><td>" . date("H:i",
            $ergebnis) . ' Uhr</td><td>' . $row['Stundeende'] . ":" . $row['Minuteende'] . " Uhr</td><td>" . $row['Overtime'] . " Minuten</td></tr>";
}
echo "</table>";

?>

<div style="margin-left:64px; margin-right:64px;">
    <h2>Einträge insgesamt: <?php echo $nr; ?></h2>
</div>
<div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;">
    <?php echo $paginationDisplay; ?></div>