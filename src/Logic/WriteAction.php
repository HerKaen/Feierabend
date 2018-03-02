<?php

namespace feierabend\Logic;

echo '<br><center>';

require "Formulare/Navigation.html";

require "Formulare/Formular.html";


class WriteAction
{

    public function __invoke()
    {
        if (isset($_POST["stunde"]) && ($_POST["minute"]) && ($_POST["pause"])) {

            $stunde = $_POST["stunde"];
            $minute = $_POST["minute"];
            $pause = $_POST["pause"];
            $timestamp = time();
            $datum = date("d.m.Y",$timestamp);
            $datum2 = date("Y-m-d", $timestamp);
            $kw = $this->WelcheKw($datum2);

            $db = mysqli_connect("localhost", "root", "", "nico");

            $eintrag = "INSERT INTO arbeitszeit (Datum, Stunde, Minute, Pause, KW) VALUES ('$datum', '$stunde', '$minute', '$pause', '$kw')";

            $eintragen = mysqli_query($db, $eintrag);

            mysqli_close($db);
        }
    }

    /**
     * @param $datum2
     * @return int
     */
    private function WelcheKw($datum2): int
    {
        if ($datum2 >= '2018-01-01' && $datum2 <= '2018-01-07') {
            $kw = 1;
            return $kw;
        }
        if ($datum2 >= '2018-01-08' && $datum2 <= '2018-01-14') {
            $kw = 2;
            return $kw;
        }
        if ($datum2 >= '2018-01-15' && $datum2 <= '2018-01-21') {
            $kw = 3;
            return $kw;
        }
        if ($datum2 >= '2018-01-22' && $datum2 <= '2018-01-28') {
            $kw = 4;
            return $kw;
        }
        if ($datum2 >= '2018-01-29' && $datum2 <= '2018-02-04') {
            $kw = 5;
            return $kw;
        }
        if ($datum2 >= '2018-02-05' && $datum2 <= '2018-02-11') {
            $kw = 6;
            return $kw;
        }
        if ($datum2 >= '2018-02-12' && $datum2 <= '2018-02-18') {
            $kw = 7;
            return $kw;
        }
        if ($datum2 >= '2018-02-19' && $datum2 <= '2018-02-25') {
            $kw = 8;
            return $kw;
        }
        if ($datum2 >= '2018-02-26' && $datum2 <= '2018-03-04') {
            $kw = 9;
            return $kw;
        }
        if ($datum2 >= '2018-03-05' && $datum2 <= '2018-03-11') {
            $kw = 10;
            return $kw;
        }
        if ($datum2 >= '2018-03-12' && $datum2 <= '2018-03-18') {
            $kw = 11;
            return $kw;
        }
        if ($datum2 >= '19.03.2018' && $datum2 <= '25.03.2018') {
            $kw = 12;
            return $kw;
        }
        if ($datum2 >= '26.03.2018' && $datum2 <= '01.04.2018') {
            $kw = 13;
            return $kw;
        }
        if ($datum2 >= '02.04.2018' && $datum2 <= '08.04.2018') {
            $kw = 14;
            return $kw;
        }
        if ($datum2 >= '09.04.2018' && $datum2 <= '15.04.2018') {
            $kw = 15;
            return $kw;
        }
        if ($datum2 >= '16.04.2018' && $datum2 <= '22.04.2018') {
            $kw = 16;
            return $kw;
        }
        if ($datum2 >= '23.04.2018' && $datum2 <= '29.04.2018') {
            $kw = 17;
            return $kw;
        }
        if ($datum2 >= '30.04.2018' && $datum2 <= '06.05.2018') {
            $kw = 18;
            return $kw;
        }
        if ($datum2 >= '07.05.2018' && $datum2 <= '13.05.2018') {
            $kw = 19;
            return $kw;
        }
        if ($datum2 >= '14.05.2018' && $datum2 <= '20.05.2018') {
            $kw = 20;
            return $kw;
        }
        if ($datum2 >= '21.05.2018' && $datum2 <= '27.05.2018') {
            $kw = 21;
            return $kw;
        }
        if ($datum2 >= '28.05.2018' && $datum2 <= '03.06.2018') {
            $kw = 22;
            return $kw;
        }
        if ($datum2 >= '04.06.2018' && $datum2 <= '10.06.2018') {
            $kw = 23;
            return $kw;
        }
        if ($datum2 >= '11.06.2018' && $datum2 <= '17.06.2018') {
            $kw = 24;
            return $kw;
        }
        if ($datum2 >= '18.06.2018' && $datum2 <= '24.06.2018') {
            $kw = 25;
            return $kw;
        }
        if ($datum2 >= '25.06.2018' && $datum2 <= '01.07.2018') {
            $kw = 26;
            return $kw;
        }
        if ($datum2 >= '02.07.2018' && $datum2 <= '08.07.2018') {
            $kw = 27;
            return $kw;
        }
        if ($datum2 >= '09.07.2018' && $datum2 <= '15.07.2018') {
            $kw = 28;
            return $kw;
        }
        if ($datum2 >= '16.07.2018' && $datum2 <= '22.07.2018') {
            $kw = 29;
            return $kw;
        }
        if ($datum2 >= '23.07.2018' && $datum2 <= '29.07.2018') {
            $kw = 30;
            return $kw;
        }
        if ($datum2 >= '30.07.2018' && $datum2 <= '05.08.2018') {
            $kw = 31;
            return $kw;
        }
        if ($datum2 >= '06.08.2018' && $datum2 <= '12.08.2018') {
            $kw = 32;
            return $kw;
        }
        if ($datum2 >= '13.08.2018' && $datum2 <= '19.08.2018') {
            $kw = 33;
            return $kw;
        }
        if ($datum2 >= '20.08.2018' && $datum2 <= '26.08.2018') {
            $kw = 34;
            return $kw;
        }
        if ($datum2 >= '27.08.2018' && $datum2 <= '02.09.2018') {
            $kw = 35;
            return $kw;
        }
        if ($datum2 >= '03.09.2018' && $datum2 <= '09.09.2018') {
            $kw = 36;
            return $kw;
        }
        if ($datum2 >= '10.09.2018' && $datum2 <= '16.09.2018') {
            $kw = 37;
            return $kw;
        }
        if ($datum2 >= '17.09.2018' && $datum2 <= '23.09.2018') {
            $kw = 38;
            return $kw;
        }
        if ($datum2 >= '24.09.2018' && $datum2 <= '30.09.2018') {
            $kw = 39;
            return $kw;
        }
        if ($datum2 >= '01.10.2018' && $datum2 <= '07.10.2018') {
            $kw = 40;
            return $kw;
        }
        if ($datum2 >= '08.10.2018' && $datum2 <= '14.10.2018') {
            $kw = 41;
            return $kw;
        }
        if ($datum2 >= '15.10.2018' && $datum2 <= '21.10.2018') {
            $kw = 42;
            return $kw;
        }
        if ($datum2 >= '22.10.2018' && $datum2 <= '28.10.2018') {
            $kw = 43;
            return $kw;
        }
        if ($datum2 >= '29.10.2018' && $datum2 <= '04.11.2018') {
            $kw = 44;
            return $kw;
        }
        if ($datum2 >= '05.11.2018' && $datum2 <= '11.11.2018') {
            $kw = 45;
            return $kw;
        }
        if ($datum2 >= '12.11.2018' && $datum2 <= '18.11.2018') {
            $kw = 46;
            return $kw;
        }
        if ($datum2 >= '19.11.2018' && $datum2 <= '25.11.2018') {
            $kw = 47;
            return $kw;
        }
        if ($datum2 >= '26.11.2018' && $datum2 <= '02.12.2018') {
            $kw = 48;
            return $kw;
        }
        if ($datum2 >= '03.12.2018' && $datum2 <= '09.12.2018') {
            $kw = 49;
            return $kw;
        }
        if ($datum2 >= '10.12.2018' && $datum2 <= '16.12.2018') {
            $kw = 50;
            return $kw;
        }
        if ($datum2 >= '17.12.2018' && $datum2 <= '23.12.2018') {
            $kw = 51;
            return $kw;
        }
        if ($datum2 >= '24.12.2018' && $datum2 <= '30.12.2018') {
            $kw = 52;
            return $kw;
        }
    }
}
