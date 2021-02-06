<?php
    require('header.php')
?>

<main class="main_content">
    <div class="row">
        <div class="col-lg-12">
            <h2>Desserts</h2>
                <hr class="hr_black">

                <!-- Hier sollen die Inhalte der Rezept Tablle ausgegeben werden -->
                <?php
                    require('includes/dbc.inc.php');
                    $rezeptTeaserInfoLeft = mysqli_query($con, "SELECT * FROM rezepte WHERE Kategorie = 'dessert'")
                        or die("Fehler: " . mysqli_error($con));


                    while ($colleft = mysqli_fetch_array($rezeptTeaserInfoLeft))
                        {
                            //Ausgabebereich für Rezepte
                        echo '<div class="row">';
                            echo '<div class="col-lg-6">';
                                echo '<div class="card">';
                                    //Bild Section im Card Header
                                    echo "<img class='rezept_image' src='includes/uploads/" .$colleft['Bild']."'>";
                                        //Teaser Informationen über das Gericht
                                        echo '<div class="card-body rezept_image">';
                                            echo('<p><h3>RezeptName: ' . $colleft['RezeptName'] . '</h3></p>');
                                            echo('<p><b>Ersteller:</b> ' . $colleft['BenutzerName'] . '</p>');
                                            echo('<p class="duration"><b>Dauer:</b> ' . $colleft['Dauer'] . ' Minuten</p>');
                                            echo('<p class="duration"><b>Schwierigkeitsgrad:</b> ' . $colleft['Schwierigkeit'] . '</p>');
                                            echo('<a href="rezept.php?rezept='. $colleft['RezeptId'] . ' " class="btn btn-success">Mehr erfahren</a>');
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                    }
                ?>
        </div>
    </div>
</main>

<script src="main.js"></script>

<?php
    require('footer.php')
?>
