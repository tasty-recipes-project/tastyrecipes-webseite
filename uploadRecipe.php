<?php
	require('header.php')
?>

<!DOCTYPE html>
<main class="main_content">
<html>
	<head>
		<title>Rezept hochladen</title>
		<meta charset="utf8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="container-uploadRecipe">
			<form action="includes/upload.inc.php" method = "post" enctype="multipart/form-data">
			<h1>Rezept hochladen</h1>
		<div class="row color">
		<div class = "col-lg-12 eingabe-rezeptname">
			<label for="name" class="upload-text">Rezeptname:
				<input type="text" id="name" name="rezeptname" size="130" placeholder="z.B. Bananenbrot" class="input-rezeptname__feld"><br />
			</label>
		</div>
		</div>
		<div class = "eingabe-beschreibung">
			<label for="des" class="upload-text">Beschreibung:
				<textarea id="des" name="rezeptdescr" cols="130" rows="4" placeholder="z.B. glutenfreies und leckeres Rezept" class="input-rezeptname__feld"></textarea><br />
			</label>
		</div>
		
		<div class = "eingabe-kategorie">
			<label for="cat" class="upload-text">Kategorie:
				<select class="select-kategorie" name="kategorie" size="1">
					<option value="vorspeise">Vorspeise</option>
					<option value="hauptspeise">Hauptspeise</option>
					<option value="dessert">Dessert</option>
				</select>
		</div>

		<div class = "eingabe-portionen">
			<label for="pers" class="upload-text">Portionen: für
				<input class="input-rezeptname__feld" id="pers" type="number" name="portionen" min="1" max="10" step="1" value="2" size="2">Personen<br />
			</label>
		</div>

		<div class = "eingabe-zutaten">
			<label for="zut" class="upload-text">Zutaten und Mengenangaben:</label></br>
			
			<label>
			<details open="">
				<summary>Zutat 1</summary>
				<p>	
					<div class="input-zutat2">
					<div class="Zutat" style="float:left">
                    <input type="text" name="zutat1" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge1"  placeholder="Menge"  class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit1"  placeholder="Einheit"  class="input-zutat">
					</div>
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 2</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat2" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge2" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit2" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 3</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat3" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge3" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit3" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 4</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat4" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge4" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit4" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 5</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat5" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge5" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit5" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 6</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat6" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge6" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit6" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 7</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat7" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge7" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit7" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 8</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat8" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge8" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit8" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 9</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat9" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge9" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit9" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Zutat 10</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="zutat10" placeholder="Zutat" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="menge10" placeholder="Menge" class="input-zutat">
					</div>
					 <div style="float:left">
                    <input type="text" name="einheit10" placeholder="Einheit" class="input-zutat">
					</div>
				</p>
			</details>
			</label>
		</div>
		
		<div class = "eingabe-schritte">
			<label for="step" class="upload-text">Schritte:</label></br>
			
			<label>
			<details open="">
				<summary>Schritt 1</summary>
				<p>
                    <input type="text" name="schritt1" class="input-rezeptname__feld">
				</p>
			</details>
			
			<details>
				<summary>Schritt 2</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt2" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Schritt 3</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt3" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Schritt 4</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt4" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Schritt 5</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt5" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Schritt 6</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt6" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Schritt 7</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt7" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Schritt 8</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt8" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Schritt 9</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt9" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			
			<details>
				<summary>Schritt 10</summary>
				<p>
					<div style="float:left">
                    <input type="text" name="schritt10" class="input-rezeptname__feld">
					</div>
				</p>
			</details>
			</label>
		</div>
			
		<div class = "eingabe-schwierigkeitsgrad">
			<label class="upload-text">Schwierigkeitsgrad:</label><br />

			<input type="radio" id="ei" name="Schwierigkeitsgrad" value="einfach">
			<label for="ei"> einfach</label>
			<input type="radio" id="mi" name="Schwierigkeitsgrad" value="mittel">
			<label for="mi"> mittel</label>
			<input type="radio" id="schw" name="Schwierigkeitsgrad" value="schwer">
			<label for="schw">  schwer</label><br />
		</div>

		<div class = "eingabe-dauer">
			<label for="time" class="upload-text">Zubereitungsdauer:
				<input class="input-rezeptname__feld" size="2" id="time" type="number" name="dauer" min="0" step="1" value="0">min<br />
			</label>
		</div>

		<div class = "eingabe-bild">
			<!-- <form action="manage_uploads.php" method="post" enctype="multipart/form-data"> -->
			<label class="upload-text">Bilder hochladen:</label>
			<input id="image" name="image" type="file"><br/>
			
			<!--	<button>hochladen</button>
			</form> -->
		</div>

		<div class = "submit-button">
			<button class="login-button__btn" type="submit" name="rezept-upload">Rezept hochladen</button>
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

	</body>
</html>
</main>

<?php
	require('footer.php')
?>