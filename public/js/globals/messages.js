export const CUSTOM_SWAL = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-custom",
        cancelButton: "btn btn-default"
    },
    buttonsStyling: false
});

export function message(title, text, icon) {
    CUSTOM_SWAL.fire({ title, text, icon });
}

export function question(title, text, icon = "question") {
    return CUSTOM_SWAL.fire({
        title,
        text,
        icon,
        showCancelButton: true,
        confirmButtonText: '<span class="glyphicon glyphicon-thumbs-up"></span> Si, continuar',
        cancelButtonText: '<span class="glyphicon glyphicon-remove-circle"></span> Cancelar',
        reverseButtons: true
    });
}