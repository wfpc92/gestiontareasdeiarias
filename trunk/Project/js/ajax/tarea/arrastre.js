var tareaPoolADiariaAjax = function(self, target) {
    var form = $("#" + self + " > form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/pooladiariaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var htmlTarea = data.htmlTarea;
            $("#lst-tarea-diaria > .items").append(htmlTarea);
            var div = $("#" + self);
            div.remove();
            var items = $("#lst-pool-tareas .items > .view");
            if (items.length === 0) {
                $("#lst-pool-tareas .items").text("No se encontraron resultados.");
            }
        }
    };

    var selectores = {
        cargando: {
            div: $("#cargando-principal")
        },
        exito: {
            div: $("#exito-principal"),
            mensaje: "La Tarea se ha asignado a este día."
        },
        error: {
            div: $("#error-principal")
        }
    };

    templateAjax1(confAjax, selectores);
    return false;
};


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    tareaPoolADiariaAjax(data, ev.target);
}