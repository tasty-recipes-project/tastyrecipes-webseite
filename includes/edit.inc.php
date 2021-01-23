<?php
  //Session starten, damit Variable angepasst werden kann
  session_start();

  //Datenbankverbindung öffnen
  require('dbc.inc.php');

  //Editieren der Daten
  if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];
    if (isset($_GET['user'])) {
      $username_neu = $_POST['username_neu'];

      //Überprüfung ob Username schon vergeben
      $sql = "SELECT BenutzerId FROM benutzer WHERE BenutzerName = '$username_neu'";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
      }
      else {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_num_rows($stmt);
        if ($result > 0) {
          header("Location: ../profile.php?profile=MeineDaten&user=<?php echo $userID ?>&error=invaliduser");
          exit();
        }
        else {
          //Benutzername updaten
          $sql = "UPDATE benutzer SET BenutzerName = '$username_neu' WHERE BenutzerId = '$userID'";
          $stmt = mysqli_stmt_init($con);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
              exit();
          }
          else {
            mysqli_stmt_execute($stmt);

            //Session Variable neu setzen
            $_SESSION['nameBenutzer'] = $username_neu;
          }
          header("Location: ../profile.php?profile=MeineDaten&edit=username");
        }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($con);
    }
    elseif (isset($_GET['mail'])) {
      $mail_neu = $_POST['email_neu'];

      //Überprüfung ob Email bereits vergeben
      $sql = "SELECT BenutzerId FROM benutzer WHERE BenutzerEmail = '$mail_neu'";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
      }
      else {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_num_rows($stmt);
        if ($result > 0) {
          header("Location: ../profile.php?profile=MeineDaten&mail=<?php echo $userID ?>&error=invalidmail");
          exit();
        }
        else {
          //Email updaten
          $sql = "UPDATE benutzer SET BenutzerEmail = '$mail_neu' WHERE BenutzerId = '$userID'";
          $stmt = mysqli_stmt_init($con);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
              exit();
          }
          else {
            mysqli_stmt_execute($stmt);
          }
          header("Location: ../profile.php?profile=MeineDaten&edit=mail");
        }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($con);
    }
    elseif (isset($_GET['pw'])) {
      //Variablen aus Formular laden
      $pw_alt = $_POST['pw_old'];
      $pw_neu = $_POST['pw_neu'];
      $pw_wdh = $_POST['pw_wdh'];

      //altes PW aus Datenbank lesen
      $sql = "SELECT BenutzerPasswort FROM benutzer WHERE BenutzerId = '$userID'";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
      }
      else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          //Passwort abgleichen
          $passwortCheck = password_verify($pw_alt, $row['BenutzerPasswort']);
          if ($passwortCheck == false) {
            //falsches Passwort
            //Fehlerausgabe auf Passwortseite
            header("Location: ../profile.php?profile=edit-pw&error=invalidpw");
          }
          else {
            //Passwort stimmt überein
            //Überprüfung ob neues Kennwort = Wiederholung
            if ($pw_neu == $pw_wdh) {
              //Passwörter stimmen überein
              //Passwort verschlüsseln und in Datenbank speichern
              $hashedPasswort = password_hash($pw_neu, PASSWORD_DEFAULT);
              $sql = "UPDATE benutzer SET BenutzerPasswort = '$hashedPasswort' WHERE BenutzerId = '$userID'";
              $stmt = mysqli_stmt_init($con);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                  exit();
              }
              else {
                mysqli_stmt_execute($stmt);
              }
              //Weiterleitung auf Profilseite
              header("Location: ../profile.php?profile=MeineDaten&edit=pw");
            }
            else {
              //Neue Passwörter stimmen nicht überein
              //Fehlerausgabe auf Passwortseite
              header("Location: ../profile.php?profile=edit-pw&error=invalidwdh");
            }
          }
        }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($con);
    }
  }
?>
