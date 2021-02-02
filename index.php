

<?php
//PHP Logik der Startseite
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

            <!-- Slider Section --> 
            <div class="row">

                <div class="slicer">
                    <figure>
                        <a href="rezept.php?rezept= <?php echo $row1['RezeptId']?> "><img class="mySlides" <?php echo "<img  src='includes/uploads/" .$row1['Bild']."'"; ?>></a>
                        <a href="rezept.php?rezept= <?php echo $row1['RezeptId']?> "><img class="mySlides" <?php echo "<img  src='includes/uploads/" .$row1['Bild']."'"; ?>></a>
                        <a href="rezept.php?rezept= <?php echo $row1['RezeptId']?> "><img class="mySlides" <?php echo "<img  src='includes/uploads/" .$row1['Bild']."'"; ?>></a>
                        <a href="rezept.php?rezept= <?php echo $row1['RezeptId']?> "><img class="mySlides" <?php echo "<img  src='includes/uploads/" .$row1['Bild']."'"; ?>></a>
                        <a href="rezept.php?rezept= <?php echo $row1['RezeptId']?> "><img class="mySlides" <?php echo "<img  src='includes/uploads/" .$row1['Bild']."'"; ?>></a>
                    </figure>
                 </div>

            </div>
           
 
            
            

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
