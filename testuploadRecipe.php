<?php
	require('header.php')
?>

<!DOCTYPE html>
<main class="main_content">
<html>
	<head>
		<title>Test Formular</title>
		<meta charset="utf8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
		<form action="includes/upload.inc.php" method = "post">
		<h1>Test Formular</h1>

		<p>
			<label for="name" class="upload-text">Rezeptname:
				<input type="text" id="name" name="rezeptname" placeholder="z.B. Bananenbrot" class="input-rezeptname__feld"><br />
			</label>
		<p>

		<p>
			<label for="des" class="upload-text">Beschreibung:
				<input type="text" id="des" name="rezeptdescr" placeholder="z.B. glutenfreies und leckeres Rezept" class="input-rezeptname__feld"><br />
			</label>
		</p>
		
		<p>
			<label for="cat" class="upload-text">Kategorie:
				<select class="input-rezeptname__feld" name="kategorie" size="1">
					<option value="vorspeise">Vorspeise</option>
					<option value="hauptspeise">Hauptspeise</option>
					<option value="dessert">Dessert</option>
				</select>
		</p>

		<p>
			<label for="pers" class="upload-text">Portionen: für
				<input class="input-rezeptname__feld" id="pers" type="number" name="portionen" min="1" max="10" step="1" value="2" size="2">Personen<br />
			</label>
		</p>

        
        <!-- Bereich für Zutaten und Mengenangabe -->
		<p>
			<label for="zut" class="upload-text">Zutaten und Mengenangaben:<br />
			Zutat

            <!-- Zutat 1 -->
            <div class="row">
                <div class="col-lg-1">
                    Zutat 1: 
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Zutat" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Menge" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Einheit" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-1">
                    <input type="button" value="+" onclick="showZutatEingabe('z2'); return false">
                    
                </div>   
            </div>

            <!-- Zutat 2 -->

            <div class="row"  style="display:none" id="z2">
                <div class="col-lg-1">
                    Zutat 2: 
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Zutat" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Menge" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Einheit" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-1">
                <input type="button" value="+" onclick="showZutatEingabe('z3'); return false">
                <input type="button" value="-" onclick="hideZutatEingabe('z2'); return false">
                    
                </div>   
            </div>
            
            <!-- Zutat 3 -->
            <div class="row"  style="display:none" id="z3">
                <div class="col-lg-1">
                    Zutat 3: 
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Zutat" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Menge" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Einheit" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-1">
                    <input type="button" value="+" onclick="showZutatEingabe('z4'); return false">
                </div>   
            </div>

             <!-- Zutat 4 -->
             <div class="row"  style="display:none" id="z4">
                <div class="col-lg-1">
                    Zutat 4: 
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Zutat" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Menge" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Einheit" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-1">
                    <input type="button" value="+" onclick="showZutatEingabe('z5'); return false">
                </div>   
            </div>

                <!-- Zutat 5 -->
                <div class="row"  style="display:none" id="z5">
                <div class="col-lg-1">
                    Zutat 5: 
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Zutat" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Menge" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-3">
                    <input type="text" id="name" name="rezeptname" placeholder="Einheit" class="input-rezeptname__feld">
                </div>
                <div class="col-lg-1">
                    <input type="button" value="+" onclick="showZutatEingabe('z2'); return false">
                </div>   
            </div>
            
           


			</label>
		</p>

		<p>
            <label for="zut" class="upload-text">Zubereitungsschritte:<br />
			



			Schritt
			<input type="button" value="hinzufügen" onClick="add_field2();">
			<input type="button" value="löschen" onClick="delete_field2();">



			</label>

		</p>

		<p>
			<label class="upload-text">Schwierigkeitsgrad:</label><br />

			<input type="radio" id="ei" name="Schwierigkeitsgrad" value="einfach">
			<label for="ei"> einfach</label>
			<input type="radio" id="mi" name="Schwierigkeitsgrad" value="mittel">
			<label for="mi"> mittel</label>
			<input type="radio" id="schw" name="Schwierigkeitsgrad" value="schwer">
			<label for="schw">  schwer</label><br />
		</p>
		
		

		<p>
			<label for="time" class="upload-text">Zubereitungsdauer:
				<input class="input-rezeptname__feld" size="2" id="time" type="number" name="dauer" min="0" step="1" value="0">min<br />
			</label>
		</p>

		<p>
			<!-- <form action="manage_uploads.php" method="post" enctype="multipart/form-data"> -->
			<label class="upload-text">Bilder hochladen:</label>
			<input name="datei" type="file" multiple><br/>
			
			<!--	<button>hochladen</button>
			</form> -->
		</p>

		<p>
			<button class="login-button__btn" type="submit" name="rezept-upload">Rezept hochladen</button>
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

        <script src="main.js"></script>

	</body>
</html>
</main>

<?php
	require('footer.php')
?>
