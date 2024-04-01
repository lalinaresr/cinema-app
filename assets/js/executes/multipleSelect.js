jQuery(document).ready(function($) {
	$('#ids_productors_insert').multiselect({
		nonSelectedText: 'Seleccione productores',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%',
		filterPlaceholder: 'Buscar...',
	});
	$('#ids_genders_insert').multiselect({
		nonSelectedText: 'Seleccione géneros',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%',
		filterPlaceholder: 'Buscar...',
	});
	$('#ids_categorys_insert').multiselect({
		nonSelectedText: 'Seleccione categorías',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%',
		filterPlaceholder: 'Buscar...',
	});

	$('#ids_productors_update').multiselect({
		nonSelectedText: 'Seleccione productores',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%',
		filterPlaceholder: 'Buscar...',
	});
	$('#ids_genders_update').multiselect({
		nonSelectedText: 'Seleccione géneros',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%',
		filterPlaceholder: 'Buscar...',
	});
	$('#ids_categorys_update').multiselect({
		nonSelectedText: 'Seleccione categorías',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%',
		filterPlaceholder: 'Buscar...',
	});
});