
<!-- Datei für den Aufbau der Datenbankverbindung -->

<?php
    //BenutzerDB
     $servername="localhost";
     $dBUsername = "root";
     $dBPassword = "root";
     $dBName = "tastyrecipes";

     $con = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

     if (!$con) {
         die("Verbindung Fehlgeschlagen" .mysqli_connect_error());
     }
