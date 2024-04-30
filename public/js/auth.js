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
		type: 'POST',
		beforeSend: function () {
			$("#icon-user-login").html('<i style="font-size: 10em;" class="fa fa-spinner fa-spin fa-fw"></i>');
			$("#btn-login").attr('disabled', true);
			$("#btn-login").html('Procesando');
		},
		success: function (response) {
			$("#icon-user-login").html('<i style="font-size: 10em;" class="fa fa-user-circle"></i>');
			$("#btn-login").removeAttr('disabled');
			$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> Entrar');

			if (response == 'not-found' || response == 'not-match') {
				swalWithBootstrapButtons.fire({
					title: 'No encontrado',
					text: 'Las credenciales que ingresó no coinciden con alguno de nuestros registros.',
					icon: 'warning'
				});
			} else {
				location.href = "/dashboard";
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

		swalWithBootstrapButtons.fire({
			title: '¿Desea salir?',
			text: 'Para poder salir de la aplicación es necesario confirmar esta acción',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<span class="glyphicon glyphicon-log-out"></span> Si, salir',
			cancelButtonText: '<span class="glyphicon glyphicon-remove-circle"></span> Cancelar',
			reverseButtons: true
		}).then(result => {
			if (result.isConfirmed) {
				$.ajax({
					url: $(this).attr('href'),
					type: 'POST',
					success: function (response) {
						location.href = response;
					}
				});
			}
		});
	});
	/*=====  End of Functions Logout  ======*/
});