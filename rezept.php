<?php
	require('header.php');
    require('includes/dbc.inc.php');
    $rezeptId = $_GET["rezept"];

    $ersteller = mysqli_query($con, "SELECT * FROM rezepte WHERE RezeptId = '$rezeptId'")
        or die("Fehler: " . mysqli_error($con));
        $row = mysqli_fetch_array($ersteller);
            //Ausgabebereich für Rezepte
?>

<!DOCTYPE html>
<main class="main_content_rezept">
<html>
	<head>
		<title>Rezept anzeigen</title>
		<meta charset="utf8" />
	</head>
	<body>
		<div class="rezept_Info">
		<div class="rezept_header">
			<h1><?php echo $row['RezeptName'] ?></h1> <h2>von  <?php echo $row['BenutzerName'] ?> </h2>
			<?php echo "<img  src='includes/uploads/" .$row['Bild']."'>"; ?>
        </div>
        <div class="rezept-inhalt">
		<form action="addFav.php" method="post">
        <i class='fas fa-pizza-slice'></i> <?php echo $row['Kategorie'] ?> &nbsp;
				<i class="far fa-clock"></i> <?php echo $row['Dauer'] ?> min &nbsp;
				<i class="fas fa-signal"></i> <?php echo $row['Schwierigkeit'] ?>&nbsp;

				<!--Rezept zu Lieblingsrezepten hinzufügen -->

				<button type="submit" name="like-submit" class="like-btn"><i class="far fa-heart"></i> <span class="fav-recipe">zu Lieblingsrezepten hinzufügen</span> </button></br>
		</form>
        </div></br>
		<!--Ausgabe Zutaten -->
		<div class="ausgabe-zutatenliste">
		<div class="row">
			<p>Dieses Rezept ist ausgelegt für <span id="ausgangsMenge"><?php echo $row['PortionenAnzahl'] ?></span> Personen</p>
		</div>
		<div class="row">
		
		<h2>Zutaten für <span id="neueMenge"><?php echo $row['PortionenAnzahl'] ?></span> Personen</h2><br />
		<button class="btn-portionen-berechnen"  id="down"> - </button> <br />
		<button class="btn-portionen-berechnen"  id="up"> + </button><br />
		<h2>jetzt berechnen</2>
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
		<div class = "rezept-bewertung">
		<button class="btn btn-success">Zur Rezeptbewertung</button><br>
		<form action="includes/bewertung.inc.php" method="post" class="login_area">
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
		</div>
		<script src="main.js"></script>
    </body>

</html>
</main>
<?php
    require('footer.php');
?>
