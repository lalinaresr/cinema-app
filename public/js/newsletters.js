jQuery(document).ready(function ($) {

    if ($('#newsletters-table').length > 0) {
        let newsletters_table = $('#newsletters-table').DataTable({
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
        newsletters_table.buttons().container().appendTo('.col-sm-6:eq(0)');
    }
});