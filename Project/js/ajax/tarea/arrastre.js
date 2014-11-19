var tareaPoolADiariaAjax = function (self, evt) {
    console.log(self);
    console.log(evt);
    //var node=document.createElement('div');
    //node.appendChild(self);
    //console.log(document.getElementById("tarea-view-34").appendChild(node));
    
    var form = $(self).parents("form");
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/pooladiariaAjax',
        data: $(form).serialize(),
        //dataType: 'json',
        success: function (data) {
            //ev.target.appendChild(data.htmlTarea);
            var a = document.createElement('html');
            var b = document.createTextNode(data.htmlTarea);
            //document.getElementById('content-princ-izq').appendChild(b);
            //$('#content-princ-izq').appendChild(data.htmlTarea);
            
            var items = $("#content-princ-izq > .items");
            console.log(items);
            var divsItems = $("#content-princ-izq .items > div");
            console.log(divsItems);
            items.append(data.htmlTarea);
            //evt.a.appendChild(b);
            //a.appendChild(b);
            //ev.target.appendChild(a);
            //$('content-princ-izq').insertBefore(data.htmlTarea);
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
    ev.dataTransfer.setData("text/html", ev.target.nodeName);
    //ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text/html");
    //var data2 = ev.dataTransfer.getData("text");
    //var data = ev.dataTransfer.getData("text");
    //ev.target.appendChild(document.getElementById(data));
    
    tareaPoolADiariaAjax(data,ev.target);
    //ev.target.appendChild(algo);
}