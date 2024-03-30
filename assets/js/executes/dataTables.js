jQuery(document).ready(function($) {
	
	/* DataTables for the users section */
	var table_users = $('#table-users').DataTable( {
        lengthChange: false,
        buttons: [ 
        	{ "extend": 'csv', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .CSV', "className": 'btn btn-success' } ,
        	{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .XLSX', "className": 'btn btn-success' } ,
        	{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> .PDF', "className": 'btn btn-danger' }
        ]
    } );	 
    table_users.buttons().container().appendTo( '#buttons-exports-users .col-sm-6:eq(0)' );	

	/* DataTables for the sessions section */
	var table_sessions = $('#table-sessions').DataTable( {
        lengthChange: false,
        buttons: [ 
        	{ "extend": 'csv', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .CSV', "className": 'btn btn-success' } ,
        	{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .XLSX', "className": 'btn btn-success' } ,
        	{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> .PDF', "className": 'btn btn-danger' }
        ]
    } );	 
    table_sessions.buttons().container().appendTo( '#buttons-exports-sessions .col-sm-6:eq(0)' );

	/* DataTables for the qualities section */
	var table_qualities = $('#table-qualities').DataTable( {
        lengthChange: false,
        buttons: [ 
        	{ "extend": 'csv', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .CSV', "className": 'btn btn-success' } ,
        	{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .XLSX', "className": 'btn btn-success' } ,
        	{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> .PDF', "className": 'btn btn-danger' }
        ]
    } );	 
    table_qualities.buttons().container().appendTo( '#buttons-exports-qualities .col-sm-6:eq(0)' );

	/* DataTables for the categorys section */
	var table_categorys = $('#table-categorys').DataTable( {
        lengthChange: false,
        buttons: [ 
        	{ "extend": 'csv', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .CSV', "className": 'btn btn-success' } ,
        	{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .XLSX', "className": 'btn btn-success' } ,
        	{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> .PDF', "className": 'btn btn-danger' }
        ]
    } );	 
    table_categorys.buttons().container().appendTo( '#buttons-exports-categorys .col-sm-6:eq(0)' );

	/* DataTables for the genders section */
	var table_genders = $('#table-genders').DataTable( {
        lengthChange: false,
        buttons: [ 
        	{ "extend": 'csv', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .CSV', "className": 'btn btn-success' } ,
        	{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .XLSX', "className": 'btn btn-success' } ,
        	{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> .PDF', "className": 'btn btn-danger' }
        ]
    } );	 
    table_genders.buttons().container().appendTo( '#buttons-exports-genders .col-sm-6:eq(0)' );


	/* DataTables for the productors section */
	var table_productors = $('#table-productors').DataTable( {
        lengthChange: false,
        buttons: [ 
        	{ "extend": 'csv', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .CSV', "className": 'btn btn-success' } ,
        	{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .XLSX', "className": 'btn btn-success' } ,
        	{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> .PDF', "className": 'btn btn-danger' }
        ]
    } );	 
    table_productors.buttons().container().appendTo( '#buttons-exports-productors .col-sm-6:eq(0)' );	

	/* DataTables for the movies section */
	var table_movies = $('#table-movies').DataTable( {
        lengthChange: false,
        buttons: [ 
        	{ "extend": 'csv', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .CSV', "className": 'btn btn-success' } ,
        	{ "extend": 'excel', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .XLSX', "className": 'btn btn-success' } ,
        	{ "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> .PDF', "className": 'btn btn-danger' }
        ]
    } );	 
    table_movies.buttons().container().appendTo( '#buttons-exports-movies .col-sm-6:eq(0)' );	

    /* DataTables for the newsletters section */
    var table_newsletters = $('#table-newsletters').DataTable( {
        lengthChange: false,
        buttons: [ 
            { "extend": 'csv', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .CSV', "className": 'btn btn-success' } ,
            { "extend": 'excel', "text":'<i class="fa fa-file-excel-o" aria-hidden="true"></i> .XLSX', "className": 'btn btn-success' } ,
            { "extend": 'pdf', "text":'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> .PDF', "className": 'btn btn-danger' }
        ]
    } );     
    table_newsletters.buttons().container().appendTo( '#buttons-exports-newsletters .col-sm-6:eq(0)' );
});