$( "#editar" ).click(function( event ) {
	$( "#nombre" ).prop( "readonly", false );
	$( "#apellido1" ).prop( "readonly", false );
	$( "#apellido2" ).prop( "readonly", false );

	$("#telefono").prop("readonly",false);
	$( "#email" ).prop( "readonly", false );
	$( "#pass" ).prop( "readonly", false );

	$( "#direccion" ).prop( "readonly", false );
	$( "#codigopostal" ).prop( "readonly", false );
	$( "#ciudad" ).prop( "readonly", false );
	$( "#poblacion" ).prop( "readonly", false );
	$( "#enviar" ).prop( "disabled", false );

  event.preventDefault();
});


