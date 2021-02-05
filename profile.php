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

    <main class="main_content">
      <div class="row">
        <div class="col-lg-12">
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
                      <h3>Allgemeine Daten</h3>
                      <br>
                      <div class="myData-left">
                        <label class="myData">Benutzername:</label>
                        <br>
                        <label class="myData">E-Mail:</label>
                        <br>
                        <br>
                        <br>
                        <br>
                        <button class="delete-btn" type="button" name="button" onclick="window.location.href='profile.php?profile=edit-pw'">Passwort ändern</button>
                      </div>
                      <div class="myData-right">
                        <?php
                          //aktiv wenn Benutzername geändert werden soll
                          if (isset($_GET['user'])) {
                            ?>
                            <label>
                              <form class="myData-edit" action="includes/edit.inc.php?userID=<?php echo $userID ?>&user=edit" method="post">
                                <input type="text" name="username_neu" placeholder="Benutzername">
                                <button class="delete-btn" type="submit" name="speichern">speichern</button>
                                <button class="delete-btn" type="button" name="cancel" onclick="window.location.href='profile.php?profile=MeineDaten'">abbrechen</button>
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
                                <input type="text" name="email_neu" placeholder="E-Mail">
                                <button class="delete-btn" type="submit" name="speichern">speichern</button>
                                <button class="delete-btn" type="button" name="cancel" onclick="window.location.href='profile.php?profile=MeineDaten'">abbrechen</button>
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
                            <br>
                            <br>
                            <form class="delete-user" action="profile.php?profile=delete-user" method="post">
                              <button class="delete-btn" type="submit" name="delete-user_btn">Benutzer löschen</button>
                            </form>
                            <?php
                          }
                        ?>
                      </div>
                    <?php
                  }
                  elseif ($_GET['profile'] == "MeineRezepte") {
                    ?>
                    <h3>Meine Rezepte</h3>
                    <br>
                    <?php
                      require('includes/dbc.inc.php');

                      //Daten aus Datenbank ziehen
                      $sql = "SELECT * FROM rezepte WHERE BenutzerName = '$_SESSION[nameBenutzer]'";
                      $stmt = mysqli_stmt_init($con);
                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                          header("Location: ../profile.php?error=sqlerror");
                          exit();
                      } else {
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $result = mysqli_stmt_num_rows($stmt);
                        //Abfrage ob Rezepte gefunden wurden
                        if ($result < 1) {
                          //Ausgabe wenn Benutzer keine Rezepte hochgeladen hat
                          ?>
                          <label class="myData">
                            Sie haben noch kein Rezept erstellt. <br>
                            Wollen Sie jetzt ein <a class="myData_upload" href="uploadRecipe.php">Rezept hochladen</a>?
                          </label>
                          <?php
                        } else {
                          //Rezepte werden ausgegeben
                          $ersteller = mysqli_query($con, "SELECT * FROM rezepte WHERE BenutzerName = '$_SESSION[nameBenutzer]'")
                              or die("Fehler: " . mysqli_error($con));

                          while ($row = mysqli_fetch_array($ersteller)) {
                            ?>
                              <div class="recipe-container">
                                <table class="myRecipes">
                                  <tr class="myRecipes-row">
                                    <th> <h3> <a class="show_recipe" href="rezept.php?rezept=<?php echo $row['RezeptId'] ?>"><?php echo $row['RezeptName'] ?></a></h3> </th>
                                    <th></th>
                                    <th><input type="button" class="myRecipes-btn" name="edit_recipe" value="zum Rezept" onclick="window.location.href='rezept.php?rezept=<?php echo $row['RezeptId'] ?>'"></th>
                                  </tr>
                                  <tr class="myRecipes-row">
                                    <td class="myRecipes-data_left"> <img src="includes/uploads/<?php echo $row['Bild'] ?>" alt="" style="width:250px; height:200px;"> </td>
                                    <td class="myRecipes-data_middle">
                                      <div class="myRecipes-data_middle-top">
                                        <h4>Beschreibung:</h4>
                                        <label class="myData"><?php echo $row['Beschreibung'] ?></label>
                                        <br><br>
                                      </div>
                                      <div class="myRecipes-data_middle-bottom">
                                        <div class="myRecipes-attr">
                                          <h6><i class="fas fa-signal"></i> <?php echo $row['Schwierigkeit'] ?></h6>
                                        </div>
                                        <div class="myRecipes-attr">
                                          <h6><i class='fas fa-pizza-slice'></i> <?php echo $row['Kategorie'] ?></h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="myRecipes-data_right">
                                      <input type="button" class="myRecipes-btn" name="edit_recipe" value="bearbeiten" onclick="window.location.href='Rezept-bearbeiten.php?rezeptID=<?php echo $row['RezeptId'] ?>'">
                                      <br><br>
                                      <input type="button" class="myRecipes-btn" name="edit_recipe" value="löschen" onclick="window.location.href='includes/edit.inc.php?rezeptID=<?php echo $row['RezeptId'] ?>&rezept=delete'">
                                    </td>
                                  </tr>
                                </table>
                              </div>
                            <?php
                          }
                        }
                      }


                    ?><?php
                  }
                  elseif ($_GET['profile'] == "Lieblingsrezepte") {
                    ?>
                    <h3>Meine Lieblingsrezepte</h3>
                    <br>
                    <?php
                    //Daten aus Datenbank ziehen
                    $sql = "SELECT * FROM favoriten WHERE BenutzerName = '$_SESSION[nameBenutzer]'";
                    $stmt = mysqli_stmt_init($con);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../profile.php?error=sqlerror");
                        exit();
                    } else {
                      mysqli_stmt_execute($stmt);
                      mysqli_stmt_store_result($stmt);
                      $result = mysqli_stmt_num_rows($stmt);
                      //Abfrage ob Rezepte gefunden wurden
                      if ($result < 1) {
                        //Ausgabe wenn Benutzer keine Rezepte hochgeladen hat
                        ?>
                        <label class="myData">
                          Sie haben noch keine  Lieblingsrezepte. <br>
                        </label>
                        <?php
                      } else {
                        //RezeptIDs aus Favoriten Danbank laden
                        $favorites = mysqli_query($con, "SELECT * FROM favoriten WHERE BenutzerName = '$_SESSION[nameBenutzer]'")
                            or die("Fehler: " . mysqli_error($con));

                        while ($id = mysqli_fetch_array($favorites)) {
                          $rezeptID = $id['RezeptId'];
                          //Daten aus Rezeptdatenbank ziehen
                          $ersteller = mysqli_query($con, "SELECT * FROM rezepte WHERE RezeptId = '$rezeptID'")
                              or die("Fehler: " . mysqli_error($con));

                          while ($row = mysqli_fetch_array($ersteller)) {
                            ?>
                              <div class="recipe-container">
                                <table class="myRecipes">
                                  <tr class="myRecipes-row">
                                    <th> <h3><?php echo $row['RezeptName'] ?></h3> </th>
                                    <th></th>
                                    <th><input type="button" class="myRecipes-btn" name="edit_recipe" value="zum Rezept" onclick="window.location.href='rezept.php?rezept=<?php echo $row['RezeptId'] ?>'"></th>
                                  </tr>
                                  <tr class="myRecipes-row">
                                    <td class="myRecipes-data_left"> <img src="includes/uploads/<?php echo $row['Bild'] ?>" alt="" style="width:250px; height:200px;"> </td>
                                    <td class="myRecipes-data_middle">
                                      <div class="myRecipes-data_middle-top">
                                        <h4>Beschreibung:</h4>
                                        <label class="myData"><?php echo $row['Beschreibung'] ?></label>
                                        <br><br>
                                      </div>
                                      <div class="myRecipes-data_middle-bottom">
                                        <div class="myRecipes-attr">
                                          <h6><i class="fas fa-signal"></i> <?php echo $row['Schwierigkeit'] ?></h6>
                                        </div>
                                        <div class="myRecipes-attr">
                                          <h6><i class='fas fa-pizza-slice'></i> <?php echo $row['Kategorie'] ?></h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="myRecipes-data_right">
                                      <input type="button" class="myRecipes-btn" name="edit_recipe" value="entfernen" onclick="window.location.href='includes/addFav.inc.php?rezeptID=<?php echo $row['RezeptId'] ?>&fav=del&src=p'">
                                    </td>
                                  </tr>
                                </table>
                              </div>
                            <?php
                          }
                        }
                      }
                    }
                  }
                  elseif ($_GET['profile'] == "edit-pw") {
                    //UserID aus Datenbank abrufen
                    $sql = "SELECT BenutzerId FROM benutzer WHERE BenutzerName = '$_SESSION[nameBenutzer]'";
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
                      }
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($con);

                    ?>
                    <h3>Passwort ändern</h3>
                    <br>
                    <form class="edit-pw_form" action="includes/edit.inc.php?userID=<?php echo $userID ?>&pw=edit" method="post">
                      <input type="password" name="pw_old" placeholder="Altes Kennwort" required>
                      <input type="password" name="pw_neu" placeholder="Neues Kennwort" required>
                      <input type="password" name="pw_wdh" placeholder="Kennwort wiederholen" required>
                      <button class="delete-btn" type="submit" name="speichern">Passwort ändern</button>
                      <button class="delete-btn" type="button" name="cancel_btn" onclick="window.location.href='profile.php?profile=MeineDaten'">zurück</button>
                    </form>
                    <br>
                    <br>
                    <label class="myData_error">
                      <?php
                        if (isset($_GET['error'])) {
                          if ($_GET['error'] == "invalidpw") {
                            echo "Passwort ist falsch";
                          }
                          elseif ($_GET['error'] == "invalidwdh") {
                            echo "Passwörter stimmen nicht überein";
                          }
                        }
                      ?>
                    </label>
                    <?php
                  } elseif ($_GET['profile'] == "delete-user") {
                    //UserID aus Datenbank abrufen
                    $sql = "SELECT BenutzerId FROM benutzer WHERE BenutzerName = '$_SESSION[nameBenutzer]'";
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
                      }
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($con);

                    //Benutzer wirklich löschen
                    ?>
                    <h3>Benutzer löschen</h3>
                    <br>
                    <label class="myData">
                      Möchten Sie den Benutzer wirklich löschen?
                    </label>
                    <br><br>
                    <form class="delete-user" action="includes/edit.inc.php?userID=<?php echo $userID ?>&user=delete" method="post">
                      <button class="delete-btn" type="submit" name="button">löschen</button>
                      <button class="delete-btn" type="button" name="button" onclick="window.location.href='profile.php?profile=MeineDaten'">abbrechen</button>
                    </form>
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

      </div>
    </main>

    <?php
      require('footer.php');
    ?>
  </body>
</html>
