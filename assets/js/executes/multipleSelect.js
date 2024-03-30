jQuery(document).ready(function($) {
	$('#ids_productors_insert').multiselect({
		nonSelectedText: 'Select Productor´s',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%'
	});
	$('#ids_genders_insert').multiselect({
		nonSelectedText: 'Select Gender´s',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%'
	});
	$('#ids_categorys_insert').multiselect({
		nonSelectedText: 'Select Category´s',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%'
	});

	$('#ids_productors_update').multiselect({
		nonSelectedText: 'Select Productor´s',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%'
	});
	$('#ids_genders_update').multiselect({
		nonSelectedText: 'Select Gender´s',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%'
	});
	$('#ids_categorys_update').multiselect({
		nonSelectedText: 'Select Category´s',
	  	enableFiltering: true,
	  	enableCaseInsensitiveFiltering: true,
	  	buttonWidth:'100%'
	});
});