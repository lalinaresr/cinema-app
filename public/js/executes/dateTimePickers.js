jQuery(document).ready(function($) {
	
	$('#user_date_birthday_insert').datetimepicker({
		locale: 'es',
		viewMode: 'years',
		format: 'YYYY-MM-DD',
		maxDate: 'now' 
	});
	$('#user_date_birthday_update').datetimepicker({
		locale: 'es',
		viewMode: 'years',
		format: 'YYYY-MM-DD',
		maxDate: 'now' 
	});
	$('#movie_release_date_insert').datetimepicker({
		locale: 'es',
		viewMode: 'years',
		format: 'YYYY',
		maxDate: 'now' 
	});	

	$('#movie_duration_insert').datetimepicker({
		locale: 'es',
		format: 'HH:mm'
	});

	$('#movie_release_date_update').datetimepicker({
		locale: 'es',
		viewMode: 'years',
		format: 'YYYY',
		maxDate: 'now' 
	});
	$('#movie_duration_update').datetimepicker({
		locale: 'es',
		format: 'HH:mm'
	});
});