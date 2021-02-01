<?php

if(isset($_POST['registrieren-submit'])) {
    //Einbinden der Datenbankverbindung
    require 'dbc.inc.php';

    //hole die Information aus der registrieren.php

    $benutzername = $_POST['username'];
    $email = $_POST['email'];
    $passwort = $_POST['pwd'];
    $passwortWdh = $_POST['pwd-repeat'];

    //nachfolgend ist ein wenig errorHandling Code

    if(empty($benutzername) || empty($email) || empty($passwort) || empty($passwortWdh)) {
            header("Location: ../registrieren.php?error=emptyfields&username=".$benutzername."&mail=".$email);
            exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $benutzername)) {
            header("Location: ../registrieren.php?error=invalidmailuid&username=");
            exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../registrieren.php?error=invalidmail&username=".$benutzername);
            exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $benutzername)) {
        header("Location: ../registrieren.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if($passwort !== $passwortWdh) {
        header("Location: ../registrieren.php?error=passwordcheck&uid=".$benutzername."&mail=".$email);
        exit();
    }

    else {
        $sql = "SELECT BenutzerId FROM benutzer WHERE BenutzerId=?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../registrieren.php?error=sqlerror");
            exit();
        }
    else {
        mysqli_stmt_bind_param($stmt, "s", $benutzername);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows();
        if($resultCheck > 0) {
            header("Location: ../registrieren.php?error=benutzervergeben&mail=".$email);
            exit();
        }
        else {
            $sql = "INSERT INTO benutzer (BenutzerName, BenutzerEmail, BenutzerPasswort) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../registrieren.php?error=sqlerror");
                exit();
            }
            else {

                $hashedPasswort = password_hash($passwort, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sss", $benutzername, $email, $hashedPasswort);
                mysqli_stmt_execute($stmt);
                header("Location: ../registrieren.php?registrieren=erfolgreich");
                exit();
            }
        }
    }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}

else {
    header("Location: ../registrieren.php");
    exit();
}

?>
