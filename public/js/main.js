
'use strict';

(function ($) {

    //dropdown carrito
    $('#carrito').hover(function(){
      $('#opciones-carrito').show();
      $('#opciones-carrito').mouseenter(
        function(){
          $('#opciones-carrito').show();
        }
      );
      $('#opciones-carrito').mouseleave(
        function(){
          $('#opciones-carrito').hide();
        }
      )
    },function(){
      $('#opciones-carrito').hide();
    }
    );

    //dropdown admin
    $('#admin').hover(function(){
      $('#opciones-admin').show();
      $('#opciones-admin').mouseenter(
        function(){
          $('#opciones-admin').show();
        }
      );
      $('#opciones-admin').mouseleave(
        function(){
          $('#opciones-admin').hide();
        }
      )
    },function(){
      $('#opciones-admin').hide();
    });

      //boton menu PC

    $('#ingresar2').on('click', function(){
      $('#modal-login').removeClass('hidden');
      $('#sidebar').addClass('hidden');
    });

    $('#overlay-modal-login').on('click', function(){
      $('#modal-login').addClass('hidden');
    });
    
    $('#registrarse2').on('click', function(){
      $('#modal-registro').removeClass('hidden');
      $('#sidebar').addClass('hidden');
      var selectR = selectRegion(); 
    });
  

    //boton menu celular/tablet
    $('#boton-menu').on('click', function(){
      $('#sidebar').removeClass('hidden');
    });

    $('#overlay-sidebar').on('click', function(){
      $('#sidebar').addClass('hidden');
    });

    $('#ingresar').on('click', function(){
      $('#modal-login').removeClass('hidden');
      $('#sidebar').addClass('hidden');
    });

    $('#overlay-modal-login').on('click', function(){
      $('#modal-login').addClass('hidden');
    });
    
    $('#registrarse').on('click', function(){
      $('#modal-registro').removeClass('hidden');
      $('#sidebar').addClass('hidden');
      var selectR = selectRegion(); 
    });

    $('#overlay-modal-registro').on('click', function(){
      $('#modal-registro').addClass('hidden');
    });

      //saber tamaño de pantalla para slider categoria
      var mq = $('#mq');
      var mq2 = mq.children();
      var mq3 = mq2.length;
      
      let tamaño;
      
      for(var i=0;i<mq3;i++){
        var hijo = mq2[i];
        if($(hijo).css('display')!='none'){
          tamaño = $(hijo).text();
        }
      }
  
      function selectRegion(){
        var $regiones = $('#regiones'),
      $comunas = $('#comunas'),
      $options = $comunas.find('option');

      $regiones.on( 'change', function() {
        $comunas.html( $options.filter( '[value="' + this.value + '"]' ) );
      } ).trigger( 'change' );
      }



          var swiper = new Swiper("#categorias", {
          slidesPerView: tamaño,
          spaceBetween: 10,
          slidesPerGroup: 1,
          loop: true,
          loopFillGroupWithBlank: true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          }
        });

        
        //when click on id carrito console log hola
        $('.carrito').on('click', function(){
          $('#sidebar-carro').removeClass('hidden');
        });
        $('.circulo').on('click', function(){
          $('#sidebar-carro').removeClass('hidden');
        });
        
        $('#overlay-carro').on('click', function(){
          $('#sidebar-carro').addClass('hidden');
        });

        $('#tienda').on('click', function(){
          if($('#lista-tienda').is(':visible')){
            $('#lista-tienda').hide('slow');
            $('#abajo-tienda').show();
            $('#arriba-tienda').hide();
          }else{
            $('#lista-tienda').show('slow');
            $('#abajo-tienda').hide();
            $('#arriba-tienda').show();
          }

        });

        $('#back-office').on('click', function(){
          if($('#lista-bo').is(':visible')){
            $('#lista-bo').hide('slow');
            $('#abajo-bo').show();
            $('#arriba-bo').hide();
          }else{
            $('#lista-bo').show('slow');
            $('#abajo-bo').hide();
            $('#arriba-bo').show();
          }
        });

        $('#cerrar-sidebar').on('click', function(){
          $('#sidebar').addClass('hidden');
        });

        $('#cerrar-carrito').on('click', function(){
          $('#sidebar-carro').addClass('hidden');
        });

        

})(jQuery);