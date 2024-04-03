jQuery(document).ready(function ($) {

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-info",
			cancelButton: "btn btn-default"
		},
		buttonsStyling: false
	});

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
		beforeSend: function () {
			$("#icon-user-login").html('<i style="font-size: 10em;" class="fa fa-spinner fa-spin fa-fw"></i>');
			$("#btn-login").attr('disabled', true);
			$("#btn-login").html('Procesando');
		},
		success: function (response) {
			$("#icon-user-login").html('<i style="font-size: 10em;" class="fa fa-user-circle"></i>');
			$("#btn-login").removeAttr('disabled');
			$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> Entrar');

			if (response == "Missing") {
				swalWithBootstrapButtons.fire({
					title: 'No encontrado',
					text: 'Las credenciales que ha ingresado no coinciden con alguno de nuestros registros.',
					icon: 'warning'
				});
			} else if (response == "Error") {
				swalWithBootstrapButtons.fire({
					title: 'No encontrado',
					text: 'Las credenciales que ha ingresado no coinciden con alguno de nuestros registros.',
					icon: 'warning'
				});
			} else if (response == "Success") {
				location.href = "/dashboard/";
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
	$(".btn-logout").on('click', function (event) {
		event.preventDefault();

		$.ajax({
			url: $(this).attr('href'),
			type: 'post',
			success: function (response) {
				location.href = response;
			}
		});
	});

	/*=====  End of Functions Logout  ======*/
});