import { CATEGORIES } from "./globals/constants.js";
import { message, question } from "./globals/messages.js";

jQuery(document).ready(function ($) {

	let categories_table = null;

	if ($("#categories-table").length > 0) {
		categories_table = $("#categories-table").DataTable({
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
		categories_table.column("3").order("desc").draw();
	}

	$("#category-store-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: CATEGORIES,
			type: "POST",
			beforeSend: () => {
				$("#category-store-btn").attr("disabled", true);
				$("#category-store-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#category-store-btn").removeAttr("disabled");
				$("#category-store-btn").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

				switch (response) {
					case "success":
						message("Éxito", "La categoría ha sido insertada con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos de la categoría que intenta ingresar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#category-update-form").on("submit", function (e) {
		e.preventDefault();

		let id = $('input[name="category"]').val();
		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${CATEGORIES}/${id}`,
			type: "PATCH",
			beforeSend: () => {
				$("#category-update-btn").attr("disabled", true);
				$("#category-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#category-update-btn").removeAttr("disabled");
				$("#category-update-btn").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

				switch (response) {
					case "success":
						message("Éxito", "La categoría ha sido actualizada con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos de la categoría que intenta actualizar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$(".category-delete-btn").on("click", function (e) {
		e.preventDefault();

		let key = $(this).closest("tr").data("key");
		let id = $(this).data("element");

		question("¿Estas segur@?", "¡No podrás revertir esto!")
		.then(result => {
			if (result.isConfirmed) {
				$.ajax({
					url: `${CATEGORIES}/${id}`,
					type: "DELETE",
					success: response => {
						switch (response) {
							case "success":
								message("Éxito", "La categoría fue eliminada con éxito", "success");
								$("#categories-table").length > 0 ? categories_table.row(key).remove().draw() : setTimeout(() => location.href = CATEGORIES, 1000);
								break;
							case "not-found":
								message("No encontrado", "La categoría ha eliminar no coincide con alguno de nuestros registros", "warning");
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