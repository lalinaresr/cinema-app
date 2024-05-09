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
        newsletters_table.column('2').order('desc').draw();
    }

    const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-custom",
			cancelButton: "btn btn-default"
		},
		buttonsStyling: false
	});

    $(".newsletter-delete-btn").click(function (event) {
		let newsletter = $(this).data('element');
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
					data: { newsletter },
					url,
					type: 'POST',
					success: function (response) {
						if (response == 'not-found') {
							swalWithBootstrapButtons.fire({
								title: 'No encontrado',
								text: 'El seguidor ha eliminar no coincide con alguno de nuestros registros',
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
								text: 'El seguidor fue eliminado con éxito',
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
});