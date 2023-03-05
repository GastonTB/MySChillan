
'use strict';

(function ($) {

    $('#boton-login').on('click', function(){
      swal.close();
      $('#modal-login').removeClass('hidden');
    });

    $('#buscar').on('click', function(){
      $('#logo').addClass('hidden');
      $('#busqueda').show('slow');
      $('#espacio').removeClass('hidden');
      $('#buscar').addClass('hidden');
      $('#busqueda').addClass('fixed');
      $('#busqueda').addClass('z-50');
      $('#overlay-busqueda').removeClass('hidden');
      $('#buscar').addClass('text-lime-500');
    });

    $('#overlay-busqueda').on('click', function(){
      $('#logo').removeClass('hidden');
      $('#busqueda').hide();
      $('#espacio').addClass('hidden');
      $('#buscar').removeClass('hidden');
      $('#buscar').removeClass('text-lime-500');
      $('#overlay-busqueda').addClass('hidden');
    });

    $('#no-tiene-cuenta').on('click', function(){
      $('#modal-login').addClass('hidden');
      $('#modal-registro').removeClass('hidden');
    });
    
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
      //reset select
      $('#regiones').val('0');
      $('#comunas').val('0');

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
  
      $("#regiones").change(function() {
        var regionSeleccionada = $(this).val();
        $("#comunas option").hide();
        $("#comunas option[data-region='" + regionSeleccionada + "']").show();
        $("#comunas").val("");
    });



          var swiper = new Swiper(".categorias", {
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
            $('#abajo-tienda').removeClass('hidden');
            $('#arriba-tienda').addClass('hidden');
          }else{
            $('#lista-tienda').show('slow');
            $('#abajo-tienda').addClass('hidden');
            $('#arriba-tienda').removeClass('hidden');
          }

        });

        $('#back-office').on('click', function(){
          if($('#lista-bo').is(':visible')){
            $('#lista-bo').hide('slow');
            $('#abajo-bo').removeClass('hidden');
            $('#arriba-bo').addClass('hidden');
          }else{
            $('#lista-bo').show('slow');
            $('#abajo-bo').addClass('hidden');
            $('#arriba-bo').removeClass('hidden');
          }
        });

        $('#cerrar-sidebar').on('click', function(){
          $('#sidebar').addClass('hidden');
        });

        $('#cerrar-carrito').on('click', function(){
          $('#sidebar-carro').addClass('hidden');
        });

        $('#cerrar-login').on('click', function(){
          $('#modal-login').addClass('hidden');
        });

        $('#cerrar-registro').on('click', function(){
          $('#modal-registro').addClass('hidden');
        });

        $('#carrito').on('click', function(){
          $('#sidebar').addClass('hidden');
        });


        $('#telefono_registro').on('input', function(){
          var telefono = $(this).val();
          telefono = telefono.replace(/[^0-9]/g, '');
          $(this).val(telefono);
          if(telefono.length>9){
            $(this).val(telefono.substring(0,9));
          }
          //if telefono first digit is not a 9 show a error message down the input fild saying "telefono debe comenzar con un 9"
          if(telefono.length>0){
            if(telefono[0]!='9'){
              $('#error-telefono').removeClass('hidden');
            }else{
              $('#error-telefono').addClass('hidden');
            }
          }
        });


        

})(jQuery);