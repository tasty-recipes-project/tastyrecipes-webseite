<?php
    require('header.php')
?>

<main class="main_content">
    <?php
        if (isset($_SESSION['nameBenutzer'])) {
            echo '<p>Glückwunsch, du bist erfolgreich eingeloggt</p>';

            //Persönlicher Bereich
        }
        else {
            
            //Startseite im uneingeloggten Modus

            //Slider Bereich

            //Slider Bereich Header
            echo '<div class="container-fluid">
            
            <div class"row">
                    <div class="col-lg-12">
                        <h2>Unsere besten Jeder Kategorie</h2>
                        <hr class="hr_black">
                    </div>
                 </div>';
                  
            echo '<div class="row" style="max-width:800px">
                  <div class="col-lg-12">
                        <img class="mySlides" src="images/dummy1.jpg" style="width:100%">
                        <img class="mySlides" src="images/dummy2.jpg" style="width:100%">
                        <img class="mySlides" src="images/dummy3.jpg" style="width:100%">
                   </div>
                  
                   <div class="col-lg-12">
                        <div class="w3-section">
                            <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
                            <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
                        </div>
                            <button class="w3-button demo" onclick="currentDiv(1)">1</button> 
                            <button class="w3-button demo" onclick="currentDiv(2)">2</button> 
                            <button class="w3-button demo" onclick="currentDiv(3)">3</button> 
                        </div>
                  </div>
                  </div>
                </div>
                </div>';
                
            //Was kochen Bereich
            //Überschrift was kochen Bereich
                echo '<div class="container-fluid">
                <div class="row waskochen">
                        <div class="col-lg-12">
                        <h2>Was koche ich heute?</h2>
                        <hr class="hr_black">
                        </div>
                      </div>';

            //Kontent was kochen Bereich
                echo '<div class="row kategorien">
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
                      </div>';
            }
        ?>
</main>

<script src="main.js"></script>

<?php
    require('footer.php')
?>