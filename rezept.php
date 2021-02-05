<?php
	require('header.php');
    require('includes/dbc.inc.php');
    $rezeptId = $_GET["rezept"];

	//Hole Informationen aus Tabelle Rezepte
    $ersteller = mysqli_query($con, "SELECT * FROM rezepte WHERE RezeptId = '$rezeptId'")
        or die("Fehler: " . mysqli_error($con));
        $row = mysqli_fetch_array($ersteller);
	
	//Hole Informationen aus Tabelle Bewertung
	$bewertung = mysqli_query($con, "SELECT * FROM bewertung WHERE RezeptId = '$rezeptId'")
        or die("Fehler: " . mysqli_error($con));
        $row2 = mysqli_fetch_array($bewertung);
			
		$bewertung2 = mysqli_query($con, "SELECT BewertungDurchschnitt FROM bewertung WHERE RezeptId = '$rezeptId'")
        or die("Fehler: " . mysqli_error($con));
        $row3 = mysqli_fetch_row($bewertung2); 
		
		$row3[0] = (float)$row3[0];
		
?>

<!-- Ausgabebereich für Rezepte --> 
<!DOCTYPE html>
<html>

	<head>
		<title>Rezept anzeigen</title>
		<meta charset="utf8" />
	</head>
	<body>
		<main class="main_content_rezept">
		<div class="rezept_Info">
		<div class="rezept_header">

	
			<h1><?php echo $row['RezeptName'] ?></h1> <h2>von  <?php echo $row['BenutzerName'] ?> </h2>
			<?php echo ("Beschreibung: " . $row['Beschreibung']) ?></br>
			<?php echo ("Durchschnittsbewertung: " . round($row3[0], 2))?></br>
			<?php echo ("Dieses Rezept hat aktuell " . $row2['AnzahlBewertung'] . " Bewertungen")?></br>
			<?php echo "<img  src='includes/uploads/" .$row['Bild']."'>"; ?>

        </div>
        <div class="rezept-inhalt">
					<?php
						//Überprüfen ob Benutzer angemeldet
						if (!isset($_SESSION['nameBenutzer'])) {
							//Option für Wunschliste ausblenden
							?>
							<form action="includes/addFav.inc.php?rezeptID=<?php echo $rezeptId ?>&fav=add&src=r" method="post">
									<i class='fas fa-pizza-slice'></i> <?php echo $row['Kategorie'] ?> &nbsp;
									<i class="far fa-clock"></i> <?php echo $row['Dauer'] ?> min &nbsp;
									<i class="fas fa-signal"></i> <?php echo $row['Schwierigkeit'] ?>&nbsp;
									</br>
							</form>
							<?php
						} else {
							//Option mit Wunschliste anzeigen
							//Überprüfen ob Rezept bereits zu Lieblingsrezepten hinzugefügt wurde
							$sql = "SELECT * FROM favoriten WHERE BenutzerName = '$_SESSION[nameBenutzer]' AND RezeptId = '$rezeptId'";
							$stmt = mysqli_stmt_init($con);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
									//header("Location: ../profile.php?error=sqlerror");
									exit();
							} else {
								mysqli_stmt_execute($stmt);
								mysqli_stmt_store_result($stmt);
								$result = mysqli_stmt_num_rows($stmt);

								if ($result < 1) {
									//Rezept ist nicht zu Lieblingsrezepten hinzugefügt
									//Option anzeigen zu Lieblingsrezepten hinzufügen
									?>
									<form action="includes/addFav.inc.php?rezeptID=<?php echo $rezeptId ?>&fav=add&src=r" method="post">
							        <i class='fas fa-pizza-slice'></i> <?php echo $row['Kategorie'] ?> &nbsp;
											<i class="far fa-clock"></i> <?php echo $row['Dauer'] ?> min &nbsp;
											<i class="fas fa-signal"></i> <?php echo $row['Schwierigkeit'] ?>&nbsp;

											<!--Rezept zu Lieblingsrezepten hinzufügen -->

											<button type="submit" name="like-submit" class="like-btn"><i class="far fa-heart"></i> <span class="fav-recipe">zu Lieblingsrezepten hinzufügen</span> </button></br>
									</form>
									<?php
								} else {
									//Rezept ist zu Lieblingsrezepten hinzugefügt
									//Option anzeigen  aus Lieblingsrezepten entfernen
									?>
									<form action="includes/addFav.inc.php?rezeptID=<?php echo $rezeptId ?>&fav=del&src=r" method="post">
							        <i class='fas fa-pizza-slice'></i> <?php echo $row['Kategorie'] ?> &nbsp;
											<i class="far fa-clock"></i> <?php echo $row['Dauer'] ?> min &nbsp;
											<i class="fas fa-signal"></i> <?php echo $row['Schwierigkeit'] ?>&nbsp;

											<!--Rezept zu Lieblingsrezepten hinzufügen -->

											<button type="submit" name="like-submit" class="like-btn"><i class="fas fa-heart"></i> <span class="fav-recipe">aus Lieblingsrezepten entfernen</span> </button></br>
									</form>
									<?php
								}
							}
						}
					?>

        </div></br>
		<!--Ausgabe Zutaten -->
		<div class="ausgabe-zutatenliste">
		<div class="row">
			<p>Dieses Rezept ist ausgelegt für <span id="ausgangsMenge"><?php echo $row['PortionenAnzahl'] ?></span> Personen</p>
		</div>
		<div class="row">

		<h2>Zutaten für <span id="neueMenge"><?php echo $row['PortionenAnzahl'] ?></span> Personen jetzt berechnen</h2>
		</div>
		<div class="row">
			<span class="button_rechner"><button class="btn btn-success"  id="down">-</button></span>
			<span class="button_rechner"><button class="btn btn-success"  id="up">+</button></span>
		</div>
			<?php
				$zutaten = mysqli_query($con, "SELECT * FROM zutaten WHERE RezeptId = '$rezeptId'")
					or die("Fehler: " . mysqli_error($con));

					$row2 = mysqli_fetch_array($zutaten);
					echo ('<table>');
					// prüfen, ob Feld leer und diese nicht ausgeben
					$count = 1;
					for ($count; $count <= 10; $count++){
						if (empty($row2["Zutat{$count}"])) {
							break;
						} else {

							echo ('<tr>');

							echo('<td class="menge">' . $row2["Menge{$count}"] . '</td>');
							echo('<td>' . $row2["Einheit{$count}"] . '</td>');
							echo('<td>' . $row2["Zutat{$count}"] . '</td>');

							echo('</tr>');


						}
				}
				echo ('</table>');
			?>

		<!--Ausgabe Schritte -->
		</div></br>
		<div class = "ausgabe-schritte">
		<h2>Schritte:</br></h2>
			<?php
				$steps = mysqli_query($con, "SELECT * FROM steps WHERE RezeptId = '$rezeptId'")
					or die("Fehler: " . mysqli_error($con));
				$row3 = mysqli_fetch_array($steps);

				//prüfen, ab wann Schritte leer, dann break
				$count = 1;
				for ($count; $count <= 10; $count++){
					if (empty($row3["Schritt{$count}"])) {
						break;
					} else {
						echo "$count.";
						echo " ";
						echo($row3["Schritt{$count}"]);
						echo "<br />";
					}
				}
			?>
		</div>
		</div>

		<!-- Rezept Bewertung -->
		<hr>

		<!-- Rezept Bewertung Header mit Buttons -->
		<div class="row">
			<div class="col-lg-6">
				<button class="btn btn-success" id="rezept-bewertung">Zur Rezeptbewertung</button><br>
			</div>
			<div class="col-lg-6">
				<button class="btn btn-success" onclick="window.print()">Rezept Drucken</button><br>
			</div>
		</div>

		<!-- Rezept Bewertung Content mit dem entsprechenden Formular -->
		<div class="row">
			<div class="col-lg-6 hide" id="div-bewertung">
			<form  action="includes/bewertung.inc.php" method="post" class="login_area">
          <div class="welcome">
            <strong>Bewerte dein Rezept</strong>
          </div>
          <div class="input-rezeptId">
            <input class="input-username__feld" type="text" name="rezept_id" value="<?php echo $row['RezeptId'] ?> " required>
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
			<div class="col-lg-6">
				<!-- Aktuell Leerer Bereich -->
			</div>
		</div>
		</div>
		<script src="main.js"></script>
		</main>
    </body>

</html>

<?php
    require('footer.php');
?>
