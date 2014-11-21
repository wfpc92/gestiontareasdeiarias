var tareaPoolADiariaAjax = function (self, target) {
    var form = $("#" + self + " > form");
    console.log(form);
    
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/pooladiariaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            var htmlTarea = data.htmlTarea;
            $("#lst-tarea-diaria > .items").append(htmlTarea);
            var div = $("#" + self);
            div.remove();
        },
        error: function (data) {
            alert(data.error)
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $(form).find(".error")
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