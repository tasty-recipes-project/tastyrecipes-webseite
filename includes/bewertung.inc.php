<?php

  session_start();

  //Bewertung in die Datenbank speichern

  if (isset($_POST['bewertung-abgeben'])) {
    //Einbinden der Datenbankverbindung
    require 'dbc.inc.php';




    //Informationen aus Formular laden

    $rezeptid = $_POST['rezept_id'];
    $note = $_POST['bewertungnote'];


    $res = mysqli_query($con, "SELECT * FROM bewertung WHERE RezeptId = '$rezeptid'");
    $num = mysqli_num_rows($res);

    if ($num > 0) {
      while ($row = mysqli_fetch_array($res)) {
        $anzahlbewertung = $row["AnzahlBewertung"];
        $noteGesamt = $row['BewertungNoteGesamt'];
      }

      $anzahlbewertung++;
      $noteGesamt += $note;
      $noteDurchschnitt = $noteGesamt / $anzahlbewertung;


      $sql = "UPDATE bewertung SET BewertungNote = '$note', AnzahlBewertung = '$anzahlbewertung', BewertungNoteGesamt = '$noteGesamt', BewertungDurchschnitt = '$noteDurchschnitt' WHERE RezeptId = '$rezeptid'";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../rezept.php?error=sqlerror");
        exit();

      } else {
        mysqli_stmt_execute($stmt);
        header("Location: ../rezept.php?rezept=$rezeptid");
        exit();
      }
      //Schliessen der Datenbankverbindung
      mysqli_stmt_close($stmt);
      mysqli_close($con);
  } else if ($num == 0) {
    $anzahlbewertung = 1;
    $note;
    $noteDurchschnitt = $note;
    $sql = "INSERT INTO bewertung (RezeptId, AnzahlBewertung, BewertungNote, BewertungNoteGesamt, BewertungDurchschnitt) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../rezept.php?error=sqlerror");
      exit();

    } else {

      mysqli_stmt_bind_param($stmt, "iiidi", $rezeptid, $anzahlbewertung, $note, $note, $note);
      mysqli_stmt_execute($stmt);
      header("Location: ../rezept.php?rezept=$rezeptid");

      exit();
    }
     //Schliessen der Datenbankverbindung
     mysqli_stmt_close($stmt);
     mysqli_close($con);

  }
  }


?>
