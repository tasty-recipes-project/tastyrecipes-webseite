"use strict";

window.addEventListener("load", function() {


    
    // Hier beginnt Javascript für den Bereich der Rezeptbewertung
    let buttonUp = document.getElementById("up"); 
    let buttonDown = document.getElementById("down");
   
    let ausgangsMenge = document.getElementById("ausgangsMenge");
    let neueMenge = document.getElementById("neueMenge");
    let menge = document.getElementsByClassName("menge"); 

    
  
        buttonUp.addEventListener("click", function() {
            neueMenge.innerHTML++;
          //Berechne alles in der ZutatenListe    
          for (let i = 0; i < menge.length; i++) {
             menge[i].innerHTML = menge[i].innerHTML / ausgangsMenge.innerHTML * neueMenge.innerHTML;
          }
        })

        buttonDown.addEventListener("click", function() {
            neueMenge.innerHTML--;
          //Berechne alles in der ZutatenListe    
          for (let i = 0; i < menge.length; i++) {
             menge[i].innerHTML = menge[i].innerHTML / ausgangsMenge.innerHTML * neueMenge.innerHTML; 
          }
        })

        let buttonRezeptBewertung = document.getElementById("rezept-bewertung");

        buttonRezeptBewertung.addEventListener("click", function() {
            let divBewertung = document.getElementById("div-bewertung");
            divBewertung.classList.toggle("hide");
        })
     
    
    }, false);