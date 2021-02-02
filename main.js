"use strict";

window.addEventListener("load", function() {

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

     
    
    }, false);