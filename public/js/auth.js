import { WELCOME, LOGIN, DASHBOARD, LOGOUT } from "./globals/constants.js";
import { message, question } from "./globals/messages.js";

jQuery(document).ready(function ($) {
	$("#login-form").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			data,
			url: LOGIN,
			type: "POST",
			beforeSend: () => {
				$("#login-icon").html('<i style="font-size: 10em;" class="fa fa-spinner fa-spin fa-fw"></i>');
				$("#login-btn").attr("disabled", true);
				$("#login-btn").text("Procesando...");
			},
			success: response => {
				$("#login-icon").html('<i style="font-size: 10em;" class="fa fa-user-circle"></i>');
				$("#login-btn").removeAttr("disabled");
				$("#login-btn").html('<span class="glyphicon glyphicon-log-in"></span> Entrar');

				switch (response) {
					case "success":
						location.href = DASHBOARD;
						break;
					case "not-found":
					case "not-match":
						message("No encontrado", "Las credenciales que ingresó no coinciden con alguno de nuestros registros", "warning");
						break;
					default:
						message("Oops", "Lamentamos informarle que ha ocurrido un error interno en el sistema, inténtelo más tarde", "error");
						break;
				}
			}
		})
	});

	$(".logout-btn").on("click", function (e) {
		e.preventDefault();

		question("¿Desea salir?", "Para poder salir de la aplicación es necesario confirmar esta acción")
		.then(result => {
			if (result.isConfirmed) {
				$.ajax({
					url: LOGOUT,
					type: "POST",
					success: response => {
						if (response == "success") {
							location.href = WELCOME;
						}
					}
				});
			}
		});
	});
});