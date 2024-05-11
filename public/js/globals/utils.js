import { message } from "./messages.js";

export function _show_image_(builder) {
    let file = $(builder.input).val();
    let extension = file.split(".").pop().toLowerCase();
    let size_kb = ((builder.input.prop("files")[0].size) / 1024);
    let extensions = ["jpeg", "jpg", "png"];

    if (!(extensions.indexOf(extension) !== -1) || size_kb > 2048) {
        $(builder.input).val("");
        message("Aviso", "Ha habido un problema con el archivo que intenta subir. Recuerde que debe estar en formato PNG | JPG | JPEG, y pesar menos de 2MB", "error");
        return;
    }

    let reader = new FileReader();
    reader.onload = function (e) {
        $(builder.image).attr("src", e.target.result);
    }
    reader.readAsDataURL(builder.input.prop("files")[0]);
}