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
	$("#productor_name_insert").keyup(function (event) {
		var string = '';
		string = string + $("#productor_name_insert").val();

		$("#productor_slug_insert").val(create_slug(string));
	});

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#productor_image_logo_insert').change(function () {
		var fileName = $('#productor_image_logo_insert').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				$("#modal-productor-image-logo").modal('show');
				$('#preview-img-logo').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#preview-img-logo').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
				console.log(sizeKB);
			} else {
				$('#preview-img-logo').addClass("hidden");
				$('#productor_image_logo_insert').val('');
				swal(
					'Aviso',
					'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					'error'
				);
			}
		} else {
			$('#preview-img-logo').addClass("hidden");
			$('#productor_image_logo_insert').val('');
			swal(
				'Aviso',
				'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				'error'
			);
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-insert-productor").attr('disabled', true);			$("#btn-insert-productor").html('<i                                                                       class [description]
	* @param  {String} success:                                          function(response){			$("#btn-insert-productor").removeAttr('disabled');			$("#btn-insert-productor").html('<span class [description]
	* @return {[type]}                                                   [description]
	*/
	$("#form-insert-productor").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-insert-productor").attr('disabled', true);
			$("#btn-insert-productor").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-insert-productor").removeAttr('disabled');
			$("#btn-insert-productor").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

			if (response == "Already") {
				swal(
					'Duplicado',
					'Los datos del productor que intenta ingresar ya se encuentran en el sistema',
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
					'El productor ha sido insertado con éxito',
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
	$("#productor_name_update").keyup(function (event) {
		var string = '';
		string = string + $("#productor_name_update").val();

		$("#productor_slug_update").val(create_slug(string));
	});

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#productor_image_logo_update').change(function () {
		var fileName = $('#productor_image_logo_update').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				$("#modal-productor-image-logo").modal('show');
				$('#preview-img-logo').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#preview-img-logo').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
				console.log(sizeKB);
			} else {
				$('#preview-img-logo').addClass("hidden");
				$('#productor_image_logo_update').val('');
				swal(
					'Aviso',
					'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					'error'
				);
			}
		} else {
			$('#preview-img-logo').addClass("hidden");
			$('#productor_image_logo_update').val('');
			swal(
				'Aviso',
				'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				'error'
			);
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-update-productor").attr('disabled', true);			$("#btn-update-productor").html('<i                                                                       class [description]
	* @param  {String} success:                                          function(response){			$("#btn-update-productor").removeAttr('disabled');			$("#btn-update-productor").html('<span class [description]
	* @return {[type]}                                                   [description]
	*/
	$("#form-update-productor").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-update-productor").attr('disabled', true);
			$("#btn-update-productor").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-update-productor").removeAttr('disabled');
			$("#btn-update-productor").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

			if (response == "Already") {
				swal(
					'Duplicado',
					'Los datos del productor que intenta ingresar ya se encuentran en el sistema',
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
					'El productor ha sido actualizado con éxito',
					'success'
				);
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
	$('#productor_image_logo_customize').change(function () {
		var fileName = $('#productor_image_logo_customize').val();
		var extension = fileName.split('.').pop();
		var extensionLower = extension.toLowerCase();
		var sizeKB = (this.files[0].size) / 1024;

		if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') {
			if (sizeKB < 2048) {
				$("#file_name_logo_customize").val(fileName);
				$("#file_size_logo_customize").val('KB: ' + sizeKB);
				$("#file_extension_logo_customize").val(extensionLower);
				$("#file_route_logo_customize").val('storage/images/productors/');
				$('#image-logo-current').addClass("hidden");
				$('#preview-img-logo').removeClass("hidden");
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#preview-img-logo').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
				console.log(sizeKB);
			} else {
				$('#preview-img-logo').addClass("hidden");
				$('#image-logo-current').removeClass("hidden");
				$("#productor_image_logo_customize").val('');
				$("#file_name_logo_customize").val('');
				$("#file_size_logo_customize").val('');
				$("#file_extension_logo_customize").val('');
				$("#file_route_logo_customize").val('');
				swal(
					'Aviso',
					'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
					'error'
				);
			}
		} else {
			$('#preview-img-logo').addClass("hidden");
			$('#image-logo-current').removeClass("hidden");
			$('#productor_image_logo_customize').val('');
			$("#file_name_logo_customize").val('');
			$("#file_size_logo_customize").val('');
			$("#file_extension_logo_customize").val('');
			$("#file_route_logo_customize").val('');
			swal(
				'Aviso',
				'Ha habido un problema con la imagen recuerda que debe pesar menos de 2MB y ser PNG | JPG | JPEG',
				'error'
			);
		}
	});

	/**
	* [beforeSend description]
	* @param  {String} ){			$("#btn-update-logo").attr('disabled', true);			$("#btn-update-logo").html('<i                                                                  class [description]
	* @param  {String} success:                                     function(response){			$("#btn-update-logo").removeAttr('disabled');			$("#btn-update-logo").html('<span class [description]
	* @return {[type]}                                              [description]
	*/
	$("#form-update-logo").ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		beforeSend: function () {
			$("#btn-update-logo").attr('disabled', true);
			$("#btn-update-logo").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
		},
		success: function (response) {
			$("#btn-update-logo").removeAttr('disabled');
			$("#btn-update-logo").html('<span class="glyphicon glyphicon-upload"></span> Cambiar');

			if (response == "Error") {
				swal(
					'Oops',
					'Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo nuevamente',
					'error'
				);
			} else if (response == "Success") {
				swal(
					'Éxito',
					'El logo fue actualizado con éxito',
					'success'
				);
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
	$(".btn-delete-productor").click(function (event) {
		var id_productor = $(this).attr('id');

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
				data: { id_productor_delete: id_productor },
				url: 'delete/',
				type: 'post',
				success: function (response) {
					if (response == "Missing") {
						swal(
							'No encontrado',
							'El productor ha eliminar no coincide con alguno de nuestros registros',
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
							'El productor fue eliminado con éxito',
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