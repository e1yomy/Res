$(document).ready(function(){
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
       
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });


var app= angular.module('app',[]);
app.controller('tabController', function(){
    this.tab=1;
    this.estaSeleccionado = function(checkTab) {
        return this.tab === checkTab;
      };
    this.siguiente = function() {
        this.tab=this.tab+1;
      };
    this.anterior = function() {
        this.tab=this.tab-1;
      };
    this.verTab=function(){
        return this.tab;
    };

      this.seleccionar = function(activeTab) {
        this.tab = activeTab;
      };
  });

//Crea una <etiqueta></etiqueta> para poder usar un documento menu.html en el lugar donde se utiliza la etiqueta.
app.directive('menu',function(){
    return{
        templateUrl:'menu.html'
        }; 
    });
//Crea una <etiqueta></etiqueta> para poder usar un documento pie.html en el lugar donde se utiliza la etiqueta.
app.directive('piedepagina',function(){
    return{
        templateUrl:'pie.html'
        }; 
    });
//Crea una <etiqueta></etiqueta> para poder usar un documento botonesdenavegacion.html en el lugar donde se utiliza la etiqueta.
app.directive('botonesdenavegacion',function(){
    return{
        templateUrl:'botonesdenavegacion.html'
        }; 
    });
//Crea una <etiqueta></etiqueta> para poder usar un documento instructivoacceso.html en el lugar donde se utiliza la etiqueta.
app.directive('instructivo',function(){
    return{
        templateUrl:'instructivoacceso.html'
        }; 
    });
//Crea una <etiqueta></etiqueta> para poder usar un documento buscador.html en el lugar donde se utiliza la etiqueta.
app.directive('buscador',function(){
    return{
        templateUrl:'buscador.html'
        }; 
    });

