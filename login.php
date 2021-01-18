<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login | TastyRecipes</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" charset="utf-8"></script>
  </head>

  <body class="login">
    <div class="login-content">
      <div class="login-logo">
        <a class="website-name" href="index.php"><img src="images/logo_tastyrecipes.jpg" height="50px" width="50px">  Tasty<span style="color: green">Recipes</span></a>
      </div>
      <div class="login-formular">
        <form action="includes/login.inc.php" method="post" class="login_area">
          <div class="welcome">
            <strong>Willkommen bei TastyRecipes</strong>
          </div>
          <div class="input-username">
            <input type="text" name="username" placeholder="Name/Email" required>
          </div>
          <div class="input-password">
            <input type="password" name="passwort" placeholder="Passwort" required>
          </div>
          <div class="login-button">
            <button type="submit" name="login-submit">Login</button>
          </div>
          <strong>
            Noch kein Mitglied?
            <br>
            <a href="registrieren.php" class="">Registrieren</a>
          </strong>
        </form>
      </div>
    </div>
  </body>
</html>
