import { MOVIES } from "./globals/constants.js";
import { message, question } from "./globals/messages.js";
import { _show_image_ } from "./globals/utils.js";

jQuery(document).ready(function ($) {

	let movies_table = null;

	if ($("#movies-table").length > 0) {
		movies_table = $("#movies-table").DataTable({
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
		movies_table.column("4").order("desc").draw();
	}

	const MS_CONFIG = {
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		buttonWidth: "100%",
		filterPlaceholder: "Buscar...",
		nonSelectedText: "No se selecciono alguna",
		allSelectedText: "Se seleccionaron todas"
	};

	if ($("#productors").length > 0) {
		$("#productors").multiselect({ ...MS_CONFIG, nonSelectedText: "Seleccione productores" });
	}
	if ($("#genders").length > 0) {
		$("#genders").multiselect({ ...MS_CONFIG, nonSelectedText: "Seleccione géneros" });
	}
	if ($("#categories").length > 0) {
		$("#categories").multiselect({ ...MS_CONFIG, nonSelectedText: "Seleccione categorías" });
	}

	if ($("#release_date").length > 0) {
		$("#release_date").datetimepicker({
			locale: "es",
			viewMode: "years",
			format: "YYYY",
			maxDate: "now"
		});
	}

	if ($("#duration").length > 0) {
		$("#duration").datetimepicker({
			locale: "es",
			format: "HH:mm"
		});
	}

	$("#movie-store-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${MOVIES}/store`,
			type: "POST",
			beforeSend: () => {
				$("#movie-store-btn").attr("disabled", true);
				$("#movie-store-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#movie-store-btn").removeAttr("disabled");
				$("#movie-store-btn").html('<span class="glyphicon glyphicon-floppy-disk"></span> Guardar');

				switch (response) {
					case "success":
						message("Éxito", "La película ha sido insertada con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos de la película que intenta ingresar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#movie-update-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: `${MOVIES}/update`,
			type: "POST",
			beforeSend: () => {
				$("#movie-update-btn").attr("disabled", true);
				$("#movie-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#movie-update-btn").removeAttr("disabled");
				$("#movie-update-btn").html('<span class="glyphicon glyphicon-refresh"></span> Actualizar');

				switch (response) {
					case "success":
						message("Éxito", "La película ha sido actualizada con éxito", "success");
						break;
					case "existing":
						message("Duplicado", "Los datos de la película que intenta actualizar ya se encuentran en el sistema", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$("#cover").on("change", function () {
		_show_image_({ input: $(this), image: "#cover-preview-image" });
	});

	$("#cover-update-form").on("submit", function (e) {
		e.preventDefault();

		let data = new FormData(this);

		$.ajax({
			data,
			url: `${MOVIES}/update_cover`,
			type: "POST",
			processData: false,
			contentType: false,
			beforeSend: () => {
				$("#cover").attr("disabled", true);
				$("#cover-update-btn").attr("disabled", true);
				$("#cover-update-btn").html('<i class="fa fa-spinner fa-spin fa-fw"></i> Procesando');
			},
			success: response => {
				$("#cover").removeAttr("disabled");
				$("#cover-update-btn").removeAttr("disabled");
				$("#cover-update-btn").html('<span class="glyphicon glyphicon-upload"></span> Subir');

				switch (response) {
					case "success":
						message("Éxito", "La portada fue actualizada con éxito", "success");
						$("#cover").val("");
						break;
					case "not-upload":
						message("Aviso", "Ocurrió un problema al subir la nueva portada, inténtelo más tarde", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		});
	});

	$(".movie-delete-btn").on("click", function (e) {
		e.preventDefault();

		let key = $(this).closest("tr").data("key");
		let movie = $(this).data("element");

		question("¿Estas segur@?", "¡No podrás revertir esto!")
		.then(result => {
			if (result.isConfirmed) {
				$.ajax({
					data: { movie },
					url: `${MOVIES}/delete`,
					type: "POST",
					success: response => {
						switch (response) {
							case "success":
								message("Éxito", "La película fue eliminada con éxito", "success");
								$("#movies-table").length > 0 ? movies_table.row(key).remove().draw() : setTimeout(() => location.href = MOVIES, 1000);
								break;
							case "not-found":
								message("No encontrado", "La película ha eliminar no coincide con alguno de nuestros registros", "warning");
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