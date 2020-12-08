
<!-- Datei für den Aufbau der Datenbankverbindung -->

<?php

     $servername="localhost";
     $dBUsername = "root";
     $dBPassword = "";
     $dBName = "loginsystem";

     $con = mysqli_connect($servernam, $dBUsername, $dBPassword, $dBName);

     if (!$con) {
         die("Verbindung Fehlgeschlagen" .mysqli_connect_error());
     }