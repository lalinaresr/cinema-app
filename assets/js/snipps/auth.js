jQuery(document).ready(function($) {

	/*=======================================
	=            Functions Login            =
	=======================================*/
	
	/**
	* [beforeSend description]
	* @param  {String} ){			$("#icon-user-login").html('<i class                                                 [description]
	* @param  {String} success:                             function(response){			$("#icon-user-login").html('<i class         [description]
	* @return {[type]}                                      [description]
	*/
	$("#form-login").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function(){
			$("#icon-user-login").html('<i style="font-size: 10em;" class="fa fa-spinner fa-spin fa-fw"></i>');
			$("#btn-login").attr('disabled', true);
			$("#btn-login").html('Loading');
		},
		success: function(response){
			$("#icon-user-login").html('<i style="font-size: 10em;" class="fa fa-user-circle"></i>');
			$("#btn-login").removeAttr('disabled');
			$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> Sign in');

			if (response == "Missing") {
				swal(
					'User Missing',
				  	'No users found this data, check it and try again.',
				  	'warning'
				);
			} else if (response == "Error") {
				swal(
					'User Missing',
				  	'No users found this data, check it and try again.',
				  	'error'
				);
			} else if (response == "Success") {
				location.href="/dashboard/";
			}
		}
	});
	
	/*=====  End of Functions Login  ======*/
	
	/*========================================
	=            Functions Logout            =
	========================================*/
	
	/**
	* [description]
	* @param  {[type]} event){		event.preventDefault();		$.ajax({			url: $(this).attr('href'),			type: 'post',			success: function(response){				location.href [description]
	* @return {[type]}                                                     [description]
	*/
	$(".btn-logout").on('click', function(event){
		event.preventDefault();

		$.ajax({
			url: $(this).attr('href'),
			type: 'post',
			success: function(response){
				location.href=response;
			}
		});
	});	
	
	/*=====  End of Functions Logout  ======*/
});