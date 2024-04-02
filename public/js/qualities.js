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

	if ($('#table-qualities').length > 0) {
		let table_qualities = $('#table-qualities').DataTable({
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
		table_qualities.buttons().container().appendTo('#buttons-exports-qualities .col-sm-6:eq(0)');
	}

	/*========================================
	=            Functions Insert            =
	========================================*/

	/**
	* [description]
	* @param  {String} event) {		var       string [description]
	* @return {[type]}        [description]
	*/
	$("#quality_name_insert").keyup(function (event) {
		var string = '';
		string = string + $("#quality_name_insert").val();

		$("#quality_slug_insert").val(create_slug(string));
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-insert-quality").attr('disabled', true);			$("#btn-insert-quality").html('<i                                                                    class [description]
	* @param  {String} success:                                       function(response){			$("#btn-insert-quality").removeAttr('disabled');			$("#btn-insert-quality").html('<span class [description]
	* @return {[type]}                                                [description]
	*/
	$("#form-insert-quality").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-insert-quality").attr('disabled', true);
			$("#btn-insert-quality").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-insert-quality").removeAttr('disabled');
			$("#btn-insert-quality").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

			if (response == "Already") {
				swal(
					'Duplicado',
					'Los datos de la calidad que intenta ingresar ya se encuentran en el sistema',
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
					'La calidad ha sido insertada con éxito',
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
	$("#quality_name_update").keyup(function (event) {
		var string = '';
		string = string + $("#quality_name_update").val();

		$("#quality_slug_update").val(create_slug(string));
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-update-quality").attr('disabled', true);			$("#btn-update-quality").html('<i                                                                    class [description]
	* @param  {String} success:                                       function(response){			$("#btn-update-quality").removeAttr('disabled');			$("#btn-update-quality").html('<span class [description]
	* @return {[type]}                                                [description]
	*/
	$("#form-update-quality").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-update-quality").attr('disabled', true);
			$("#btn-update-quality").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-update-quality").removeAttr('disabled');
			$("#btn-update-quality").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

			if (response == "Already") {
				swal(
					'Duplicado',
					'Los datos de la calidad que intenta ingresar ya se encuentran en el sistema',
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
					'La calidad ha sido actualizada con éxito',
					'success'
				);
			}
		}
	});

	/*=====  End of Functions Update  ======*/

	/*========================================
	=            Functions Delete            =
	========================================*/

	/**
	* [description]
	* @param  {[type]} event){		var id_user                     [description]
	* @param  {[type]} url:          'delete/'                   [description]
	* @param  {[type]} type:         'post'                      [description]
	* @param  {[type]} success:      function(response){					if (response     [description]
	* @return {[type]}               [description]
	*/
	$(".btn-delete-quality").click(function (event) {
		var id_quality = $(this).attr('id');

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
				data: { id_quality_delete: id_quality },
				url: 'delete/',
				type: 'post',
				success: function (response) {
					if (response == "Missing") {
						swal(
							'No encontrado',
							'La calidad ha eliminar no coincide con alguno de nuestros registros',
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
							'La calidad fue eliminada con éxito',
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