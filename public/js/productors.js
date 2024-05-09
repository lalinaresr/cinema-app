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

	if ($('#productors-table').length > 0) {
		let productors_table = $('#productors-table').DataTable({
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
		productors_table.buttons().container().appendTo('.col-sm-6:eq(0)');
		productors_table.column('3').order('desc').draw();
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
	$("#name").keyup(function (event) {
		var string = '';
		string = string + $("#name").val();

		$("#slug").val(create_slug(string));
	});
	
	/**
	* [beforeSend description]
	* @param  {String} ){			$("#productor-store-btn").attr('disabled', true);			$("#productor-store-btn").html('<i                                                                       class [description]
	* @param  {String} success:                                          function(response){			$("#productor-store-btn").removeAttr('disabled');			$("#productor-store-btn").html('<span class [description]
	* @return {[type]}                                                   [description]
	*/
	$("#productor-store-form").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#productor-store-btn").attr('disabled', true);
			$("#productor-store-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#productor-store-btn").removeAttr('disabled');
			$("#productor-store-btn").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

			if (response == 'existing') {
				swalWithBootstrapButtons.fire({
					title: 'Duplicado',
					text: 'Los datos del productor que intenta ingresar ya se encuentran en el sistema',
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
					text: 'El productor ha sido insertado con éxito',
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
	$("#name").keyup(function (event) {
		var string = '';
		string = string + $("#name").val();

		$("#slug").val(create_slug(string));
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#productor-update-btn").attr('disabled', true);			$("#productor-update-btn").html('<i                                                                       class [description]
	* @param  {String} success:                                          function(response){			$("#productor-update-btn").removeAttr('disabled');			$("#productor-update-btn").html('<span class [description]
	* @return {[type]}                                                   [description]
	*/
	$("#productor-update-form").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#productor-update-btn").attr('disabled', true);
			$("#productor-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#productor-update-btn").removeAttr('disabled');
			$("#productor-update-btn").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

			if (response == 'existing') {
				swalWithBootstrapButtons.fire({
					title: 'Duplicado',
					text: 'Los datos del productor que intenta ingresar ya se encuentran en el sistema',
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
					text: 'El productor ha sido actualizado con éxito',
					icon: 'success'
				});
			}
		}
	});

	/*=====  End of Functions Update  ======*/

	/*=============================================
	=            Functions Update Logo            =
	=============================================*/

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#logo').change(function () {
		var fileName = $('#logo').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#logo-preview-image').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			} else {
				$('#logo').val('');
				swalWithBootstrapButtons.fire({
					title: 'Aviso',
					text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					icon: 'error'
				});
			}
		} else {
			$('#logo').val('');
			swalWithBootstrapButtons.fire({
				title: 'Aviso',
				text: 'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				icon: 'error'
			});
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#logo-update-btn").attr('disabled', true);			$("#logo-update-btn").html('<i                                                                  class [description]
	* @param  {String} success:                                     function(response){			$("#logo-update-btn").removeAttr('disabled');			$("#logo-update-btn").html('<span class [description]
	* @return {[type]}                                              [description]
	*/
	$("#logo-update-form").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#logo-update-btn").attr('disabled', true);
			$("#logo-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#logo-update-btn").removeAttr('disabled');
			$("#logo-update-btn").html('<span class="glyphicon glyphicon-upload"></span> Subir');

			if (response == 'error') {
				swalWithBootstrapButtons.fire({
					title: 'Oops',
					text: 'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					icon: 'error'
				});
			} else if (response == 'success') {
				$('#logo').val('');
				swalWithBootstrapButtons.fire({
					title: 'Éxito',
					text: 'El logo fue actualizado con éxito',
					icon: 'success'
				});
			}
		}
	});

	/*=====  End of Functions Update Logo  ======*/

	/*========================================
	=            Functions Delete            =
	========================================*/

	/**
	* [description]
	* @param  {[type]} event){		var id_productor                [description]
	* @param  {[type]} url:          'delete/'                   [description]
	* @param  {[type]} type:         'post'                      [description]
	* @param  {[type]} success:      function(response){					if (response     [description]
	* @return {[type]}               [description]
	*/
	$(".productor-delete-btn").click(function (event) {
		let productor = $(this).data('element');
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
					data: { productor },
					url,
					type: 'POST',
					success: function (response) {
						if (response == 'not-found') {
							swalWithBootstrapButtons.fire({
								title: 'No encontrado',
								text: 'El productor ha eliminar no coincide con alguno de nuestros registros',
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
								text: 'El productor fue eliminado con éxito',
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