document.addEventListener('DOMContentLoaded', function () {
     
     // Get all "navbar-burger" elements
      var $menuHamburgesa = Array.prototype.slice.call(document.querySelectorAll('.navbarburger'), 0);
     
     // Check if there are any navbar burgers
      if ($menuHamburgesa.length > 0) {
     
       // Add a click event on each of them
        $menuHamburgesa.forEach(function ($el) {
          $el.addEventListener('click', function () {
     
           // Get the elemento from the "data-elemento" attribute
            var elemento = $el.dataset.elemento;
            var $elemento = document.getElementById(elemento);
     
           // Toggle the class on both the "navbar-burger" and the "navbar-menu"
            $el.classList.toggle('is-active');
            $elemento.classList.toggle('is-active');
     
         });
        });
      }
     
    });