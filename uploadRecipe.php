<?php
	require('header.php')
?>

<!DOCTYPE html>
<main class="main_content">
<html>
	<head>
		<title>Rezept hochladen</title>
		<meta charset="utf8" />
	</head>
	<body>
		<form action="includes/upload.inc.php" method = "post">
		<h1>Rezept hochladen</h1>

		<p>
			<label for="name">Rezeptname:
				<input type="text" id="name" name="rezeptname" size="80"><br />
			</label>
		</p>

		<p>
			<label for="des">Beschreibung:
				<input type="text" id="des" name="rezeptdescr"><br />
			</label>
		</p>

		<p>
			<label for="pers">Portionen: für
				<input id="pers" type="number" name="portionen" min="1" max="10" step="1" value="2">Personen<br />
			</label>
		</p>

		<p>
			<label for="zut">Zutaten und Mengenangaben:<br />
			<div id="dynamic_input2"></div>
			<script>
				var feld2 = 0;
				var feldm2 = 0;

				function add_field2() {
					if (feld2 <= 9) {
						feld2++;
						document.getElementById('dynamic_input2').innerHTML = "";
						for (var zaehler = 1; zaehler <= feld2; zaehler++) {
							var label = "Zutat " + zaehler;
							var inhalt = document.getElementById("speicher2" + zaehler).value;
							document.getElementById('dynamic_input2').innerHTML +=
							"<label>" + label + ": <input type='text' name='zutat" + feld2 + "' value='" + inhalt +
							"' onInput='speicher2(this.value, \"" + feld2 + "\")'></label><br>";
						}
					}
				}

				function delete_field2() {
					if (feld2 >= feldm2) {
						feld2--;
						document.getElementById('dynamic_input2').innerHTML = "";
						for (var zaehler = 1; zaehler <= feld2; zaehler++) {
							var label = "Schritt " + zaehler;
							var inhalt = document.getElementById("speicher2" + zaehler).value;
							document.getElementById('dynamic_input2').innerHTML +=
							"<label>" + label + ": <input type='text' name='zutat" + feld2 + "' value='" + inhalt +
							"' onInput='speicher2(this.value, \"" + feld2 + "\")'></label><br>";
						}
					}
				}

				function speicher2(inhalt, feld2) {
					document.getElementById("speicher2" + feld2).value = inhalt;
				}
			</script>



			Zutat
			<input type="button" value="hinzufügen" onClick="add_field2();">
			<input type="button" value="löschen" onClick="delete_field2();">

			<!-- Speicher -->
			<input type="hidden" id="speicher21">
			<input type="hidden" id="speicher22">
			<input type="hidden" id="speicher23">
			<input type="hidden" id="speicher24">
			<input type="hidden" id="speicher25">
			<input type="hidden" id="speicher26">
			<input type="hidden" id="speicher27">
			<input type="hidden" id="speicher28">
			<input type="hidden" id="speicher29">
			<input type="hidden" id="speicher210"><br />

			</label>
		</p>

		<p>
			<label for="step">Schritte:
			<script>
				var feld = 0;
				var feldm = 0;

				function add_field() {
					if (feld <= 9) {
						feld++;
						document.getElementById('dynamic_input').innerHTML = "";
						for (var zaehler = 1; zaehler <= feld; zaehler++) {
							var label = "Schritt " + zaehler;
							var inhalt = document.getElementById("speicher" + zaehler).value;
							document.getElementById('dynamic_input').innerHTML +=
							"<label>" + label + ": <input type='text' name='schritt" + feld + "' value='" + inhalt +
							"' onInput='speicher(this.value, \"" + feld + "\")'></label><br>";
						}
					}
				}

				function delete_field() {
					if (feld >= feldm) {
						feld--;
						document.getElementById('dynamic_input').innerHTML = "";
						for (var zaehler = 1; zaehler <= feld; zaehler++) {
							var label = "Schritt " + zaehler;
							var inhalt = document.getElementById("speicher" + zaehler).value;
							document.getElementById('dynamic_input').innerHTML +=
							"<label>" + label + ": <input type='text' name='schritt" + feld + "' value='" + inhalt +
							"' onInput='speicher(this.value, \"" + feld + "\")'></label><br>";
						}
					}
				}

				function speicher(inhalt, feld) {
					document.getElementById("speicher" + feld).value = inhalt;
				}
			</script>

			<div id="dynamic_input"></div>
			Schritt
			<input type="button" value="hinzufügen" onClick="add_field();">
			<input type="button" value="löschen" onClick="delete_field();">

			<!-- Speicher -->
			<input type="hidden" id="speicher1">
			<input type="hidden" id="speicher2">
			<input type="hidden" id="speicher3">
			<input type="hidden" id="speicher4">
			<input type="hidden" id="speicher5">
			<input type="hidden" id="speicher6">
			<input type="hidden" id="speicher7">
			<input type="hidden" id="speicher8">
			<input type="hidden" id="speicher9">
			<input type="hidden" id="speicher10"><br />

			</label>
		</p>

		<p>
			Schwierigkeitsgrad:<br />

			<input type="radio" id="ei" name="Schwierigkeitsgrad" value="einfach">
			<label for="ei"> einfach</label>
			<input type="radio" id="mi" name="Schwierigkeitsgrad" value="mittel">
			<label for="mi"> mittel</label>
			<input type="radio" id="schw" name="Schwierigkeitsgrad" value="schwer">
			<label for="schw">  schwer</label><br />
		</p>

		<p>
			<label for="time">Zubereitungsdauer:
				<input id="time" type="number" name="dauer" min="0" step="1" value="0">min<br />
			</label>
		</p>

		<p>
			<!-- <form action="manage_uploads.php" method="post" enctype="multipart/form-data"> -->
			<label>Bilder hochladen:
			<input name="datei" type="file" multiple><br/>
			</label>
			<!--	<button>hochladen</button>
			</form> -->
		</p>

		<p>
			<button type="submit" name="rezept-upload">Rezept hochladen</button>
		</p>
		</form>

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
