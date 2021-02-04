

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
    <!-- Header Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2>Unsere besten Jeder Kategorie</h2>
                <hr class="hr_black">
        </div>
    </div>

            <!-- Slider Section --> 

<div class="slider mittig">
    <div class="slides">
            <input type="radio" name="radio" id="radio1" checked>
            <input type="radio" name="radio" id="radio2">
            <input type="radio" name="radio" id="radio3">
            <input type="radio" name="radio" id="radio4">
            <input type="radio" name="radio" id="radio5">
        <div class="slide s1">
            <img src="includes/uploads/SchinkenNudeln.jpg" alt="">
        </div>
        <div class="slide">
        <img src="includes/uploads/MangoMousse.jpg" alt="">
        </div>
        <div class="slide">
        <img src="includes/uploads/Hackbällchen.jpg" alt="">
        </div>
        <div class="slide">
        <img src="includes/uploads/Gulaschsuppe.jpg" alt="">
        </div>
        <div class="slide">
        <img src="includes/uploads/Bananenbrot.jpg" alt="">
        </div>
    </div>  

    <div class="navigation">
        <label for="radio1" class="downbar"></label>
        <label for="radio2" class="downbar"></label>
        <label for="radio3" class="downbar"></label>
        <label for="radio4" class="downbar"></label>
        <label for="radio5" class="downbar"></label>
    </div>
</div>



        <!-- Was koche ich Section -->
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
            <button onclick="window.location.href='vorspeisen.php'" class="waskochen_button">Zum Rezept</button>
        </div>

        <div class="col-lg-4 kat2">
                <h2>Hauptgang</h2>
                <img src="images/hauptkat2.jpg" /></br>
                <button onclick="window.location.href='haupspeisen.php'" class="waskochen_button">Zum Rezept</button>
        </div>
                        
        <div class="col-lg-4 kat3">
            <h2>Dessert</h2>
                <img src="images/dessertkat3.jpg" /><br>
                <button src="desserts.php" class="waskochen_button">Zum Rezept</button>
        </div>
    </div>
    
</main>

<script src="main.js"></script>


<?php
    require('footer.php')
?>
