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
    </head>
    <body>
        <div class="container-fluid">
        <div class="row logo">
        <div class="col-lg-2">
            <img src="images/logo_tastyrecipes.jpg" height="100px" width="100px">
        </div>
        <div class="col-lg-5">
        <header>
            <nav>
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
                    <li><a href="#">Über uns</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
            </nav>
        </header>
        </div>
        <div class="col-lg-5">

        <?php
        if (isset($_SESSION['nameBenutzer'])) {
            echo    '<form action="includes/logout.inc.php" method="post" class="login_area">
                    <button type="submit" name="logout-submit">Logout</button>
                    </form>';
        }
        else {
            echo    '<form action="includes/login.inc.php" method="post" class="login_area">
                    <input type="text" name="username" placeholder="Name/Emailadresse">
                    <input type="password" name="passwort" placeholder="Passwort">
                    <button type="submit" name="login-submit">Login</button>
                    </form>
                    <p>Noch kein Konto? Dann aber fix <a href="registrieren.php">Registrieren</a></p>';
            }
        ?>

        </div>
        </div>
        <div class="row">
                <div class="col-lg-12 header_image">
                    <img src="images/header_kochbar1600x300.jpeg">
                </div>
        </div>
