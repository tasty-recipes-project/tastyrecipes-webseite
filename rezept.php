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
		<form action="rezeptrechner.php" method="post">
		<h2>Zutaten für <input id="pers" type="number" name="portionen" min=" step="1" value="<?php echo $row['PortionenAnzahl'] ?>" size="2">
					<button class="btn-portionen-berechnen" type="submit" name="rezeptrechner">Portionen</button></br></h2>
		</form>
			<?php
				$zutaten = mysqli_query($con, "SELECT * FROM zutaten WHERE RezeptId = '$rezeptId'")
					or die("Fehler: " . mysqli_error($con));
				$row2 = mysqli_fetch_array($zutaten);

				// prüfen, ob Feld leer und diese nicht ausgeben
				$count = 1;
				for ($count; $count <= 10; $count++){
					if (empty($row2["Zutat{$count}"])) {
						break;
					} else {
						echo($row2["Menge{$count}"]);
						echo " ";
						echo($row2["Einheit{$count}"]);
						echo " ";
						echo($row2["Zutat{$count}"]);
						echo "<br />";

					}
				}
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
    </body>
</html>
</main>

<?php
    require('footer.php');
?>
