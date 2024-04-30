jQuery(document).ready(function ($) {

	/*==========================================
	=            Functions Specials            =
	==========================================*/

	/**
	* [create_slug description]
	* @param  {[type]} data [description]
	* @return {[type]}      [description]
	*/
	function create_slug(data) {
		var string = '';
		for (var i = 0; i < data.length; i++) {
			if (data.charAt(i) == ' ') {
				string = string + data.charAt(i).replace(' ', '');
			} else {
				string = string + data.charAt(i);
			}
		}
		return cleaned_string(string.toLowerCase());
	}

	/**
	* [cleaned_string description]
	* @param  {[type]} stringEnd [description]
	* @return {[type]}           [description]
	*/
	function cleaned_string(stringEnd) {
		/* We define the characters that we want to remove */
		var charsToRemove = "!@#$^&%*()+=[]\/{}|:<>?,.";

		/* I'll delete the characters */
		for (var i = 0; i < charsToRemove.length; i++) {
			stringEnd = stringEnd.replace(new RegExp("\\" + charsToRemove[i], 'gi'), '');
		}

		/* We removed accents and "ñ". Note that the first parameter is without quotes */
		stringEnd = stringEnd.replace(/á/gi, "a");
		stringEnd = stringEnd.replace(/é/gi, "e");
		stringEnd = stringEnd.replace(/í/gi, "i");
		stringEnd = stringEnd.replace(/ó/gi, "o");
		stringEnd = stringEnd.replace(/ú/gi, "u");
		stringEnd = stringEnd.replace(/ñ/gi, "n");

		return stringEnd;
	}

	/**
	* Converts a text from the form 2017-01-10 to the form 10/01/2017	*
	* @param {string} Text of the form 2017-01-10
	* @return {string} Text of the form 10/01/2017
	*/
	function date_format(date) { return date.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3/$2/$1'); }

	/**
	* [generate_rand_code description]
	* @param  {[type]} longitud [description]
	* @return {[type]}          [description]
	*/
	function generate_rand_code(longitud) {
		var chars = "0123456789abcdefABCDEF?&#191;&#161;!:;";
		var code = "";
		/* &lt;(menor que - less that) = <    &gt;(mayor que - great that) = > */
		for (var x = 0; x < longitud; x++) {
			rand = Math.floor(Math.random() * chars.length);
			code += chars.substr(rand, 1);
		}
		return code.toLowerCase();
	}

	/*=====  End of Functions Specials  ======*/

	if ($('#users-table').length > 0) {
		let users_table = $('#users-table').DataTable({
			language: {
				"sProcessing": "Procesando...",
				"sLengthMenu": "Mostrar _MENU_ registros",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "Ningún dato disponible en esta tabla",
				"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "Buscar:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Último",
					"sNext": "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				},
			},
			lengthChange: false,
			buttons: [
				{ "extend": 'excel', "text": '<i class="fa fa-file-excel-o" aria-hidden="true"></i> XLSX', "className": 'btn btn-success' },
				{ "extend": 'pdf', "text": '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF', "className": 'btn btn-danger' },
				{ "extend": 'csv', "text": '<i class="fa fa-file-excel-o" aria-hidden="true"></i> CSV', "className": 'btn btn-success' }
			]
		});
		users_table.buttons().container().appendTo('.col-sm-6:eq(0)');
	}

	let birthday = {
		locale: 'es',
		viewMode: 'years',
		format: 'YYYY-MM-DD',
		maxDate: 'now'
	};

	if ($('#user_date_birthday_insert').length > 0) {
		$('#user_date_birthday_insert').datetimepicker(birthday);
	}
	if ($('#user_date_birthday_update').length > 0) {
		$('#user_date_birthday_update').datetimepicker(birthday);
	}

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-info",
			cancelButton: "btn btn-default"
		},
		buttonsStyling: false
	});

	/*========================================
	=            Functions Insert            =
	========================================*/

	/**
	* [description]
	* @param  {[type]} event) {		event.preventDefault();		var firstname [description]
	* @return {[type]}        [description]
	*/
	$("#user_firstname_insert").keyup(function (event) {
		event.preventDefault();

		var firstname = $(this).val();
		var lastname = $("#user_lastname_insert").val();

		if (firstname.length > 0 && lastname.length > 0) {
			$("#user_username_insert").val(create_slug(firstname) + ' ' + create_slug(lastname));
			$("#user_email_insert").val(create_slug(firstname.toLowerCase()) + '_' + create_slug(lastname.toLowerCase()) + '@yopmail.com');
			$("#user_password_insert").val(generate_rand_code((firstname.length + lastname.length)));
		}
	});

	/**
	* [description]
	* @param  {[type]} event) {		event.preventDefault();		var firstname [description]
	* @return {[type]}        [description]
	*/
	$("#user_lastname_insert").keyup(function (event) {
		event.preventDefault();

		var firstname = $("#user_firstname_insert").val();
		var lastname = $(this).val();

		if (firstname.length > 0 && lastname.length > 0) {
			$("#user_username_insert").val(create_slug(firstname) + ' ' + create_slug(lastname));
			$("#user_email_insert").val(create_slug(firstname.toLowerCase()) + '_' + create_slug(lastname.toLowerCase()) + '@yopmail.com');
			$("#user_password_insert").val(generate_rand_code((firstname.length + lastname.length)));
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-insert-user").attr('disabled', true);			$("#btn-insert-user").html('<i                                                                  class [description]
	* @param  {String} success:                                     function(response){			$("#btn-insert-user").removeAttr('disabled');			$("#btn-insert-user").html('<span class [description]
	* @return {[type]}                                              [description]
	*/
	$("#form-insert-user").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-insert-user").attr('disabled', true);
			$("#btn-insert-user").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-insert-user").removeAttr('disabled');
			$("#btn-insert-user").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

			if (response == 'existing') {
				swalWithBootstrapButtons.fire({
					title: 'Duplicado',
					text: 'Los datos del usuario que intenta ingresar ya se encuentran en el sistema',
					icon: 'warning'
				});
			} else if (response == 'error') {
				swalWithBootstrapButtons.fire({
					title: 'Oops',
					text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					icon: 'error'
				});
			} else if (response == 'success') {
				swalWithBootstrapButtons.fire({
					title: 'Éxito',
					text: 'El usuario ha sido insertado con éxito',
					icon: 'success'
				});
			}
		}
	});

	/*=====  End of Functions Insert  ======*/

	/*========================================
	=            Functions Update            =
	========================================*/

	/**
	* [description]
	* @param  {[type]} event) {		event.preventDefault();		var firstname [description]
	* @return {[type]}        [description]
	*/
	$("#user_firstname_update").keyup(function (event) {
		event.preventDefault();

		var firstname = $(this).val();
		var lastname = $("#user_lastname_update").val();

		if (firstname.length > 0 && lastname.length > 0) {
			$("#user_username_update").val(create_slug(firstname) + ' ' + create_slug(lastname));
			$("#user_email_update").val(create_slug(firstname.toLowerCase()) + '_' + create_slug(lastname.toLowerCase()) + '@yopmail.com');
			$("#user_password_update").val(generate_rand_code((firstname.length + lastname.length)));
		}
	});

	/**
	* [description]
	* @param  {[type]} event) {		event.preventDefault();		var firstname [description]
	* @return {[type]}        [description]
	*/
	$("#user_lastname_update").keyup(function (event) {
		event.preventDefault();

		var firstname = $("#user_firstname_update").val();
		var lastname = $(this).val();

		if (firstname.length > 0 && lastname.length > 0) {
			$("#user_username_update").val(create_slug(firstname) + ' ' + create_slug(lastname));
			$("#user_email_update").val(create_slug(firstname.toLowerCase()) + '_' + create_slug(lastname.toLowerCase()) + '@yopmail.com');
			$("#user_password_update").val(generate_rand_code((firstname.length + lastname.length)));
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-update-user").attr('disabled', true);			$("#btn-update-user").html('<i                                                                  class [description]
	* @param  {String} success:                                     function(response){			$("#btn-update-user").removeAttr('disabled');			$("#btn-update-user").html('<span class [description]
	* @return {[type]}                                              [description]
	*/
	$("#form-update-user").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-update-user").attr('disabled', true);
			$("#btn-update-user").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-update-user").removeAttr('disabled');
			$("#btn-update-user").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

			if (response == 'existing') {
				swalWithBootstrapButtons.fire({
					title: 'Duplicado',
					text: 'Los datos del usuario que intenta ingresar ya se encuentran en el sistema',
					icon: 'warning'
				});
			} else if (response == 'error') {
				swalWithBootstrapButtons.fire({
					title: 'Oops',
					text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					icon: 'error'
				});
			} else if (response == 'success') {
				swalWithBootstrapButtons.fire({
					title: 'Éxito',
					text: 'El usuario ha sido actualizado con éxito',
					icon: 'success'
				});
			}
		}
	});

	/*=====  End of Functions Update  ======*/

	/*===============================================
	=            Functions Update Avatar            =
	===============================================*/

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#user_avatar_customize').change(function () {
		var fileName = $('#user_avatar_customize').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				$("#file_name_avatar_customize").val(fileName);
				$("#file_size_avatar_customize").val('KB: ' + sizeKB);
				$("#file_extension_avatar_customize").val(extensionLower);
				$("#file_route_avatar_customize").val('storage/images/users/');
				$('#image-avatar-current').addClass("hidden");
				$('#preview-img-avatar').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#preview-img-avatar').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			} else {
				$('#preview-img-avatar').addClass("hidden");
				$('#image-avatar-current').removeClass("hidden");
				$('#user_avatar_customize').val('');
				$("#file_name_avatar_customize").val('');
				$("#file_size_avatar_customize").val('');
				$("#file_extension_avatar_customize").val('');
				$("#file_route_avatar_customize").val('');

				swalWithBootstrapButtons.fire({
					title: 'Aviso',
					text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					icon: 'error'
				});
			}
		} else {
			$('#preview-img-avatar').addClass("hidden");
			$('#image-avatar-current').removeClass("hidden");
			$('#user_avatar_customize').val('');
			$("#file_name_avatar_customize").val('');
			$("#file_size_avatar_customize").val('');
			$("#file_extension_avatar_customize").val('');
			$("#file_route_avatar_customize").val('');

			swalWithBootstrapButtons.fire({
				title: 'Aviso',
				text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				icon: 'error'
			});
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-update-avatar").attr('disabled', true);			$("#btn-update-avatar").html('<i                                                                    class [description]
	* @param  {String} success:                                       function(response){			$("#btn-update-avatar").removeAttr('disabled');			$("#btn-update-avatar").html('<span class [description]
	* @return {[type]}                                                [description]
	*/
	$("#form-update-avatar").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-update-avatar").attr('disabled', true);
			$("#btn-update-avatar").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-update-avatar").removeAttr('disabled');
			$("#btn-update-avatar").html('<span class="glyphicon glyphicon-upload"></span> Cambiar');

			if (response == 'error') {
				swalWithBootstrapButtons.fire({
					title: 'Oops',
					text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					icon: 'error'
				});
			} else if (response == 'success') {
				swalWithBootstrapButtons.fire({
					title: 'Éxito',
					text: 'Su avatar ha sido actualizado con éxito',
					icon: 'success'
				});
			}
		}
	});

	/*=====  End of Functions Update Avatar  ======*/

	/*========================================
	=            Functions Delete            =
	========================================*/

	/**
	* [description]
	* @param  {[type]} event){		event.preventDefault();		var id_user                     [description]
	* @param  {[type]} url:                                   $(this).attr('href')        [description]
	* @param  {[type]} type:                                  'post'                      [description]
	* @param  {[type]} success:                               function(response){					if (response     [description]
	* @return {[type]}                                        [description]
	*/
	$(".btn-delete-user").click(function (event) {
		var id_user = $(this).attr('id');

		swalWithBootstrapButtons.fire({
			title: '¿Estas segur@?',
			text: '¡No podrás revertir esto!',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<span class="glyphicon glyphicon-trash"></span> Si, eliminar',
			cancelButtonText: '<span class="glyphicon glyphicon-remove-circle"></span> Cancelar',
			reverseButtons: true
		}).then(result => {
			if (result.isConfirmed) {
				$.ajax({
					data: { id_user_delete: id_user },
					url: 'delete/',
					type: 'post',
					success: function (response) {
						if (response == 'not-found') {
							swalWithBootstrapButtons.fire({
								title: 'No encontrado',
								text: 'El usuario ha eliminar no coincide con alguno de nuestros registros',
								icon: 'warning'
							});
						} else if (response == 'error') {
							swalWithBootstrapButtons.fire({
								title: 'Oops',
								text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
								icon: 'error'
							});
						} else if (response == 'success') {
							swalWithBootstrapButtons.fire({
								title: 'Éxito',
								text: 'El usuario fue eliminado con éxito',
								icon: 'success'
							});
						}
					}
				});
			} else if (
				/* Read more about handling dismissals below */
				result.dismiss === Swal.DismissReason.cancel
			) {
				swalWithBootstrapButtons.fire({
					title: 'Recordatorio',
					text: 'Recuerda que eliminar un registro es una acción que no podrá deshacerse',
					icon: 'info'
				});
			}
		});
	});

	/*=====  End of Functions Delete  ======*/
});