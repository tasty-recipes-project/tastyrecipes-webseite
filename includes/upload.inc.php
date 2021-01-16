<?php

  session_start();

  //Rezepte in die Datenbank speichern

  if (isset($_POST['rezept-upload'])) {
    //Einbinden der Datenbankverbindung
    require 'dbc.inc.php';


    //Informationen aus Formular laden
    $benutzername = $_SESSION['nameBenutzer'];
    $rezeptname = $_POST['rezeptname'];
    $rezeptdescr = $_POST['rezeptdescr'];
    $portionen = $_POST['portionen'];
    $zutat = $_POST['zutat1'];
    $schritt = $_POST['schritt1'];
    $difficulty = $_POST['Schwierigkeitsgrad'];
    $dauer = $_POST['dauer'];
    $rezeptBild = $_POST['datei'];

    //Fehlerbehandlung wenn ein Feld nicht ausgefüllt ist
    if (empty($rezeptname) || empty($difficulty) || empty($dauer)) {
      header("Location: ../uploadRecipe.php?error=emptyfields");
      exit();

    } else {

      //Eintrag in die Datenbank

      $sql = "INSERT INTO rezepte (BenutzerName, RezeptName, Beschreibung, PortionenAnzahl, Zutat, Schritt, Schwierigkeit, Dauer, Bild, Datum) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../uploadRecipe.php?error=sqlerror");
          exit();

      } else {

        mysqli_stmt_bind_param($stmt, "sssssssss", $benutzername, $rezeptname, $rezeptdescr, $portionen, $zutat, $schritt, $difficulty, $dauer, $rezeptBild);
        mysqli_stmt_execute($stmt);
        header("Location: ../uploadRecipe.php");
        exit();

      }
    }
    //Datenbankverbindung schließen
    mysqli_stmt_close($stmt);
    mysqli_close($con);

  }

?>
