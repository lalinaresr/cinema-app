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

	/*========================================
	=            Functions Insert            =
	========================================*/

	/**
	* [description]
	* @param  {String} event) {		var       string [description]
	* @return {[type]}        [description]
	*/
	$("#gender_name_insert").keyup(function (event) {
		var string = '';
		string = string + $("#gender_name_insert").val();

		$("#gender_slug_insert").val(create_slug(string));
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-insert-gender").attr('disabled', true);			$("#btn-insert-gender").html('<i                                                                    class [description]
	* @param  {String} success:                                       function(response){			$("#btn-insert-gender").removeAttr('disabled');			$("#btn-insert-gender").html('<span class [description]
	* @return {[type]}                                                [description]
	*/
	$("#form-insert-gender").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-insert-gender").attr('disabled', true);
			$("#btn-insert-gender").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-insert-gender").removeAttr('disabled');
			$("#btn-insert-gender").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

			if (response == "Already") {
				swal(
					'Duplicado',
					'Los datos del género que intenta ingresar ya se encuentran en el sistema',
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
					'El género ha sido insertado con éxito',
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
	$("#gender_name_update").keyup(function (event) {
		var string = '';
		string = string + $("#gender_name_update").val();

		$("#gender_slug_update").val(create_slug(string));
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-update-gender").attr('disabled', true);			$("#btn-update-gender").html('<i                                                                    class [description]
	* @param  {String} success:                                       function(response){			$("#btn-update-gender").removeAttr('disabled');			$("#btn-update-gender").html('<span class [description]
	* @return {[type]}                                                [description]
	*/
	$("#form-update-gender").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-update-gender").attr('disabled', true);
			$("#btn-update-gender").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-update-gender").removeAttr('disabled');
			$("#btn-update-gender").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

			if (response == "Already") {
				swal(
					'Duplicado',
					'Los datos del género que intenta ingresar ya se encuentran en el sistema',
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
					'El género ha sido actualizado con éxito',
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
	$(".btn-delete-gender").click(function (event) {
		var id_gender = $(this).attr('id');

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
				data: { id_gender_delete: id_gender },
				url: 'delete/',
				type: 'post',
				success: function (response) {
					if (response == "Missing") {
						swal(
							'No encontrado',
							'El genero ha eliminar no coincide con alguno de nuestros registros',
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
							'El género fue eliminado con éxito',
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