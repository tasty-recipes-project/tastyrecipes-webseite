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
                $sql = "SELECT BenutzerEmail FROM benutzer WHERE BenutzerName = '$_SESSION[nameBenutzer]'";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                }
                else {
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  if ($row = mysqli_fetch_assoc($result)) {
                    $email = $row['BenutzerEmail'];
                  }

                }

                ?>
                  <h4>Allgemeine Daten</h4>
                  <br>
                  <div class="myData-left">
                    <label class="myData">Benutzername:</label>
                    <br>
                    <label class="myData">E-Mail:</label>
                    <br>
                    <br>
                    <button type="submit" name="button">Passwort ändern</button>
                  </div>
                  <div class="myData-middle">
                    <label class="myData"><?php echo '' .$_SESSION['nameBenutzer']; ?></label>
                    <br>
                    <label class="myData"><?php echo '' .$email; ?></label>
                  </div>
                  <div class="myData-right">
                    <label class="myData"><a href="#">ändern</a></label>
                    <br>
                    <label class="myData"><a href="#">ändern</a></label>
                  </div>
                <?php
              }
              elseif ($_GET['profile'] == "MeineRezepte") {
                // code...
              }
              elseif ($_GET['profile'] == "Lieblingsrezepte") {
                // code...
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
