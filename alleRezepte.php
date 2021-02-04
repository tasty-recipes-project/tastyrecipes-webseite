<?php
    require('header.php')
?>

<main class="main_content">


    <div class="row">
        <div class="col-lg-12">
            <h2>Alle Rezepte</h2>
                <hr class="hr_black">

                <!-- Hier sollen die Inhalte der Rezept Datenbank ausgegeben werden -->
                <?php
                    require('includes/dbc.inc.php');

                    $rezeptTeaserInfo = mysqli_query($con, "SELECT * FROM rezepte")
                        or die("Fehler: " . mysqli_error($con));

                        while ($row = mysqli_fetch_array($rezeptTeaserInfo))
                        {


                //Ausgabebereich für Rezepte

                            echo '<div class="row">';
                                echo '<div class="col-lg-6">';
                                    echo '<div class="card">';

                                    //Bild Section im Card Header
                                        echo "<img  src='includes/uploads/" .$row['Bild']."'>";

                                    //Teaser Informationen über das Gericht
                                        echo '<div class="card-body">';
                                            echo('<p><h3>RezeptName: ' . $row['RezeptName'] . '</h3></p>');
                                            echo('<p><b>Ersteller:</b> ' . $row['BenutzerName'] . '</p>');
                                            echo('<p class="duration"><b>Dauer:</b> ' . $row['Dauer'] . ' Minuten</p>');
                                            echo('<p class="duration"><b>Schwierigkeitsgrad:</b> ' . $row['Schwierigkeit'] . '</p>');
                                            echo('<a href="rezept.php?rezept='. $row['RezeptId'] . ' " class="btn btn-success">Mehr erfahren</a>');
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
