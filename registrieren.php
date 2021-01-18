<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrieren | TastyRecipes</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" charset="utf-8"></script>
  </head>

  <body class="register">
    <div class="register-content">
      <div class="login-logo">
        <a class="website-name" href="index.php"><img src="images/logo_tastyrecipes.jpg" height="50px" width="50px">  Tasty<span style="color: green">Recipes</span></a>
      </div>

      <div class="register-formular">
        <form class="register-area" action="includes/registrieren.inc.php" method="post">
          <div class="welcome">
            <strong>Willkommen bei TastyRecipes!</strong>
          </div>
          <div class="register-username">
            <input class="register-username__feld" type="text" name="username" placeholder="Benutzername" required>
          </div>
          <div class="register-mail">
            <input class="register-mail__feld" type="email" name="email" placeholder="E-Mail" required>
          </div>
          <div class="register-pwd">
            <input class="register-pwd__feld"type="password" name="pwd" placeholder="Passwort" required>
          </div>
          <div class="register-pwd-wdh">
            <input class="register-pwd-wdh__feld" type="password" name="pwd-repeat" placeholder="Passwort wiederholen" required>
          </div>
          <div class="register-button">
            <button class="register-button__btn" type="submit" name="registrieren-submit">Registrieren</button>
          </div>
          <div class="login-link">
            <strong>
              Du bist bereits Mitglied?
              <br>
              <a href="login.php" class="login-link__link">Anmelden</a>
            </strong>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
