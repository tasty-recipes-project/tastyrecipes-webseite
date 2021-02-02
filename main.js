"use strict";

window.addEventListener("load", function() {

    let buttonUp = document.getElementById("up"); 

    let menge = document.getElementsByClassName("menge"); 

    for (let i=0; i < menge.length; i++) {
        buttonUp.addEventListener("click", function() {
            menge[i].innerHTML = 10;
        })
    }
}, false);