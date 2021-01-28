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

                    $ersteller = mysqli_query($con, "SELECT * FROM rezepte")
                        or die("Fehler: " . mysqli_error($con));

                        while ($row = mysqli_fetch_array($ersteller)) 
                        {
                
                
                //Ausgabebereich für Rezepte
                        echo('<div class="rezept_Info">');
                        //Header Section RezeptName und Kategorie
                            
                                echo('<div class="col-lg-12 rezept_header"');
                                    echo('<p><h3> ' . $row['RezeptName'] . '</h3></p>');
                                echo('</div>');
                                echo('<div class="col-lg-12"');
                                    echo('<p><b>Kategorie:</b> ' . $row['Kategorie'] . '</p>');
                                echo('</div>');
                          
                        
                        //Section Dauer und Schwierigkeit
                            
                                echo('<div class="col-lg-2 duration"');
                                    echo('<p><b>Dauer</b>: ' . $row['Dauer'] . ' Minuten</p>');
                                echo('</div>');
                                echo('<div class="col-lg-2 duration"');
                                    echo('<p><b>Schwierigkeitsgrad</b>: ' . $row['Schwierigkeit'] . '</p>');
                                echo('</div>');
                                echo('<div class="col-lg-2 duration"');
                                    echo('<p><b>Rezept für</b>: ' . $row['PortionenAnzahl'] . ' Personen</p>');
                                echo('</div>');
                

                         //Bild Section
                            
                                 echo('<div class="col-lg-12"');
                                    ?>
                                    <p><a href="#"><img class="recipe-img" src="includes/uploads/<?php echo $row['Bild']; ?>" alt=""></a></p>
                                    <?php
                                echo('</div>');

                                

                        //Zutaten Liste

                                echo('<div class="col-lg-12"');
                                    echo('<p><b><h4>Zutatenliste: </h4></b></p>');
                                echo('</div>');
                                //Tabelle für die Ausgabe der Zutatenliste
                                echo('<table>');
                                    echo('<tr>');

                                    //Tabellen Header
                                        echo('<tr>');
                                        echo('<td>Zutat</td>');
                                        echo('<td>Menge</td>');
                                        echo('<td>Einheit</td>');
                                        echo('</tr>');
                                    //Tabellen Header Ende

                                    //Content aus Datenbank
                                        echo('<tr>');
                                        echo('<td>' . $row['Zutat'] .'</td>');
                                        echo('<td>Menge</td>');
                                        echo('<td>Einheit</td>');
                                        echo('</tr>');
                                    //Content Ende
                                echo('</table>');
                                
                        //Bearbeitungsschritte

                        echo('<div class="col-lg-12"');
                                    echo('<p><b><h4>Bearbeitungsschritte: </h4></b></p>');
                        echo('</div>');
                        echo('<div class="col-lg-12"');
                                    echo('<p>Schritt 1: ' . $row['Schritt'] . '</p>');
                        echo('</div>');

                        //ErstellerInfo

                        echo('<div class="col-lg-12"');
                                    echo('<p><b>Ersteller:</b> ' . $row['BenutzerName'] . '</p>');
                        echo('</div>');
                            
                        echo('</div>');    
                        
                    }
                ?>

                
        </div>
    </div>
</main>

<script src="main.js"></script>

<?php
    require('footer.php')
?>