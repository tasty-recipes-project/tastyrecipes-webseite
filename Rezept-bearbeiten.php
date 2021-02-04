<?php
  require('header.php');
  require('includes/dbc.inc.php');
?>

<?php
  //RezeptID aus URL holen
  if (isset($_GET['rezeptID'])) {
    $rezeptID = $_GET['rezeptID'];
  } else {
    //es wurde keine RezeptID übergeben
  }

  //Auslesen der Daten aus den Datenbanken
  //Datenbank rezepte
  $rezept = mysqli_query($con, "SELECT * FROM rezepte WHERE RezeptId = '$rezeptID'")
      or die("Fehler: " . mysqli_error($con));
  $row = mysqli_fetch_array($rezept);

  //Datenbank zutaten
    //vielleicht zu einem späteren Zeitpunkt änderbar

  //Datenbank steps
    //vielleicht zu einem späteren Zeitpunkt änderbar

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rezept bearbeiten | TastyRecipes</title>
    <link rel="icon" href="images/logo_tastyrecipes.jpg">
  </head>

  <body>
    <div class="main_content">
      <div class="container-uploadRecipe">
  			<form action="includes/edit.inc.php?rezeptID=<?php echo $rezeptID ?>&rezept=edit" method = "post" enctype="multipart/form-data">
  			<h1>Rezept bearbeiten</h1>
  		<div class="row color">
  		<div class = "col-lg-12 eingabe-rezeptname">
  			<label for="name" class="upload-text">Rezeptname:
  				<input type="text" id="name" name="rezeptname" size="130" value="<?php echo $row['RezeptName'] ?>" class="input-rezeptname__feld"><br>
  			</label>
  		</div>
  		</div>
  		<div class = "eingabe-beschreibung">
  			<label for="des" class="upload-text">Beschreibung:
  				<textarea id="des" name="rezeptdescr" cols="130" rows="4" value="<?php echo $row['Beschreibung'] ?>" class="input-rezeptname__feld"></textarea><br>
  			</label>
  		</div>

  		<div class = "eingabe-kategorie">
  			<label for="cat" class="upload-text">Kategorie:</br>
  				<select class="select-kategorie" name="kategorie" size="1">
  					<option value="vorspeise">Vorspeise</option>
  					<option value="hauptspeise">Hauptspeise</option>
  					<option value="dessert">Dessert</option>
  				</select>
  		</div>

  		<div class = "eingabe-portionen2">
  			<label for="pers" class="upload-text">Portionen:</br>
  				<label class = "eingabe-portionen">dieses Rezept ist für<br>
  				<input class="input-rezeptname__feld" id="pers" type="number" name="portionen" min="1" max="10" step="1" value="<?php echo $row['PortionenAnzahl'] ?>" size="2"><br> Personen<br>
  				</label>
  				</label>
  		</div>

  		<div class = "eingabe-schwierigkeitsgrad">
  			<label class="upload-text">Schwierigkeitsgrad:</label><br />

  			<input type="radio" id="ei" name="Schwierigkeitsgrad" value="einfach">
  			<label for="ei"> einfach</label>
  			<input type="radio" id="mi" name="Schwierigkeitsgrad" value="mittel">
  			<label for="mi"> mittel</label>
  			<input type="radio" id="schw" name="Schwierigkeitsgrad" value="schwer">
  			<label for="schw"> schwer</label><br />
  		</div>

  		<div class = "eingabe-dauer">
  			<label for="time" class="upload-text">Zubereitungsdauer:</br>
  				<label class = "eingabe-portionen">
  				<input class="input-rezeptname__feld" size="1" id="time" type="number" name="dauer" min="0" step="1" value="<?php echo $row['Dauer'] ?>">min<br />
  				</label>
  			</label>
  		</div>

  		<div class = "eingabe-bild">
  			<!-- <form action="manage_uploads.php" method="post" enctype="multipart/form-data"> -->
  			<label class="upload-text">Bild ändern:</label></br>
  			<input id="image" name="image" type="file"><br/>

  			<!--	<button>hochladen</button>
  			</form> -->
  		</div></br>

  		<div class = "submit-button">
  			<button class="login-button__btn" type="submit" name="rezept-upload">Rezept bearbeiten</button>
  		</div>
  		</form>
  	</div>

  		<?php
  			//Errorhandling vom Upload Formular
  			if (isset($_GET['error'])) {
  				if ($_GET['error'] == "emptyfields") {
  					echo '<p class="uploadFehler">Bitte fülle alle Felder aus!</p>';
  				} else if ($_GET['error'] == "sqlerror") {
  					echo '<p class="uploadFehler">Ups.. Da ist wohl etwas schiefgelaufen!</p>';
  				}
  			}
  		?>
    </div>
  </body>
</html>

<?php
  require('footer.php');
?>
