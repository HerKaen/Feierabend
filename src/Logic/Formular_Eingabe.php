<title>Rechner</title>

<link rel=stylesheet type="text/css" href="/styles.css">

<form action="" method="POST">
    Stunde <input type="text" name="stunde" size="20" style="padding-left:15px;"> <br><br>
    Minute <input type="text" name="minute" size="20" style="padding-left:15px;"> <br><br>

    <div style="padding-left:50px;">
        <input type="radio" name="pause" value="0"/>0 Minuten
        <input type="radio" name="pause" value="30" checked="checked"/>30 Minuten
        <input type="radio" name="pause" value="45"/>45 Minuten <br><br>
    </div>

    <!--    Überstunden <input type="text" name="overtime" size="20"> <br><br>-->

    <input type="submit" value="Berechnen" width="50px">
</form>


<br><br>

<button id="myButton" class="float-left submit-button">Auflistung</button>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "/show";
    };
</script>
