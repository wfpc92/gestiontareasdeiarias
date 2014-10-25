var tareaCrearAjax = function(form) {
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var htmlTarea = data.htmlTarea;
            var htmlTareaEditar = data.htmlTareaEditar;
            var idActividad = data.idActividad;
            var idTarea = data.idTarea;
            var items = $("#tarea-" + idActividad + " .items");
            var divsItems = $("#tarea-" + idActividad + " .items > div");

            if (divsItems.length === 0) {
                items.html("");
            }
            items.append(htmlTarea);
            $("#txt-tarea-" + idActividad).val("");

            mostrarPanelDerecho(htmlTareaEditar);
            actualizarProgreso(data.idActividad);
        },
        error: function() {
            alert("ERROR: categoriaCrearAjax conexion fallida");
        }
    });
    return false;
};

var tareaMenu = function(self) {
    var contenedor = $(self);
    $(contenedor).siblings("ul").eq(0).slideToggle();
    return false;
}