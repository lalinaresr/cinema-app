jQuery(document).ready(function($) {

	/*==========================================
	=            Functions Specials            =
	==========================================*/
	
	/**
	* [create_slug description]
	* @param  {[type]} data [description]
	* @return {[type]}      [description]
	*/
	function create_slug(data){
		var string = '';
		for (var i = 0; i < data.length; i++) {
			if (data.charAt(i) == ' ') {
				string = string + data.charAt(i).replace(' ', '-');
			}else{
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
	function cleaned_string(stringEnd){
	   	/* We define the characters that we want to remove */
	   	var charsToRemove = "!@#$^&%*()+=[]\/{}|:<>?,.";

	   	/* I'll delete the characters */
	   	for (var i = 0; i < charsToRemove.length; i++) {
	    	stringEnd = stringEnd.replace(new RegExp("\\" + charsToRemove[i], 'gi'), '');
	   	}   

	   	/* We removed accents and "ñ". Note that the first parameter is without quotes */
	   	stringEnd = stringEnd.replace(/á/gi,"a");
	   	stringEnd = stringEnd.replace(/é/gi,"e");
	   	stringEnd = stringEnd.replace(/í/gi,"i");
	   	stringEnd = stringEnd.replace(/ó/gi,"o");
	   	stringEnd = stringEnd.replace(/ú/gi,"u");
	   	stringEnd = stringEnd.replace(/ñ/gi,"n");

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
	$("#quality_name_insert").keyup(function(event) {
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
		beforeSend: function(){
			$("#btn-insert-quality").attr('disabled', true);
			$("#btn-insert-quality").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Loading');
		},
		success: function(response){
			$("#btn-insert-quality").removeAttr('disabled');
			$("#btn-insert-quality").html('<span class="glyphicon glyphicon-floppy-disk"></span> Save Quality');

			if (response == "Already") {
				swal(
					'Quality Already',
				  	'The quality trying to register already exists in our list, try again.',
				  	'warning'
				);
			} else if (response == "Error") {
				swal(
					'Oops',
				  	'External problem has occurred, try again later.',
				  	'error'
				);
			} else if (response == "Success") {
				swal(
					'Quality Registered',
				  	'The quality has been registered successfully.',
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
	$("#quality_name_update").keyup(function(event) {
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
		beforeSend: function(){
			$("#btn-update-quality").attr('disabled', true);
			$("#btn-update-quality").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Loading');
		},
		success: function(response){
			$("#btn-update-quality").removeAttr('disabled');
			$("#btn-update-quality").html('<span class="glyphicon glyphicon-refresh"></span> Update Quality');

			if (response == "Already") {
				swal(
					'Quality Already',
				  	'The quality trying to update already exists in our list, try again.',
				  	'warning'
				);
			} else if (response == "Error") {
				swal(
					'Oops',
				  	'External problem has occurred, try again later.',
				  	'error'
				);
			} else if (response == "Success") {
				swal(
					'Quality Updated',
				  	'The quality has been updated successfully.',
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
	$(".btn-delete-quality").click(function(event){
		var id_quality = $(this).attr('id');

		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#5BC0DE',
			cancelButtonColor: '#D9534F',
			confirmButtonText: '<span class="glyphicon glyphicon-trash"></span> Delete Quality',
			cancelButtonText: '<span class="glyphicon glyphicon-remove-circle"></span> Cancel',
			confirmButtonClass: 'btn btn-info',
			cancelButtonClass: 'btn btn-danger'
			/* buttonsStyling: false */
		}).then(function () {
			$.ajax({
				data: {id_quality_delete: id_quality },
				url: 'delete/',
				type: 'post',
				success: function(response){
					if (response == "Missing") {
						swal(
							'Quality Missing',
						  	'This quality ID does not exist, please check again.',
						  	'error'
						);
					} else if (response == "Error") {
						swal(
							'Oops',
						  	'External problem has occurred, try again later.',
						  	'error'
						);
					} else if (response == "Success") {
						swal(
							'Quality Deleted',
						  	'The quality has been deleted successfully.',
						  	'success'
						);
					}
				}
			});
		}, function (dismiss) {		
			swal(
				'Reminder',
			  	'Remember that deleting a user can not undo that act.',
			  	'info'
			);	
		});	
	});
	
	/*=====  End of Functions Delete  ======*/
});