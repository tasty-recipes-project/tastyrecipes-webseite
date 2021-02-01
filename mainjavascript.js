"use strict";

window.addEventListener("load", function() {
        

        let buttonUp = document.getElementById("up");
        let buttonDown = document.getElementById("down");
        
        let content = document.getElementById("content");
       
        let menge = document.getElementById("menge");
       
        
        
        buttonUp.addEventListener("click", function() {
            menge.innerHTML = menge.innerHTML / content.innerHTML; 
            content.innerHTML++;
            menge.innerHTML = menge.innerHTML * content.innerHTML;
            
            
        })

        buttonDown.addEventListener("click", function() {
            menge.innerHTML = menge.innerHTML / content.innerHTML; 
            content.innerHTML--;
            menge.innerHTML = menge.innerHTML * content.innerHTML;
        })

     

       
      
            
      

}, false);