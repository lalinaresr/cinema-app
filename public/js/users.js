import { USERS } from "./globals/constants.js";
import { message, question } from "./globals/messages.js";
import { _show_image_ } from "./globals/utils.js";

jQuery(document).ready(function ($) {

	let users_table = null;

	if ($("#users-table").length > 0) {
		users_table = $("#users-table").DataTable({
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
								columns: [0, 1, 2, 3, 4]
							}
						},
						{
							extend: "pdfHtml5",
							className: "btn btn-danger",
							text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
							exportOptions: {
								columns: [0, 1, 2, 3, 4]
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
								columns: [0, 1, 2, 3, 4]
							}
						}
					]
				}
			}
		});
		users_table.column("4").order("desc").draw();
	}

	if ($("#birthday").length > 0) {
		$("#birthday").datetimepicker({
			locale: "es",
			viewMode: "years",
			format: "YYYY-MM-DD",
			maxDate: "now"
		});
	}

	$("#user-store-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${USERS}/store`,
			type: "POST",
			beforeSend: () => {
				$("#user-store-btn").attr("disabled", true);
				$("#user-store-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#user-store-btn").removeAttr("disabled");
				$("#user-store-btn").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

				switch (response) {
					case "success":
						message("Éxito", "El usuario ha sido insertado con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos del usuario que intenta ingresar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#user-update-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${USERS}/update`,
			type: "POST",
			beforeSend: () => {
				$("#user-update-btn").attr("disabled", true);
				$("#user-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#user-update-btn").removeAttr("disabled");
				$("#user-update-btn").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

				switch (response) {
					case "success":
						message("Éxito", "El usuario ha sido actualizado con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos del usuario que intenta actualizar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#avatar").on("change", function () {
		_show_image_({ input: $(this), image: "#avatar-preview-image" });
	});

	$("#avatar-update-form").on("submit", function (e) {
		e.preventDefault();
		
		let data = new FormData(this);

		$.ajax({
			data,
			url: `${USERS}/update_avatar`,
			type: "POST",
			processData: false,
            contentType: false,
			beforeSend: () => {
				$("#avatar").attr("disabled", true);
				$("#avatar-update-btn").attr("disabled", true);
				$("#avatar-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#avatar").removeAttr("disabled");
				$("#avatar-update-btn").removeAttr("disabled");
				$("#avatar-update-btn").html('<span class="glyphicon glyphicon-upload"></span> Subir');

				switch (response) {
					case "success":
						message("Éxito", "Su avatar ha sido actualizado con éxito", "success");
						$("#avatar").val("");
						break;
					case "not-upload":
						message("Aviso", "Ocurrió un problema al subir su nuevo avatar, inténtelo más tarde", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$(".user-delete-btn").on("click", function (e) {
		e.preventDefault();

		let key = $(this).closest("tr").data("key");
		let user = $(this).data("element");

		question("¿Estas segur@?", "¡No podrás revertir esto!")
		.then(result => {
			if (result.isConfirmed) {
				$.ajax({
					data: { user },
					url: `${USERS}/delete`,
					type: "POST",
					success: response => {
						switch (response) {
							case "success":
								message("Éxito", "El usuario fue eliminado con éxito", "success");
								$("#users-table").length > 0 ? users_table.row(key).remove().draw() : setTimeout(() => location.href = USERS, 1000);
								break;
							case "not-found":
								message("No encontrado", "El usuario ha eliminar no coincide con alguno de nuestros registros", "warning");
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