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
        <form action="includes/bewertung.inc.php" method="post" class="login_area">
          <div class="welcome">
            <strong>Bewerte dein Rezept</strong>
          </div>
          <div class="input-rezeptId">
            <input class="input-username__feld" type="text" name="rezept_id" placeholder="RezeptId" required>
          </div>
          <div class="input-rezeptId">
            <input type="radio" id="ei" name="bewertungnote" value="1"> <strong>Sehr gut</strong>
           
          </div>
          <div class="input-rezeptId">
            
            <input type="radio" id="ei" name="bewertungnote" value="2"> <strong>Gut</strong>
           
          </div>
          <div class="input-rezeptId">
            
            <input type="radio" id="ei" name="bewertungnote" value="3"> <strong>Befriedigend</strong>
            
          </div>
          
          <div class="input-rezeptId">
            
          <input type="radio" id="ei" name="bewertungnote" value="4"> <strong>Ausreichend</strong>
            
          </div>
          <div class="input-rezeptId">
            
          <input type="radio" id="ei" name="bewertungnote" value="5"> <strong>Mangelhaft</strong>
          </div>
          <div class="input-rezeptId">
            
          <input type="radio" id="ei" name="bewertungnote" value="6"> <strong>Ungenügend</strong>
            
          </div>
          <div class="login-button">
            <button class="login-button__btn" type="submit" name="bewertung-abgeben">Jetzt bewerten</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>