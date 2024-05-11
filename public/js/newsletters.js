import { NEWSLETTERS } from "./globals/constants.js";
import { message, question } from "./globals/messages.js";

jQuery(document).ready(function ($) {

	let newsletters_table = null;

	if ($("#newsletters-table").length > 0) {
		newsletters_table = $("#newsletters-table").DataTable({
			language: {
				url: "https://cdn.datatables.net/plug-ins/2.0.5/i18n/es-ES.json",
			},
			lengthChange: false,
			layout: {
				topStart: {
					buttons: [
						{
							extend: "excelHtml5",
							className: "btn btn-success",
							text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> XLSX',
							exportOptions: {
								columns: [0, 1, 2]
							}
						},
						{
							extend: "pdfHtml5",
							className: "btn btn-danger",
							text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
							exportOptions: {
								columns: [0, 1, 2]
							},
							orientation: "portrait",
							pageSize: "LEGAL",
							download: "open"
						},
						{
							extend: "csvHtml5",
							className: "btn btn-success",
							text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> CSV',
							exportOptions: {
								columns: [0, 1, 2]
							}
						}
					]
				}
			}
		});
		newsletters_table.column("2").order("desc").draw();
	}

	$(".newsletter-delete-btn").on("click", function (e) {
		e.preventDefault();

		let key = $(this).closest("tr").data("key");
		let newsletter = $(this).data("element");

		question("¿Estas segur@?", "¡No podrás revertir esto!")
		.then(result => {
			if (result.isConfirmed) {
				$.ajax({
					data: { newsletter },
					url: `${NEWSLETTERS}/delete`,
					type: "POST",
					success: response => {
						switch (response) {
							case "success":
								message("Éxito", "El seguidor fue eliminado con éxito", "success");
								$("#newsletters-table").length > 0 ? newsletters_table.row(key).remove().draw() : setTimeout(() => location.href = NEWSLETTERS, 1000);
								break;
							case "not-found":
								message("No encontrado", "El seguidor ha eliminar no coincide con alguno de nuestros registros", "warning");
								break;
							default:
								message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
								break;
						}
					}
				});
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				message("Recordatorio", "Recuerda que eliminar un registro es una acción que no podrá deshacerse", "info");
			}
		});
	});
});