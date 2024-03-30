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
	$("#movie_name_insert").keyup(function(event) {
		var string = '';
		string = string + $("#movie_name_insert").val();

		$("#movie_slug_insert").val(create_slug(string));
	});

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#movie_cover_insert').change(function() {
	    var fileName = $('#movie_cover_insert').val(); 
	    var extension = fileName.split('.').pop(); 
	    var extensionLower = extension.toLowerCase(); 
	    var sizeKB = (this.files[0].size) / 1024; 

	    if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') { 
	        if (sizeKB < 2048) { 
	        	$("#modal-movie-cover").modal('show');
	            $('#preview-img-cover').removeClass("hidden");
	            var reader = new FileReader();
	            reader.onload = function(e) {          	
	                $('#preview-img-cover').attr('src', e.target.result);
	            }
	            reader.readAsDataURL(this.files[0]);
	            console.log(sizeKB);
	        } else {
	            $('#preview-img-cover').addClass("hidden");
	            $('#movie_cover_insert').val('');
	            swal(
	            	'Only Images',
	              	'There has been a problem with the image remember that it must weigh less than 2MB and must have PNG | JPG | JPEG.',
	              	'error'
	            );
	        }
	    } else {	        
	        $('#preview-img-cover').addClass("hidden");
	        $('#movie_cover_insert').val('');
	        swal(
	        	'Only Images',
	          	'There has been a problem with the image remember that it must weigh less than 2MB and must have PNG | JPG | JPEG.',
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
		beforeSend: function(){
			$("#btn-insert-movie").attr('disabled', true);
			$("#btn-insert-movie").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Loading');
		},
		success: function(response){
			$("#btn-insert-movie").removeAttr('disabled');
			$("#btn-insert-movie").html('<span class="glyphicon glyphicon-floppy-disk"></span> Save Movie');

			if (response == "Already") {
				swal(
					'Movie Already',
				  	'The movie trying to register already exists in our list, try again.',
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
					'Movie Registered',
				  	'The movie has been registered successfully.',
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
	$("#movie_name_update").keyup(function(event) {
		var string = '';
		string = string + $("#movie_name_update").val();

		$("#movie_slug_update").val(create_slug(string));
	});

	/**
	* [description]
	* @param  {[type]} ) {	              var fileName [description]
	* @return {[type]}   [description]
	*/
	$('#movie_cover_update').change(function() {
	    var fileName = $('#movie_cover_update').val(); 
	    var extension = fileName.split('.').pop(); 
	    var extensionLower = extension.toLowerCase(); 
	    var sizeKB = (this.files[0].size) / 1024; 

	    if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') { 
	        if (sizeKB < 2048) { 
	        	$("#modal-movie-cover").modal('show');
	            $('#preview-img-cover').removeClass("hidden");
	            var reader = new FileReader();
	            reader.onload = function(e) {          	
	                $('#preview-img-cover').attr('src', e.target.result);
	            }
	            reader.readAsDataURL(this.files[0]);
	            console.log(sizeKB);
	        } else {
	            $('#preview-img-cover').addClass("hidden");
	            $('#movie_cover_update').val('');
	            swal(
	            	'Only Images',
	              	'There has been a problem with the image remember that it must weigh less than 2MB and must have PNG | JPG | JPEG.',
	              	'error'
	            );
	        }
	    } else {	        
	        $('#preview-img-cover').addClass("hidden");
	        $('#movie_cover_update').val('');
	        swal(
	        	'Only Images',
	          	'There has been a problem with the image remember that it must weigh less than 2MB and must have PNG | JPG | JPEG.',
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
		beforeSend: function(){
			$("#btn-update-movie").attr('disabled', true);
			$("#btn-update-movie").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Loading');
		},
		success: function(response){
			$("#btn-update-movie").removeAttr('disabled');
			$("#btn-update-movie").html('<span class="glyphicon glyphicon-refresh"></span> Update Movie');

			if (response == "Already") {
				swal(
					'Movie Already',
					"The movie trying to register already exists in our list, try again.",
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
					'Movie Updated',
				  	'The movie has been updated successfully.',
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
	$('#movie_cover_customize').change(function() {
	    var fileName = $('#movie_cover_customize').val(); 
	    var extension = fileName.split('.').pop(); 
	    var extensionLower = extension.toLowerCase(); 
	    var sizeKB = (this.files[0].size) / 1024; 

	    if (extensionLower == 'jpg' || extensionLower == 'jpeg' || extensionLower == 'png') { 
	        if (sizeKB < 2048) { 
	        	$("#file_name_cover_customize").val(fileName);
	        	$("#file_size_cover_customize").val('KB: ' + sizeKB);
	        	$("#file_extension_cover_customize").val(extensionLower);
	        	$("#file_route_cover_customize").val('assets/images/movies/');
	            $('#image-cover-current').addClass("hidden");
	            $('#preview-img-cover').removeClass("hidden");
	            var reader = new FileReader();
	            reader.onload = function(e) {          	
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
	            	'Only Images',
	              	'There has been a problem with the image remember that it must weigh less than 2MB and must have PNG | JPG | JPEG.',
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
	        	'Only Images',
	          	'There has been a problem with the image remember that it must weigh less than 2MB and must have PNG | JPG | JPEG.',
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
		beforeSend: function(){
			$("#btn-update-cover").attr('disabled', true);
			$("#btn-update-cover").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Loading');
		},
		success: function(response){
			$("#btn-update-cover").removeAttr('disabled');
			$("#btn-update-cover").html('<span class="glyphicon glyphicon-upload"></span> Change Cover');

			if (response == "Error") {
				swal(
					'Oops',
				  	'External problem has occurred, try again later.',
				  	'error'
				);
			} else if (response == "Success") {
				swal(
					'Cover Changed',
				  	'The cover was updated successfully.',
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
	$(".btn-delete-movie").click(function(event){
		var id_movie = $(this).attr('id');

		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#5BC0DE',
			cancelButtonColor: '#D9534F',
			confirmButtonText: '<span class="glyphicon glyphicon-trash"></span> Delete Movie',
			cancelButtonText: '<span class="glyphicon glyphicon-remove-circle"></span> Cancel',
			confirmButtonClass: 'btn btn-info',
			cancelButtonClass: 'btn btn-danger'
			/* buttonsStyling: false */
		}).then(function () {
			$.ajax({
				data: {id_movie_delete: id_movie },
				url: 'delete/',
				type: 'post',
				success: function(response){
					if (response == "Missing") {
						swal(
							'Movie Missing',
						  	'This movie ID does not exist, please check again.',
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
							'Movie Deleted',
						  	'The movie has been deleted successfully.',
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