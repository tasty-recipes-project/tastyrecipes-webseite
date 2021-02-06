

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

    //Abfrage aus der Tabelle Rezepte für zufällige Ausgabe der Bilder im Bereich Was koche ich heute //
    $katVorspeise = mysqli_query($con, "SELECT * FROM rezepte WHERE Kategorie='vorspeise' ORDER BY RAND() LIMIT 1 ")
    or die("Fehler: " . mysqli_error($con));
        $vorspeise = mysqli_fetch_array($katVorspeise);

    $katHauptspeise = mysqli_query($con, "SELECT * FROM rezepte WHERE Kategorie='hauptspeise' ORDER BY RAND() LIMIT 1 ")
    or die("Fehler: " . mysqli_error($con));
        $hauptspeise = mysqli_fetch_array($katHauptspeise);

    $katDessert = mysqli_query($con, "SELECT * FROM rezepte WHERE Kategorie='dessert' ORDER BY RAND() LIMIT 1 ")
    or die("Fehler: " . mysqli_error($con));
        $dessert = mysqli_fetch_array($katDessert);
?>

<main class="main_content">
    <!-- Slider Header Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2>Einige Unserer Rezepte</h2>
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



        <!-- Was koche ich Section Header -->
<div class="row">
    <div class="col-lg-12">
        <h2>Was koche ich heute?</h2>
            <hr class="hr_black">
    </div>
</div>

    <!-- Was koche ich Section Content --> 
    <div class="row kat_container"> 
        <div class="col-lg-4">
            <div class="card">
            <h3>Vorspeise</h3>
            <?php echo "<img  src='includes/uploads/" .$vorspeise['Bild']."' height='400px' width='400px'>"; ?>
                <div class="card-body">
                <?php echo('<a href="rezept.php?rezept='. $vorspeise['RezeptId'] . ' " class="btn btn-success">Mehr erfahren</a>'); ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
            <h3>Hauptspeise</h3>
            <?php echo "<img  src='includes/uploads/" .$hauptspeise['Bild']."' height='400px' width='400px'>"; ?>
                <div class="card-body">
                <?php echo('<a href="rezept.php?rezept='. $hauptspeise['RezeptId'] . ' " class="btn btn-success">Mehr erfahren</a>'); ?>
                </div>   
            </div>
        </div>
                        
        <div class="col-lg-4">
            <div class="card">
            <h3>Dessert</h3>
            <?php echo "<img  src='includes/uploads/" .$dessert['Bild']."' height='400px' width='400px'>"; ?>
                <div class="card-body">
                <?php echo('<a href="rezept.php?rezept='. $dessert['RezeptId'] . ' " class="btn btn-success">Mehr erfahren</a>'); ?>
                </div>
            </div>
        </div>
    </div>
    
</main>

<script src="main.js"></script>


<?php
    require('footer.php')
?>
