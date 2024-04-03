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

	if ($('#qualities-table').length > 0) {
		let qualities_table = $('#qualities-table').DataTable({
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
		qualities_table.buttons().container().appendTo('.col-sm-6:eq(0)');
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
				swalWithBootstrapButtons.fire({
					title: 'Duplicado',
					text: 'Los datos de la calidad que intenta ingresar ya se encuentran en el sistema',
					icon: 'warning'
				});
			} else if (response == "Error") {
				swalWithBootstrapButtons.fire({
					title: 'Oops',
					text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					icon: 'error'
				});
			} else if (response == "Success") {
				swalWithBootstrapButtons.fire({
					title: 'Éxito',
					text: 'La calidad ha sido insertada con éxito',
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
				swalWithBootstrapButtons.fire({
					title: 'Duplicado',
					text: 'Los datos de la calidad que intenta ingresar ya se encuentran en el sistema',
					icon: 'warning'
				});
			} else if (response == "Error") {
				swalWithBootstrapButtons.fire({
					title: 'Oops',
					text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					icon: 'error'
				});
			} else if (response == "Success") {
				swalWithBootstrapButtons.fire({
					title: 'Éxito',
					text: 'La calidad ha sido actualizada con éxito',
					icon: 'success'
				});
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
					data: { id_quality_delete: id_quality },
					url: 'delete/',
					type: 'post',
					success: function (response) {
						if (response == "Missing") {
							swalWithBootstrapButtons.fire({
								title: 'No encontrado',
								text: 'La calidad ha eliminar no coincide con alguno de nuestros registros',
								icon: 'warning'
							});
						} else if (response == "Error") {
							swalWithBootstrapButtons.fire({
								title: 'Oops',
								text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
								icon: 'error'
							});
						} else if (response == "Success") {
							swalWithBootstrapButtons.fire({
								title: 'Éxito',
								text: 'La calidad fue eliminada con éxito',
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