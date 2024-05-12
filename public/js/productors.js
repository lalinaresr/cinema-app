import { PRODUCTORS } from "./globals/constants.js";
import { message, question } from "./globals/messages.js";
import { _show_image_ } from "./globals/utils.js";

jQuery(document).ready(function ($) {

	let productors_table = null;

	if ($("#productors-table").length > 0) {
		productors_table = $("#productors-table").DataTable({
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
		productors_table.column('3').order('desc').draw();
	}

	$("#productor-store-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: PRODUCTORS,
			type: "POST",
			beforeSend: () => {
				$("#productor-store-btn").attr("disabled", true);
				$("#productor-store-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#productor-store-btn").removeAttr("disabled");
				$("#productor-store-btn").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

				switch (response) {
					case "success":
						message("Éxito", "El productor ha sido insertado con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos del productor que intenta ingresar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#productor-update-form").on("submit", function (e) {
		e.preventDefault();

		let id = $('input[name="productor"]').val();
		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${PRODUCTORS}/${id}`,
			type: "PATCH",
			beforeSend: () => {
				$("#productor-update-btn").attr("disabled", true);
				$("#productor-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#productor-update-btn").removeAttr("disabled");
				$("#productor-update-btn").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

				switch (response) {
					case "success":
						message("Éxito", "El productor ha sido actualizado con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos del productor que intenta actualizar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#logo").on("change", function () {
		_show_image_({ input: $(this), image: "#logo-preview-image" });
	});

	$("#logo-update-form").on("submit", function (e) {
		e.preventDefault();

		let id = $('input[name="productor"]').val();
		let data = new FormData(this);

		$.ajax({
			data,
			url: `${PRODUCTORS}/${id}`,
			type: "POST",
			processData: false,
			contentType: false,
			beforeSend: () => {
				$("#logo").attr("disabled", true);
				$("#logo-update-btn").attr("disabled", true);
				$("#logo-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {				
				$("#logo").removeAttr("disabled");
				$("#logo-update-btn").removeAttr("disabled");
				$("#logo-update-btn").html('<span class="glyphicon glyphicon-upload"></span> Subir');

				switch (response) {
					case "success":
						message("Éxito", "El logo fue actualizado con éxito", "success");
						$("#logo").val("");
						break;
					case "not-upload":
						message("Aviso", "Ocurrió un problema al subir el nuevo logo, inténtelo más tarde", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$(".productor-delete-btn").on("click", function (e) {
		e.preventDefault();

		let key = $(this).closest("tr").data("key");
		let id = $(this).data("element");

		question("¿Estas segur@?", "¡No podrás revertir esto!")
		.then(result => {
			if (result.isConfirmed) {
				$.ajax({
					url: `${PRODUCTORS}/${id}`,
					type: "DELETE",
					success: response => {
						switch (response) {
							case "success":
								message("Éxito", "El productor fue eliminado con éxito", "success");
								$("#productors-table").length > 0 ? productors_table.row(key).remove().draw() : setTimeout(() => location.href = PRODUCTORS, 1000);
								break;
							case "not-found":
								message("No encontrado", "El productor ha eliminar no coincide con alguno de nuestros registros", "warning");
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