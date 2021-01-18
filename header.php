<?php
    session_start();
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>TastyRecipes</title>
        <link rel="stylesheet" href="styles.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" charset="utf-8"></script>
    </head>
    <body>

    <!-- Header Bereich: Besteht aus Logo, Nav-Bar und Login Bereich -->
        <div class="container">

        <!-- Erste Reihe im Front-End -->

        <div class="row">

        <!-- Erste Spalte für das Logo -->
            <div class="col-lg-1 col-md-12 col-xs-12 navbar-logo">
                <img src="images/logo_tastyrecipes.jpg" height="100px" width="100px">
            </div>
        <!-- Zweite Spalte für die Seitennavigation -->
            <div class="col-lg-6 col-md-12 col-xs-12">
                <nav class="navbar">
                    <ul class="menu">
                        <li><a href="index.php">Startseite</a></li>
                        <li class="dropdown"><a href="#" class="dropbtn">Rezepte</a>
                            <div class="dropdown-content">
                                <a href="#">Alle Rezepte</a>
                                <a href="#">Vorspeisen</a>
                                <a href="#">Hauptgerichte</a>
                                <a href="#">Desserts</a>
                            </div>
                        </li>
                        <li><a href="aboutUs.php">Über uns</a></li>
                        <li><a href="#">Kontakt</a></li>
                    </ul>
                </nav>
                </div>


        <!-- Dritte Spalte für die Anzeige des Login-Bereichs -->
            <div class="col-lg-5 col-md-12 col-xs-12">

                <?php
                    if (isset($_SESSION['nameBenutzer'])) {
                        ?>
                        <ul class="usermenu">
                          <li class="userdropdown"><a href="#" class="usrdropbtn"><?php echo 'Hallo ' .$_SESSION['nameBenutzer'] .'   <i class="fas fa-angle-down"></i>'; ?></a>
                              <div class="userdropdown-content">
                                  <a href="#">Mein Profil</a>
                                  <a href="#">Meine Rezepte</a>
                                  <a href="#">Lieblingsrezepte</a>
                                  <a href="uploadRecipe.php">Rezept hochladen</a>
                                  <a href="includes/logout.inc.php">Logout</a>
                              </div>
                          </li>
                        </ul>
                        <?php
                    } else {
                        ?>

                        <form action="includes/login.inc.php" method="post" class="login_area">
                          <input type="text" name="username" placeholder="Name/Emailadresse" required>
                          <input type="password" name="passwort" placeholder="Passwort" required>
                          <button type="submit" name="login-submit">Login</button>
                        </form>
                        <p class="registrieren">Noch kein Konto? Dann aber fix <a href="registrieren.php">Registrieren</a></p>
                        <?php
                    }
                    ?>

            </div>
        </div>

        <!-- Ende Navigations Header -->

        <!-- Zweite Reihe im Frontend, bleget durch das Header Bild -->
        <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <img src="images/headerimg3.jpg" style="width:100%">
                </div>
        </div>
