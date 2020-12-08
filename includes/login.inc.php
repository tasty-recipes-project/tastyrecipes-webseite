<?php

if(isset($_POST['login-submit'])) {
        require 'dbc.inc.php';

        $mailuid = $_POST['username'];
        $passwort = $_POST['passwort'];

        if(empty($mailuid) || empty($passwort)) {
            header("Location: ../index.php?error=emptyfields");
            exit();
        }
        else {
            $sql = "SELECT * FROM benutzer WHERE BenutzerName=? OR BenutzerEmail=?";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $passwortCheck = password_verify($passwort, $row['BenutzerPasswort']);
                    if ($passwortCheck == false) {
                        header("Location: ../index.php?error=falschesPasswort");
                        exit();
                    }
                    else if ($passwortCheck == true) {
                        session_start();
                        $_SESSION['IdBenutzer'] = $row['BenutzerId'];
                        $_SESSION['nameBenutzer'] = $row['BenutzerName'];

                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    else {
                        header("Location: ../index.php?error=falschesPasswort");
                        exit();
                    }

                }
                else {
                    header("Location: ../index.php?error=keinBenutzer");
                    exit();
                }
            }
        }
}

else {
    header("Location: ../index.php");
    exit();
}