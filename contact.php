<?php
	include('header.php')
?>

<?php
    //Die E-Mail Adresse, an die die Kontaktanfragen gesendet werden
    $empfaenger = "your.mail@example.com";
    if(isset($_REQUEST["submit"])){
        if(empty($_REQUEST["name"]) || empty($_REQUEST["email"]) || empty($_REQUEST["nachricht"])){
            $error = "Bitte f&uuml;llen Sie alle Felder aus";
        }
        else{
            //Text der E-Mail Nachricht
            $mailnachricht="Sie haben eine Anfrage über ihr Kontaktformular erhalten:\n";
            $mailnachricht .= "Name: ".$_REQUEST["name"]."\n".
                      "E-Mail: ".$_REQUEST["email"]."\n".
                      "Datum: ".date("d.m.Y H:i")."\n".
                      "\n\n".$_REQUEST["nachricht"]."\n";            
            //Betreff der E-Mail Nachricht
            $mailbetreff = "Neue Kontaktanfrage von ".$_REQUEST["name"]." (".$_REQUEST["email"].")";
            //Hier wird die E-Mail versendet
            if(mail($empfaenger, $mailbetreff, $mailnachricht)){
                //Text den der Seiten Besucher nach dem Versand sieht
                $success = "Wir haben Ihre Anfrage erhalten und werden sie so schnell wie möglich bearbeiten. <br>";
            }
            else{
                $error = "Beim Versenden Ihrer Anfrage ist ein Fehler aufgetreten! Versuchen Sie es bitte später nocheinmal";
            }
        }
    }
?>

<!DOCTYPE html>
<main class="main_content">
<html>
	<head>
		<title>Willkommen bei Tasty Recipes</title>
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" >
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
	</head>
	
	<body>
		<h1>Ihr Kontakt zu Uns</h1>
		
		<div id="kontaktformular">
		<?php if(isset($success)){
        echo "<div>".$success."</div>"; 
		} 
		else { ?>
		<form id="kontaktform" action="" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <div class="pure-control-group">
                <label for="name">Name</label>
                <input id="name" name="name" required size="40" placeholder="Name">
            </div>
            <div class="pure-control-group">
                <label for="email">E-Mail</label>
                <input id="email" name="email" type="email" required size="40" placeholder="E-Mail">
            </div>
            <div class="pure-control-group">
                <label for="nachricht">Nachricht</label>
                <textarea id="nachricht" name="nachricht" required cols="39" rows="10" placeholder="Nachricht"></textarea>
            </div>
            <div style="float:right;font-size: 50%; text-align: right">by <a href="https://www.devno.com/kontaktformular">devno</a></div>
            <div style="clear:both;"></div> 
            <div class="pure-control-group">
                <label for="submit"></label>
                <button id="submit" name="submit" type="submit" class="pure-button pure-button-primary" onsubmit="validateForm()">Absenden</button>
            </div>
        </fieldset>  
		</form>
		<script>
			function validateForm(){
				var form = document.getElementById("kontaktform");
				return form.checkValidity();
        }
    </script>
    <?php 
    } 
    if(isset($error)){
        echo '<div class="error">'.$error.'</div>'; 
    } ?>
	</div>
		
	</body>
</html>
</main>

<?php
	include('footer.php')
?>
