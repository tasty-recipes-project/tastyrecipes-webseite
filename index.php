<?php
    require('header.php');
	require('includes/dbc.inc.php');
	
	$rezept1 = mysqli_query($con, "SELECT * FROM rezepte ORDER BY RAND() LIMIT 1")
        or die("Fehler: " . mysqli_error($con));
        $row1 = mysqli_fetch_array($rezept1);
		
	$rezept2 = mysqli_query($con, "SELECT * FROM rezepte ORDER BY RAND() LIMIT 1")
        or die("Fehler: " . mysqli_error($con));
        $row2 = mysqli_fetch_array($rezept2);
		
	$rezept3 = mysqli_query($con, "SELECT * FROM rezepte ORDER BY RAND() LIMIT 1")
        or die("Fehler: " . mysqli_error($con));
        $row3 = mysqli_fetch_array($rezept3);
?>

<main class="main_content">
                 <div class="row">
                    <div class="col-lg-12">
                        <h2>Unsere besten Jeder Kategorie</h2>
                        <hr class="hr_black">
                    </div>
                 </div>

<<<<<<< HEAD
            <?php
                require('includes/dbc.inc.php');
                 $sliderStartseite = mysqli_query($con, "SELECT Bild FROM rezepte WHERE BewertungDurchschnitt = '1'")
                 or die("Fehler: " . mysqli_error($con));
=======
            <div class="row">
                    <div class="col-lg-12">
                        <a href="rezept.php?rezept= <?php echo $row1['RezeptId']?> "><img class="mySlides" <?php echo "<img  src='includes/uploads/" .$row1['Bild']."'"; ?>></a>
                        <a href="rezept.php?rezept= <?php echo $row2['RezeptId']?> "><img class="mySlides" <?php echo "<img  src='includes/uploads/" .$row2['Bild']."'"; ?>></a>
                        <a href="rezept.php?rezept= <?php echo $row3['RezeptId']?> "><img class="mySlides" <?php echo "<img  src='includes/uploads/" .$row3['Bild']."'"; ?>></a>
                   </div>

                   <div class="col-lg-12">
                        <div class="w3-section">
                            <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
                            <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
                        </div>
                        <div>
                            <button class="w3-button demo" onclick="currentDiv(1)">1</button>
                            <button class="w3-button demo" onclick="currentDiv(2)">2</button>
                            <button class="w3-button demo" onclick="currentDiv(3)">3</button>
                        </div>
                  </div>
                  </div>
>>>>>>> bd9c6101af3fe328dc5a886a7878a870a1d9332c

            while(     $row = mysqli_fetch_assoc($sliderStartseite)) {
           

            echo '<div class="row">';
                    echo '<div class="col-lg-12">';
                    
                   
                        echo "<img  src='includes/uploads/" .$row['Bild']."'>";
                      
                  
                   echo '</div>';
                /* TEst 
                   echo '<div class="col-lg-12">';
                        echo '<div class="w3-section">';
                            echo '<button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>';
                            echo '<button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>';
                        echo '</div>';
                        echo '<div>';
                            echo '<button class="w3-button demo" onclick="currentDiv(1)">1</button>';
                            echo '<button class="w3-button demo" onclick="currentDiv(2)">2</button>';
                            echo '<button class="w3-button demo" onclick="currentDiv(3)">3</button>';
                        echo '</div>';
                  echo '</div>';
                  */
                  echo '</div>';
            }
            ?>

                <div class="row">
                        <div class="col-lg-12">
                        <h2>Was koche ich heute?</h2>
                        <hr class="hr_black">
                        </div>
                </div>


                <div class="row kategorien">
                        <div class="col-lg-4 kat1">
                            <h2>Vorspeise</h2>
                            <img src="images/vorkat1.jpg" /></br>
                            <button class="waskochen_button">Zum Rezept</button>
                        </div>
                        <div class="col-lg-4 kat2">
                            <h2>Hauptgang</h2>
                            <img src="images/hauptkat2.jpg" /></br>
                            <button class="waskochen_button">Zum Rezept</button>
                        </div>
                        <div class="col-lg-4 kat3">
                            <h2>Dessert</h2>
                            <img src="images/dessertkat3.jpg" /><br>
                            <button class="waskochen_button">Zum Rezept</button>
                        </div>
                      </div>
</main>

<script src="main.js"></script>

<?php
    require('footer.php')
?>
