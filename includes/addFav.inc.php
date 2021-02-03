<?php
  //Session starten -> Zugriff auf Benutzername durch Sessionvariable
  session_start();

  //Datenbankverbindung öffnen
  require('dbc.inc.php');

  //RezeptID aus URL ziehen
  if (isset($_GET['rezeptID'])) {
    //Daten in Variablen setzen
    $rezeptID = $_GET['rezeptID'];
    $benutzername = $_SESSION['nameBenutzer'];

    //Abrage was mit Rezept passieren soll
    if (isset($_GET['fav'])) {
      //Rezept soll zu Favoriten hinzugefügt werden
      if ($_GET['fav'] == "add") {
        //Benutzername und RezeptID in Datenbank speichern
        $sql = "INSERT INTO favoriten (BenutzerName, RezeptId) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "ss", $benutzername, $rezeptID);
          mysqli_stmt_execute($stmt);

          header("Location: ../rezept.php?rezept=" .$rezeptID);
        }

        //Datenbankverbindung schließen
        mysqli_stmt_close($stmt);
        mysqli_close($con);

      } elseif ($_GET['fav'] == "del") {
        //Rezept aus Favoriten entfernen
        $sql = "DELETE FROM favoriten WHERE RezeptId = '$rezeptID'";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
        } else {
          mysqli_stmt_execute($stmt);

          if (isset($_GET['src'])) {
            if ($_GET['src'] == "r") {
              //Wenn von Rezeptseite auf entfernen geklickt wurde
              //weiterleiten auf Rezeptseite
              header("Location: ../rezept.php?rezept=" .$rezeptID);
            } elseif ($_GET['src'] == "p") {
              //Wenn von Profilseite auf entfernen geklickt wurde
              //weiterleiten auf Profilseite
              header("Location: ../profile.php?profile=Lieblingsrezepte");
            }
          }

        }

        //Datenbankverbindung schließen
        mysqli_stmt_close($stmt);
        mysqli_close($con);
      }
    }
  }

?>
