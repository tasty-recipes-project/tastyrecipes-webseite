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
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="icon" href="images/logo_tastyrecipes.jpg">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" charset="utf-8"></script>
    </head>
    <body>

    <!-- Header Bereich: Besteht aus Logo, Nav-Bar und Login Bereich -->
        <div class="container">


        <!-- Erste Reihe im Header -->

        <div class="row header-top">

        <!-- Erste Spalte für das Logo -->
            <div class="col-lg-6 col-md-12 col-xs-12 navbar-logo">
                <a class="website-name" href="index.php"><img src="images/logo_tastyrecipes.jpg" height="50px" width="50px">  Tasty<span style="color: green">Recipes</span></a>
            </div>

        <!-- Zweite Spalte für das Suchfeld -->

            <div class="col-lg-6 col-md-12 col-xs-12 search-col">
              <form action="suchen.php" method="post" class="search-container">
                <div class="search-button">
                  <button type="submit" name="search-submit" class="search-button__btn"><i class="fas fa-search"></i></button>
                </div>
                <div class="input-select">
                  <select class="search-select" name="search-select">
                    <option value="Vorspeise">Vorspeisen</option>
                    <option value="Hauptspeise">Hauptspeisen</option>
                    <option value="Dessert">Desserts</option>
                  </select>
                </div>
                <div class="input-search">
                  <input type="text" name="search" placeholder="Suchen.." size="40" class="input-search__feld">
                </div>
              </form>
            </div>




        </div>


        <!-- Zweite Reihe im Header für Navigationsmenu und Loginbereich -->
        <div class="row navmenu">
          <!-- erste Spalte für Navigationsmenu -->
              <nav class="navbar">
                  <ul class="menu">
                      <li class="menu-li"><a class="menu-li-a" href="index.php">Startseite</a></li>
                      <li class="dropdown"><a href="#" class="dropbtn">Rezepte <i class="fas fa-angle-down"></i></a>
                          <div class="dropdown-content">
                              <a class="dropdowncontent-a" href="alleRezepte.php">Alle Rezepte</a>
                              <a class="dropdowncontent-a" href="vorspeisen.php">Vorspeisen</a>
                              <a class="dropdowncontent-a" href="hauptspeisen.php">Hauptgerichte</a>
                              <a class="dropdowncontent-a" href="desserts.php">Desserts</a>
                          </div>
                      </li>
                      <li class="menu-li"><a class="menu-li-a" href="aboutUs.php">Über uns</a></li>
                      <li class="menu-li"><a class="menu-li-a" href="#">Kontakt</a></li>
                      <?php
                          if (isset($_SESSION['nameBenutzer'])) {
                            ?>
                            <li class="userdropdown"><a href="#" class="usrdropbtn"><?php echo 'Hallo ' .$_SESSION['nameBenutzer'] .'   <i class="fas fa-angle-down"></i>'; ?></a>
                                <div class="userdropdown-content">
                                    <a class="menu-li-a" href="profile.php?profile=MeineDaten">Mein Profil</a>
                                    <a class="menu-li-a" href="meineRezepte.php">Meine Rezepte</a>
                                    <a class="menu-li-a" href="#">Lieblingsrezepte</a>
                                    <a class="menu-li-a" href="uploadRecipe.php">Rezept hochladen</a>
                                    <a class="menu-li-a" href="bewertung.php">Rezept bewerten</a>
                                    <a class="menu-li-a" href="includes/logout.inc.php">Logout</a>
                                </div>
                            </li>
                            <?php
                          } else {
                            ?>
                            <li class="menu-li" style="float: right"><a class="menu-li-a" href="login.php"><i class="fas fa-user"></i> Login</a></li>
                            <?php
                          }
                          ?>
                  </ul>
              </nav>
        </div>
      </body>
