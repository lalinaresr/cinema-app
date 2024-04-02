jQuery(document).ready(function ($) {

    let language = {
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
        }
    };

    let buttons = [
        { "extend": 'excel', "text": '<i class="fa fa-file-excel-o" aria-hidden="true"></i> XLSX', "className": 'btn btn-success' },
        { "extend": 'pdf', "text": '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF', "className": 'btn btn-danger' },
        { "extend": 'csv', "text": '<i class="fa fa-file-excel-o" aria-hidden="true"></i> CSV', "className": 'btn btn-success' }
    ];

    /* DataTables for the sessions section */
    let table_sessions = $('#table-sessions').DataTable({
        language,
        lengthChange: false,
        buttons
    });
    table_sessions.buttons().container().appendTo('#buttons-exports-sessions .col-sm-6:eq(0)');

    /* DataTables for the users section */
    let table_users = $('#table-users').DataTable({
        language,
        lengthChange: false,
        buttons
    });
    table_users.buttons().container().appendTo('#buttons-exports-users .col-sm-6:eq(0)');

    /* DataTables for the qualities section */
    let table_qualities = $('#table-qualities').DataTable({
        language,
        lengthChange: false,
        buttons
    });
    table_qualities.buttons().container().appendTo('#buttons-exports-qualities .col-sm-6:eq(0)');

    /* DataTables for the categorys section */
    let table_categorys = $('#table-categorys').DataTable({
        language,
        lengthChange: false,
        buttons
    });
    table_categorys.buttons().container().appendTo('#buttons-exports-categorys .col-sm-6:eq(0)');

    /* DataTables for the genders section */
    let table_genders = $('#table-genders').DataTable({
        language,
        lengthChange: false,
        buttons
    });
    table_genders.buttons().container().appendTo('#buttons-exports-genders .col-sm-6:eq(0)');


    /* DataTables for the productors section */
    let table_productors = $('#table-productors').DataTable({
        language,
        lengthChange: false,
        buttons
    });
    table_productors.buttons().container().appendTo('#buttons-exports-productors .col-sm-6:eq(0)');

    /* DataTables for the movies section */
    let table_movies = $('#table-movies').DataTable({
        language,
        lengthChange: false,
        buttons
    });
    table_movies.buttons().container().appendTo('#buttons-exports-movies .col-sm-6:eq(0)');

    /* DataTables for the newsletters section */
    let table_newsletters = $('#table-newsletters').DataTable({
        language,
        lengthChange: false,
        buttons
    });
    table_newsletters.buttons().container().appendTo('#buttons-exports-newsletters .col-sm-6:eq(0)');
});