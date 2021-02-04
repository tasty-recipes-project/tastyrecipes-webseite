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
    $difficulty = $_POST['Schwierigkeitsgrad'];
    $dauer = $_POST['dauer'];
    $rezeptBild = $_FILES['image']['name'];
    $kategorie = $_POST['kategorie'];

    //Bilddatei in Ordner verschieben
    $target = "uploads/".basename($_FILES['image']['name']);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

        $nachricht = "Das Bild wurde erfolgreich hochgeladen";

    } else {
        $nachricht = "Ein Problem ist aufgetreten";
    }


	$schritt1 = $_POST['schritt1'];
	$schritt2 = $_POST['schritt2'];
	$schritt3 = $_POST['schritt3'];
	$schritt4 = $_POST['schritt4'];
	$schritt5 = $_POST['schritt5'];
	$schritt6 = $_POST['schritt6'];
	$schritt7 = $_POST['schritt7'];
	$schritt8 = $_POST['schritt8'];
	$schritt9 = $_POST['schritt9'];
	$schritt10 = $_POST['schritt10'];

	$Zutat1 = $_POST['zutat1'];
	$Zutat2 = $_POST['zutat2'];
	$Zutat3 = $_POST['zutat3'];
	$Zutat4 = $_POST['zutat4'];
	$Zutat5 = $_POST['zutat5'];
	$Zutat6 = $_POST['zutat6'];
	$Zutat7 = $_POST['zutat7'];
	$Zutat8 = $_POST['zutat8'];
	$Zutat9 = $_POST['zutat9'];
	$Zutat10 = $_POST['zutat10'];

	$Menge1 = $_POST['menge1'];
	$Menge2 = $_POST['menge2'];
	$Menge3 = $_POST['menge3'];
	$Menge4 = $_POST['menge4'];
	$Menge5 = $_POST['menge5'];
	$Menge6 = $_POST['menge6'];
	$Menge7 = $_POST['menge7'];
	$Menge8 = $_POST['menge8'];
	$Menge9 = $_POST['menge9'];
	$Menge10 = $_POST['menge10'];

	$Einheit1 = $_POST['einheit1'];
	$Einheit2 = $_POST['einheit2'];
	$Einheit3 = $_POST['einheit3'];
	$Einheit4 = $_POST['einheit4'];
	$Einheit5 = $_POST['einheit5'];
	$Einheit6 = $_POST['einheit6'];
	$Einheit7 = $_POST['einheit7'];
	$Einheit8 = $_POST['einheit8'];
	$Einheit9 = $_POST['einheit9'];
	$Einheit10 = $_POST['einheit10'];


    //Fehlerbehandlung wenn ein Feld nicht ausgefüllt ist
    if (empty($rezeptname) || empty($difficulty) || empty($dauer)) {
      header("Location: ../uploadRecipe.php?error=emptyfields");
      exit();

    } else {

      //Eintrag in die Datenbank Rezepte

      $sql = "INSERT INTO rezepte (BenutzerName, RezeptName, Beschreibung, PortionenAnzahl, Schwierigkeit, Dauer, Bild, Kategorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../uploadRecipe.php?error=sqlerror");
        exit();

      } else {

        mysqli_stmt_bind_param($stmt, "ssssssss", $benutzername, $rezeptname, $rezeptdescr, $portionen, $difficulty, $dauer, $rezeptBild, $kategorie);
        mysqli_stmt_execute($stmt);

      }
	  // Eintrag Datenbank Schritte
	  $sql = "INSERT INTO steps (Schritt1, Schritt2, Schritt3, Schritt4, Schritt5, Schritt6, Schritt7, Schritt8, Schritt9, Schritt10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	  $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../uploadRecipe.php?error=sqlerror");
        exit();

      } else {

        mysqli_stmt_bind_param($stmt, "ssssssssss", $schritt1, $schritt2, $schritt3, $schritt4, $schritt5, $schritt6, $schritt7, $schritt8, $schritt9, $schritt10);
        mysqli_stmt_execute($stmt);

      }
	  // Eintrag Datenbank Zutaten
	  $sql = "INSERT INTO zutaten (Zutat1, Zutat2, Zutat3, Zutat4, Zutat5, Zutat6, Zutat7, Zutat8, Zutat9, Zutat10, Menge1, Menge2, Menge3, Menge4, Menge5, Menge6, Menge7, Menge8, Menge9, Menge10, Einheit1, Einheit2, Einheit3, Einheit4, Einheit5, Einheit6, Einheit7, Einheit8, Einheit9, Einheit10 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	  $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../uploadRecipe.php?error=sqlerror");
        exit();

      } else {

        mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssss", $Zutat1, $Zutat2, $Zutat3, $Zutat4, $Zutat5, $Zutat6, $Zutat7, $Zutat8, $Zutat9, $Zutat10, $Menge1, $Menge2, $Menge3, $Menge4, $Menge5, $Menge6, $Menge7, $Menge8, $Menge9, $Menge10, $Einheit1, $Einheit2, $Einheit3, $Einheit4, $Einheit5, $Einheit6, $Einheit7, $Einheit8, $Einheit9, $Einheit10);
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
