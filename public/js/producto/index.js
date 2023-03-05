'use strict';

(function ($) {
    $('.boton-oferta').click(function() {
        $('#precio-oferta').prop('disabled', false);
        $('#fecha_ini').prop('disabled', false);
        $('#fecha_ter').prop('disabled', false);
        var id = $(this).attr('id');
        $('#modal-oferta').removeClass('hidden');
        var precio = $('#precio-producto-' + id).text();
        var nombre = $('#nombre-producto-' + id).text();
        //if nombre strlen > 30 make nombre 30 char
        precio = $.trim(precio);
        nombre = $.trim(nombre);
        $('#nombre-modal').text(nombre);
        $('#precio-antiguo').val(precio);
        var precio_antiguo = precio.replace(/[$'.']/g, '');
        $('#precio-antiguo-hidden').val(precio_antiguo);
        $('#id-producto').val(id);
        $('.acciones-2').addClass('hidden');
        $('.acciones-1').removeClass('hidden');
        $('#editar-oferta').addClass('hidden');
    });
})(jQuery);