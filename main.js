

//Javascript für Slider
  var slideIndex = 1;
  showDivs(slideIndex);
  
  function plusDivs(n) {
    showDivs(slideIndex += n);
  };
  
  function currentDiv(n) {
    showDivs(slideIndex = n);
  };
  
  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" w3-red", "");
    }
    x[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " w3-red";
  };

  // Javascript für Rezeptformular

  function showZutatEingabe(id) {
    if (document.getElementById) {
      var zutat = document.getElementById(id);
      zutat.style.display = (zutat.style.display == 'flex' ? 'none' : 'flex');
    }
  }

  function hideZutatEingabe(id) {
    if (document.getElementById) {
      var zutat = document.getElementById(id);
      zutat.style.display = (zutat.style.display == 'flex' ? 'none' : 'flex');
    }
  }







  

  
  






