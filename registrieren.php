<?php
    require('header.php')
?>

<main class="main_content">

    <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo '<p class="anmeldeFehler">Bitte fülle alle Felder aus!</p>';
            }
            else if($_GET['error'] == "invalidmail") {
                echo '<p class="anmeldeFehler">Ungültige Emailadresse!</p>';
            }
            else if($_GET['error'] == "emptyfields") {
                echo '<p class="anmeldeFehler">Bitte fülle alle Felder aus!</p>';
            }
            else if($_GET['error'] == "emptyfields") {
                echo '<p class="anmeldeFehler">Bitte fülle alle Felder aus!</p>';
            }
            else if($_GET['error'] == "emptyfields") {
                echo '<p class="anmeldeFehler">Bitte fülle alle Felder aus!</p>';
            }
        }

        else if($_GET['registrieren'] == "erfolgreich") {
            echo '<p class="erfolgreicheAnmeldung">Du hast dich Erfolgreich registriert</p>';
        }
    ?>
    <h1>Registrieren</h1>
    <form action="includes/registrieren.inc.php" method="post">
        <p><input type="text" name="username" placeholder="Benutzername" required></p>
        <p><input type="email" name="email" placeholder="Email" required></p>
        <p><input type="password" name="pwd" placeholder="Passwort" required></p>
        <p><input type="password" name="pwd-repeat" placeholder="Repeat password" required></p>
        <p><button type="submit" name="registrieren-submit">Jetzt Registrieren</button>
        <a href="index.php">Zur Startseite</a></p>
    </form>
</main>

<?php
    require('footer.php')
?>
