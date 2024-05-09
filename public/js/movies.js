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
				string = string + data.charAt(i).replace(' ', '-');
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

	/*=====  End of Functions Specials  ======*/

	if ($('#movies-table').length > 0) {
		let movies_table = $('#movies-table').DataTable({
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
		movies_table.buttons().container().appendTo('.col-sm-6:eq(0)');
		movies_table.column('4').order('desc').draw();
	}

	let productors = {
		nonSelectedText: 'Seleccione productores',
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		buttonWidth: '100%',
		filterPlaceholder: 'Buscar...',
	};

	let genders = {
		nonSelectedText: 'Seleccione géneros',
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		buttonWidth: '100%',
		filterPlaceholder: 'Buscar...',
	};

	let categories = {
		nonSelectedText: 'Seleccione categorías',
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		buttonWidth: '100%',
		filterPlaceholder: 'Buscar...',
	};

	if ($('#productors').length > 0) {
		$('#productors').multiselect(productors);
	}
	if ($('#genders').length > 0) {
		$('#genders').multiselect(genders);
	}
	if ($('#categories').length > 0) {
		$('#categories').multiselect(categories);
	}
	if ($('#productors').length > 0) {
		$('#productors').multiselect(productors);
	}
	if ($('#genders').length > 0) {
		$('#genders').multiselect(genders);
	}
	if ($('#categories').length > 0) {
		$('#categories').multiselect(categories);
	}

	let release = {
		locale: 'es',
		viewMode: 'years',
		format: 'YYYY',
		maxDate: 'now'
	};

	let duration = {
		locale: 'es',
		format: 'HH:mm'
	};

	if ($('#release_date').length > 0) {
		$('#release_date').datetimepicker(release);
	}
	if ($('#release_date').length > 0) {
		$('#release_date').datetimepicker(release);
	}
	if ($('#duration').length > 0) {
		$('#duration').datetimepicker(duration);
	}
	if ($('#duration').length > 0) {
		$('#duration').datetimepicker(duration);
	}

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-custom",
			cancelButton: "btn btn-default"
		},
		buttonsStyling: false
	});

	/*========================================
	=            Functions Insert            =
	========================================*/

	/**
	* [description]
	* @param  {String} event) {		var       string [description]
	* @return {[type]}        [description]
	*/
	$("#title").keyup(function (event) {
		var string = '';
		string = string + $("#title").val();

		$("#slug").val(create_slug(string));
	});

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#movie_cover_insert').change(function () {
		var fileName = $('#movie_cover_insert').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				$("#modal-movie-cover").modal('show');
				$('#cover-preview-image').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#cover-preview-image').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			} else {
				$('#cover-preview-image').addClass("hidden");
				$('#movie_cover_insert').val('');

				swalWithBootstrapButtons.fire({
					title: 'Aviso',
					text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					icon: 'error'
				});
			}
		} else {
			$('#cover-preview-image').addClass("hidden");
			$('#movie_cover_insert').val('');

			swalWithBootstrapButtons.fire({
				title: 'Aviso',
				text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				icon: 'error'
			});
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#movie-store-btn").attr('disabled', true);			$("#movie-store-btn").html('<i                                                                   class [description]
	* @param  {String} success:                                      function(response){			$("#movie-store-btn").removeAttr('disabled');			$("#movie-store-btn").html('<span class [description]
	* @return {[type]}                                               [description]
	*/
	$("#movie-store-form").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#movie-store-btn").attr('disabled', true);
			$("#movie-store-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#movie-store-btn").removeAttr('disabled');
			$("#movie-store-btn").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

			if (response == 'existing') {
				swalWithBootstrapButtons.fire({
					title: 'Duplicado',
					text: 'Los datos de la película que intenta ingresar ya se encuentran en el sistema',
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
					text: 'La película ha sido insertada con éxito',
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
	* @param  {String} event) {		var       string [description]
	* @return {[type]}        [description]
	*/
	$("#title").keyup(function (event) {
		var string = '';
		string = string + $("#title").val();

		$("#slug").val(create_slug(string));
	});

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#movie_cover_update').change(function () {
		var fileName = $('#movie_cover_update').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				$("#modal-movie-cover").modal('show');
				$('#cover-preview-image').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#cover-preview-image').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			} else {
				$('#cover-preview-image').addClass("hidden");
				$('#movie_cover_update').val('');

				swalWithBootstrapButtons.fire({
					title: 'Aviso',
					text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					icon: 'error'
				});
			}
		} else {
			$('#cover-preview-image').addClass("hidden");
			$('#movie_cover_update').val('');

			swalWithBootstrapButtons.fire({
				title: 'Aviso',
				text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				icon: 'error'
			});
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#movie-update-btn").attr('disabled', true);			$("#movie-update-btn").html('<i                                                                   class [description]
	* @param  {String} success:                                      function(response){			$("#movie-update-btn").removeAttr('disabled');			$("#movie-update-btn").html('<span class [description]
	* @return {[type]}                                               [description]
	*/
	$("#movie-update-form").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#movie-update-btn").attr('disabled', true);
			$("#movie-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#movie-update-btn").removeAttr('disabled');
			$("#movie-update-btn").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

			if (response == 'existing') {
				swalWithBootstrapButtons.fire({
					title: 'Duplicado',
					text: 'Los datos de la película que intenta ingresar ya se encuentran en el sistema',
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
					text: 'La película ha sido actualizada con éxito',
					icon: 'success'
				});
			}
		}
	});

	/*=====  End of Functions Update  ======*/

	/*=============================================
	=            Functions Update Cover            =
	=============================================*/

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#cover').change(function () {
		var fileName = $('#cover').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#cover-preview-image').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			} else {
				$('#cover').val('');

				swalWithBootstrapButtons.fire({
					title: 'Aviso',
					text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					icon: 'error'
				});
			}
		} else {
			$('#cover').val('');

			swalWithBootstrapButtons.fire({
				title: 'Aviso',
				text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				icon: 'error'
			});
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#cover-update-btn").attr('disabled', true);			$("#cover-update-btn").html('<i                                                                   class [description]
	* @param  {String} success:                                      function(response){			$("#cover-update-btn").removeAttr('disabled');			$("#cover-update-btn").html('<span class [description]
	* @return {[type]}                                               [description]
	*/
	$("#cover-update-form").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#cover-update-btn").attr('disabled', true);
			$("#cover-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#cover-update-btn").removeAttr('disabled');
			$("#cover-update-btn").html('<span class="glyphicon glyphicon-upload"></span> Subir');

			if (response == 'error') {
				swalWithBootstrapButtons.fire({
					title: 'Oops',
					text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					icon: 'error'
				});
			} else if (response == 'success') {
				$('#cover').val('');
				
				swalWithBootstrapButtons.fire({
					title: 'Éxito',
					text: 'La portada fue actualizada con éxito',
					icon: 'success'
				});
			}
		}
	});

	/*=====  End of Functions Update Cover  ======*/

	/*========================================
	=            Functions Delete            =
	========================================*/

	/**
	* [description]
	* @param  {[type]} event){		var id_movie                    [description]
	* @param  {[type]} url:          'delete/'                   [description]
	* @param  {[type]} type:         'post'                      [description]
	* @param  {[type]} success:      function(response){					if (response     [description]
	* @return {[type]}               [description]
	*/
	$(".movie-delete-btn").click(function (event) {
		let movie = $(this).data('element');
		let url = `${location.href}/delete`;

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
					data: { movie },
					url,
					type: 'POST',
					success: function (response) {
						if (response == 'not-found') {
							swalWithBootstrapButtons.fire({
								title: 'No encontrado',
								text: 'La película ha eliminar no coincide con alguno de nuestros registros',
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
								text: 'La película fue eliminada con éxito',
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