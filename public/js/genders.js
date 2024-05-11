import { GENDERS } from "./globals/constants.js";
import { message, question } from "./globals/messages.js";

jQuery(document).ready(function ($) {

	let genders_table = null;

	if ($("#genders-table").length > 0) {
		genders_table = $("#genders-table").DataTable({
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
		genders_table.column("3").order("desc").draw();
	}

	$("#gender-store-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${GENDERS}/store`,
			type: "POST",
			beforeSend: () => {
				$("#gender-store-btn").attr("disabled", true);
				$("#gender-store-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#gender-store-btn").removeAttr("disabled");
				$("#gender-store-btn").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

				switch (response) {
					case "success":
						message("Éxito", "El género ha sido insertado con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos del género que intenta ingresar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#gender-update-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${GENDERS}/update`,
			type: "POST",
			beforeSend: () => {
				$("#gender-update-btn").attr("disabled", true);
				$("#gender-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#gender-update-btn").removeAttr("disabled");
				$("#gender-update-btn").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

				switch (response) {
					case "success":
						message("Éxito", "El género ha sido actualizado con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos del género que intenta actualizar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		})
	});

	$(".gender-delete-btn").on("click", function (e) {
		e.preventDefault();

		let key = $(this).closest("tr").data("key");
		let gender = $(this).data("element");

		question("¿Estas segur@?", "¡No podrás revertir esto!")
		.then(result => {
			if (result.isConfirmed) {
				$.ajax({
					data: { gender },
					url: `${GENDERS}/delete`,
					type: "POST",
					success: response => {
						switch (response) {
							case "success":
								message("Éxito", "El género fue eliminado con éxito", "success");
								$("#genders-table").length > 0 ? genders_table.row(key).remove().draw() : setTimeout(() => location.href = GENDERS, 1000);
								break;
							case "not-found":
								message("No encontrado", "El género ha eliminar no coincide con alguno de nuestros registros", "warning");
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