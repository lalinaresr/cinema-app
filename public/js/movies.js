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

	if ($('#table-movies').length > 0) {
		let table_movies = $('#table-movies').DataTable({
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
		table_movies.buttons().container().appendTo('#buttons-exports-movies .col-sm-6:eq(0)');
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

	if ($('#ids_productors_insert').length > 0) {
		$('#ids_productors_insert').multiselect(productors);
	}
	if ($('#ids_genders_insert').length > 0) {
		$('#ids_genders_insert').multiselect(genders);
	}
	if ($('#ids_categorys_insert').length > 0) {
		$('#ids_categorys_insert').multiselect(categories);
	}
	if ($('#ids_productors_update').length > 0) {
		$('#ids_productors_update').multiselect(productors);
	}
	if ($('#ids_genders_update').length > 0) {
		$('#ids_genders_update').multiselect(genders);
	}
	if ($('#ids_categorys_update').length > 0) {
		$('#ids_categorys_update').multiselect(categories);
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

	if ($('#movie_release_date_insert').length > 0) {
		$('#movie_release_date_insert').datetimepicker(release);
	}
	if ($('#movie_release_date_update').length > 0) {
		$('#movie_release_date_update').datetimepicker(release);
	}
	if ($('#movie_duration_insert').length > 0) {
		$('#movie_duration_insert').datetimepicker(duration);
	}
	if ($('#movie_duration_update').length > 0) {
		$('#movie_duration_update').datetimepicker(duration);
	}


	/*========================================
	=            Functions Insert            =
	========================================*/

	/**
	* [description]
	* @param  {String} event) {		var       string [description]
	* @return {[type]}        [description]
	*/
	$("#movie_name_insert").keyup(function (event) {
		var string = '';
		string = string + $("#movie_name_insert").val();

		$("#movie_slug_insert").val(create_slug(string));
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
				$('#preview-img-cover').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#preview-img-cover').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
				console.log(sizeKB);
			} else {
				$('#preview-img-cover').addClass("hidden");
				$('#movie_cover_insert').val('');
				swal(
					'Aviso',
					'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					'error'
				);
			}
		} else {
			$('#preview-img-cover').addClass("hidden");
			$('#movie_cover_insert').val('');
			swal(
				'Aviso',
				'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				'error'
			);
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-insert-movie").attr('disabled', true);			$("#btn-insert-movie").html('<i                                                                   class [description]
	* @param  {String} success:                                      function(response){			$("#btn-insert-movie").removeAttr('disabled');			$("#btn-insert-movie").html('<span class [description]
	* @return {[type]}                                               [description]
	*/
	$("#form-insert-movie").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-insert-movie").attr('disabled', true);
			$("#btn-insert-movie").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-insert-movie").removeAttr('disabled');
			$("#btn-insert-movie").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

			if (response == "Already") {
				swal(
					'Duplicado',
					'Los datos de la película que intenta ingresar ya se encuentran en el sistema',
					'warning'
				);
			} else if (response == "Error") {
				swal(
					'Oops',
					'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					'error'
				);
			} else if (response == "Success") {
				swal(
					'Éxito',
					'La película ha sido insertada con éxito',
					'success'
				);
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
	$("#movie_name_update").keyup(function (event) {
		var string = '';
		string = string + $("#movie_name_update").val();

		$("#movie_slug_update").val(create_slug(string));
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
				$('#preview-img-cover').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#preview-img-cover').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
				console.log(sizeKB);
			} else {
				$('#preview-img-cover').addClass("hidden");
				$('#movie_cover_update').val('');
				swal(
					'Aviso',
					'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					'error'
				);
			}
		} else {
			$('#preview-img-cover').addClass("hidden");
			$('#movie_cover_update').val('');
			swal(
				'Aviso',
				'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				'error'
			);
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-update-movie").attr('disabled', true);			$("#btn-update-movie").html('<i                                                                   class [description]
	* @param  {String} success:                                      function(response){			$("#btn-update-movie").removeAttr('disabled');			$("#btn-update-movie").html('<span class [description]
	* @return {[type]}                                               [description]
	*/
	$("#form-update-movie").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-update-movie").attr('disabled', true);
			$("#btn-update-movie").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-update-movie").removeAttr('disabled');
			$("#btn-update-movie").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

			if (response == "Already") {
				swal(
					'Duplicado',
					'Los datos de la película que intenta ingresar ya se encuentran en el sistema',
					'warning'
				);
			} else if (response == "Error") {
				swal(
					'Oops',
					'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					'error'
				);
			} else if (response == "Success") {
				swal(
					'Éxito',
					'La película ha sido actualizada con éxito',
					'success'
				);
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
	$('#movie_cover_customize').change(function () {
		var fileName = $('#movie_cover_customize').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				$("#file_name_cover_customize").val(fileName);
				$("#file_size_cover_customize").val('KB: ' + sizeKB);
				$("#file_extension_cover_customize").val(extensionLower);
				$("#file_route_cover_customize").val('storage/images/movies/');
				$('#image-cover-current').addClass("hidden");
				$('#preview-img-cover').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#preview-img-cover').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
				console.log(sizeKB);
			} else {
				$("#file_name_cover_customize").val('');
				$("#file_size_cover_customize").val('');
				$("#file_extension_cover_customize").val('');
				$("#file_route_cover_customize").val('');
				$('#preview-img-cover').addClass("hidden");
				$('#image-cover-current').removeClass("hidden");
				$('#movie_cover_customize').val('');
				swal(
					'Aviso',
					'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					'error'
				);
			}
		} else {
			$("#file_name_cover_customize").val('');
			$("#file_size_cover_customize").val('');
			$("#file_extension_cover_customize").val('');
			$("#file_route_cover_customize").val('');
			$('#preview-img-cover').addClass("hidden");
			$('#image-cover-current').removeClass("hidden");
			$('#movie_cover_customize').val('');
			swal(
				'Aviso',
				'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				'error'
			);
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-update-cover").attr('disabled', true);			$("#btn-update-cover").html('<i                                                                   class [description]
	* @param  {String} success:                                      function(response){			$("#btn-update-cover").removeAttr('disabled');			$("#btn-update-cover").html('<span class [description]
	* @return {[type]}                                               [description]
	*/
	$("#form-update-cover").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-update-cover").attr('disabled', true);
			$("#btn-update-cover").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-update-cover").removeAttr('disabled');
			$("#btn-update-cover").html('<span class="glyphicon glyphicon-upload"></span> Cambiar');

			if (response == "Error") {
				swal(
					'Oops',
					'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					'error'
				);
			} else if (response == "Success") {
				swal(
					'Éxito',
					'La portada fue actualizada con éxito',
					'success'
				);
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
	$(".btn-delete-movie").click(function (event) {
		var id_movie = $(this).attr('id');

		swal({
			title: '¿Estas segur@?',
			text: '¡No podrás revertir esto!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#5BC0DE',
			cancelButtonColor: '#D9534F',
			confirmButtonText: '<span class="glyphicon glyphicon-trash"></span> Si, eliminar',
			cancelButtonText: '<span class="glyphicon glyphicon-remove-circle"></span> Cancelar',
			confirmButtonClass: 'btn btn-info',
			cancelButtonClass: 'btn btn-danger'
			/* buttonsStyling: false */
		}).then(function () {
			$.ajax({
				data: { id_movie_delete: id_movie },
				url: 'delete/',
				type: 'post',
				success: function (response) {
					if (response == "Missing") {
						swal(
							'No encontrado',
							'La película ha eliminar no coincide con alguno de nuestros registros',
							'error'
						);
					} else if (response == "Error") {
						swal(
							'Oops',
							'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
							'error'
						);
					} else if (response == "Success") {
						swal(
							'Éxito',
							'La película fue eliminada con éxito',
							'success'
						);
					}
				}
			});
		}, function (dismiss) {
			swal(
				'Recordatorio',
				'Recuerda que eliminar un registro es una acción que no podrá deshacerse',
				'info'
			);
		});
	});

	/*=====  End of Functions Delete  ======*/
});