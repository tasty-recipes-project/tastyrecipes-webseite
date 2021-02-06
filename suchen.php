<?php
	require('header.php');
	require('includes/dbc.inc.php');
					
	$suchbegriff = $_POST['search'];
	
	// Nach Katgorien und dem Suchbegriff filtern 
	if ($_POST['search-select'] == 'Einfach'){
		$suche = mysqli_query($con, "SELECT * FROM rezepte WHERE (RezeptName LIKE '%$suchbegriff%' OR Beschreibung LIKE '%$suchbegriff%') AND Schwierigkeit = 'einfach' ")
		or die("Fehler: " . mysqli_error($con));	 
		
		// Wenn keine Ergebnisse, dann Meldung ausgeben
		if (mysqli_num_rows($suche) < 1){
			?>
			<label class="myData">
			</br>
			Es wurden keine Rezepte entsprechend ihrer Suche gefunden. </br>
			</br>
			</label>
			<?php
		}
	} else if ($_POST['search-select'] == 'Mittel'){
		$suche = mysqli_query($con, "SELECT * FROM rezepte WHERE (RezeptName LIKE '%$suchbegriff%' OR Beschreibung LIKE '%$suchbegriff%') AND Schwierigkeit = 'mittel' ")
		or die("Fehler: " . mysqli_error($con));
			 
		if (mysqli_num_rows($suche) < 1){
			?>
			<label class="myData">
			</br>
			Es wurden keine Rezepte entsprechend ihrer Suche gefunden. </br>
			</br>
			</label>
			<?php
		}
	} else if ($_POST['search-select'] == 'Schwierig'){
		$suche = mysqli_query($con, "SELECT * FROM rezepte WHERE RezeptName LIKE ('%$suchbegriff%' OR Beschreibung LIKE '%$suchbegriff%') AND Schwierigkeit = 'schwer' ")
		or die("Fehler: " . mysqli_error($con));
		 
		if (mysqli_num_rows($suche) < 1){
			?>
			<label class="myData">
			</br>
			Es wurden keine Rezepte entsprechend ihrer Suche gefunden. </br>
			</br>
			</label>
			<?php
		}
	} else {
	$suche = mysqli_query($con, "SELECT * FROM rezepte WHERE RezeptName LIKE '%$suchbegriff%' OR Beschreibung LIKE '%$suchbegriff%' ")
		or die("Fehler: " . mysqli_error($con));
	 
		if (mysqli_num_rows($suche) < 1){
			?>
			<label class="myData">
			</br>
			Es wurden keine Rezepte entsprechend ihrer Suche gefunden. </br>
			</br>
			</label>
			<?php
		}
	}
	
	// alle passenden Rezepte ausgeben
	while ($rowSuche = mysqli_fetch_array($suche)) 
    {
                
		//Ausgabebereich für Rezepte
        echo '<div class="container"';
			echo '<div class="row">';
                echo '<div class="col-lg-6">';
                    echo '<div class="card">';

                        //Bild Section im Card Header
                        echo "<img  src='includes/uploads/" .$rowSuche['Bild']."'>";
                                    
                        //Teaser Informationen über das Gericht
                        echo '<div class="card-body">';
                        echo('<p><b>RezeptId:</b> ' . $rowSuche['RezeptId'] . '</p>');
                        echo('<p><h3>RezeptName: ' . $rowSuche['RezeptName'] . '</h3></p>');
                        echo('<p><b>Ersteller:</b> ' . $rowSuche['BenutzerName'] . '</p>');
                        echo('<p class="duration"><b>Dauer:</b> ' . $rowSuche['Dauer'] . ' Minuten</p>');
                        echo('<p class="duration"><b>Schwierigkeitsgrad:</b> ' . $rowSuche['Schwierigkeit'] . '</p>');
                        echo('<a href="rezept.php?rezept='. $rowSuche['RezeptId'] . ' " class="btn btn-success">Mehr erfahren</a>');
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
        echo '</div>';    
	}
	
	require('footer.php');
?>