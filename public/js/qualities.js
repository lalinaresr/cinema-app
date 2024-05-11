import { QUALITIES } from "./globals/constants.js";
import { message, question } from "./globals/messages.js";

jQuery(document).ready(function ($) {

	let qualities_table = null;

	if ($("#qualities-table").length > 0) {
		qualities_table = $("#qualities-table").DataTable({
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
								columns: [0, 1, 2, 3]
							}
						},
						{
							extend: "pdfHtml5",
							className: "btn btn-danger",
							text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
							exportOptions: {
								columns: [0, 1, 2, 3]
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
								columns: [0, 1, 2, 3]
							}
						}
					]
				}
			}
		});
		qualities_table.column("3").order("desc").draw();
	}

	$("#quality-store-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${QUALITIES}/store`,
			type: "POST",
			beforeSend: () => {
				$("#quality-store-btn").attr("disabled", true);
				$("#quality-store-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#quality-store-btn").removeAttr("disabled");
				$("#quality-store-btn").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

				switch (response) {
					case "success":
						message("Éxito", "La calidad ha sido insertada con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos de la calidad que intenta ingresar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#quality-update-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${QUALITIES}/update`,
			type: "POST",
			beforeSend: () => {
				$("#quality-update-btn").attr("disabled", true);
				$("#quality-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#quality-update-btn").removeAttr("disabled");
				$("#quality-update-btn").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

				switch (response) {
					case "success":
						message("Éxito", "La calidad ha sido actualizada con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos de la calidad que intenta actualizar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$(".quality-delete-btn").on("click", function (e) {
		e.preventDefault();

		let key = $(this).closest("tr").data("key");
		let quality = $(this).data("element");

		question("¿Estas segur@?", "¡No podrás revertir esto!")
		.then(result => {
			if (result.isConfirmed) {
				$.ajax({
					data: { quality },
					url: `${QUALITIES}/delete`,
					type: "POST",
					success: response => {
						switch (response) {
							case "success":
								message("Éxito", "La calidad fue eliminada con éxito", "success");
								$("#qualities-table").length > 0 ? qualities_table.row(key).remove().draw() : setTimeout(() => location.href = QUALITIES, 1000);
								break;
							case "not-found":
								message("No encontrado", "La calidad ha eliminar no coincide con alguno de nuestros registros", "warning");
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