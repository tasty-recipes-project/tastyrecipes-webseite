<?php
    require('header.php')
?>

<main class="main_content">
                 <div class="row">
                    <div class="col-lg-12">
                        <h2>Unsere besten Jeder Kategorie</h2>
                        <hr class="hr_black">
                    </div>
                 </div>

            <?php
                require('includes/dbc.inc.php');
                 $sliderStartseite = mysqli_query($con, "SELECT Bild FROM rezepte WHERE BewertungDurchschnitt = '1'")
                 or die("Fehler: " . mysqli_error($con));

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
