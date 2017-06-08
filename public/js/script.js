$(document).ready(function () {

      $( '#solicitado' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado	
        alert("DPI Solicitado");

        $.ajax({
        	headers: {
            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
        },
    type: 'POST',
    url: 'http://localhost/proyecto1/public/administrador/update',
    dataType: 'html',
    data: {'id':1},
    success: function(data) {
        console.log('datos enviados a php correctamente!' + data);
  },
  error:function(error){
  	console.log('datos no enviados');
  }

});

    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("No Solicitado");
    }
});

      $( '#enproceso' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        alert("DPI en proceso");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("No en proceso");
    }
});

      $( '#finalizado' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        alert("DPI Finalizado");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("No Finalizado");
    }
});


     });



/*
$(document).ready(function () {

      $( '#solicitado' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }
});*/