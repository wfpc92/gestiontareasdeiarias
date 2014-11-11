var tareaPoolADiariaAjax = function (self, ev) {
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/pooladiariaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data) {
            ev.target.appendChild(data.htmlTarea);
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
    //ev.dataTransfer.setData("text/html", ev.target.nodeName);
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    //var data = ev.dataTransfer.getData("text/html");
    //var data2 = ev.dataTransfer.getData("text");
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    //tareaPoolADiariaAjax(data,ev);
}