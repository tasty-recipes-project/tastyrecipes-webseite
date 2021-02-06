"use strict";

window.addEventListener("load", function() {


    
    // Hier beginnt Javascript für den Bereich der Rezeptberechnung
    let buttonUp = document.getElementById("up"); 
    let buttonDown = document.getElementById("down");
   
    let ausgangsMenge = document.getElementById("ausgangsMenge");
    let neueMenge = document.getElementById("neueMenge");
    let menge = document.getElementsByClassName("menge"); 

    
    //Function berechnet die Menge des Rezepts bei Button Click
        buttonUp.addEventListener("click", function() {
            neueMenge.innerHTML++;
          //Berechne alles in der ZutatenListe    
          for (let i = 0; i < menge.length; i++) {
             menge[i].innerHTML = menge[i].innerHTML / ausgangsMenge.innerHTML * neueMenge.innerHTML;
    
          }
          ausgangsMenge.innerHTML++;
        })

        buttonDown.addEventListener("click", function() {
            neueMenge.innerHTML--;
          //Berechne alles in der ZutatenListe    
          for (let i = 0; i < menge.length; i++) {
             menge[i].innerHTML = menge[i].innerHTML / ausgangsMenge.innerHTML * neueMenge.innerHTML; 
          }
          ausgangsMenge.innerHTML--;
        })

      //Folgende Funktion öffnet im Frontend den Bereich für die Rezeptbewertung
        let buttonRezeptBewertung = document.getElementById("rezept-bewertung");

        buttonRezeptBewertung.addEventListener("click", function() {
            let divBewertung = document.getElementById("div-bewertung");
            divBewertung.classList.toggle("hide");
        })
  
    
    }, false);