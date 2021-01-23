<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mein Profil | TastyRecipes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/logo_tastyrecipes.jpg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" charset="utf-8"></script>
  </head>

  <body>
    <?php
      require('header.php');
      require('includes/dbc.inc.php');
    ?>

    <div class="main_content">
      <h2>Mein persönlicher Bereich</h2>
      <div class="profile_container">
        <div class="profile-navmenu" id="profile-navmenu">
          <ul class="profilenavmenu-ul">
            <li class="profilenavmenu-li"><a class="profilenavmenu-li-a" href="profile.php?profile=MeineDaten">Meine Daten</a></li>
            <li class="profilenavmenu-li"><a class="profilenavmenu-li-a" href="profile.php?profile=MeineRezepte">Meine Rezepte</a></li>
            <li class="profilenavmenu-li"><a class="profilenavmenu-li-a" href="profile.php?profile=Lieblingsrezepte">Meine Lieblingsrezepte</a></li>

          </ul>
        </div>
        <div class="profile_content">
          <?php
            if (isset($_GET['profile'])) {
              if ($_GET['profile'] == "MeineDaten") {
                //Datenbankabfrage zum speichern der BenutzerEmail in eine Stringvariable
                $sql = "SELECT BenutzerId, BenutzerEmail FROM benutzer WHERE BenutzerName = '$_SESSION[nameBenutzer]'";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../profile.php?error=sqlerror");
                    exit();
                }
                else {
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  if ($row = mysqli_fetch_assoc($result)) {
                    $userID = $row['BenutzerId'];
                    $email = $row['BenutzerEmail'];
                  }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($con);

                ?>
                  <h4>Allgemeine Daten</h4>
                  <br>
                  <div class="myData-left">
                    <label class="myData">Benutzername:</label>
                    <br>
                    <label class="myData">E-Mail:</label>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button class="pw-reset" type="button" name="button" onclick="window.location.href='profile.php?profile=edit-pw'">Passwort ändern</button>
                  </div>
                  <div class="myData-right">
                    <?php
                      //aktiv wenn Benutzername geändert werden soll
                      if (isset($_GET['user'])) {
                        ?>
                        <label>
                          <form class="myData-edit" action="includes/edit.inc.php?userID=<?php echo $userID ?>&user=edit" method="post">
                            <input type="text" name="username_neu">
                            <button type="submit" name="speichern">speichern</button>
                            <button type="button" name="cancel" onclick="window.location.href='profile.php?profile=MeineDaten'">abbrechen</button>
                          </form>
                        </label>
                        <br>
                        <label class="myData"><?php echo $email; ?></label> <a class="edit" href="profile.php?profile=MeineDaten&mail=<?php echo $userID ?>">ändern</a>
                        <br>
                        <br>
                        <label class="myData_error">
                          <?php
                            if (isset($_GET['error'])) {
                              echo "Benutzername bereits vergeben!";
                            }
                          ?>
                        </label>

                        <?php
                      }
                      //aktiv wenn Email geändert werden soll
                      elseif (isset($_GET['mail'])) {
                        ?>
                        <label class="myData"><?php echo $_SESSION['nameBenutzer']; ?></label> <a class="edit" href="profile.php?profile=MeineDaten&user=<?php echo $userID ?>">ändern</a>
                        <br>
                        <label class="myData">
                          <form class="myData-edit" action="includes/edit.inc.php?userID=<?php echo $userID ?>&mail=edit" method="post">
                            <input type="text" name="email_neu">
                            <button type="submit" name="speichern">speichern</button>
                            <button type="button" name="cancel" onclick="window.location.href='profile.php?profile=MeineDaten'">abbrechen</button>
                          </form>
                        </label>
                        <br>
                        <br>
                        <label class="myData_error">
                          <?php
                            if (isset($_GET['error'])) {
                              echo "E-Mail bereits vergeben!";
                            }
                          ?>
                        </label>
                        <?php
                      }
                      //Standardanzeige
                      else {
                        ?>
                        <label class="myData"><?php echo $_SESSION['nameBenutzer'] ; ?></label> <a class="edit" href="profile.php?profile=MeineDaten&user=<?php echo $userID ?>">ändern</a>
                        <br>
                        <label class="myData"><?php echo $email ; ?></label> <a class="edit" href="profile.php?profile=MeineDaten&mail=<?php echo $userID ?>">ändern</a>
                        <br>
                        <br>
                        <label class="myData_error">
                          <?php
                            if (isset($_GET['edit'])) {
                              if ($_GET['edit'] == "username") {
                                echo "Benutzername wurde erfolgreich geändert";
                              }
                              elseif ($_GET['edit'] == "mail") {
                                echo "E-Mail wurde erfolgreich geändert";
                              }
                              elseif ($_GET['edit'] == "pw") {
                                echo "Passwort wurde erfolgreich geändert";
                              }
                            }
                          ?>
                        </label>
                        <?php
                      }
                    ?>
                  </div>
                <?php
              }
              elseif ($_GET['profile'] == "MeineRezepte") {
                // code...
              }
              elseif ($_GET['profile'] == "Lieblingsrezepte") {
                // code...
              }
              elseif ($_GET['profile'] == "edit-pw") {
                ?>
                <h4>Passwort ändern</h4>
                <br>
                <div class="myData-edit_pw">
                  <form class="edit-pw_form" action="includes/edit.inc.php?userID=<?php echo $userID ?>&pw=edit" method="post">
                    <input type="text" name="pw_old" placeholder="Altes Kennwort" required>
                    <input type="text" name="pw_neu" placeholder="Neues Kennwort" required>
                    <input type="text" name="pw_wdh" placeholder="Kennwort wiederholen" required>
                    <button type="submit" name="button">Passwort ändern</button>
                    <button type="button" name="cancel_btn" onclick="window.location.href='profile.php?profile=MeineDaten'">zurück</button>
                  </form>
                </div>
                <?php
              }
            }
            else {
              ?>



              <?php
            }
          ?>
        </div>
      </div>
    </div>

    <?php
      require('footer.php');
    ?>
  </body>
</html>
