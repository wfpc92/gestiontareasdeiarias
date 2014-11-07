var tareaPoolADiariaAjax = function(self) {
    console.log(self);
    //quien tiene el formulario
    //que direccion action tiene el formulario 
    var form = $(self).parents("form");
    console.log(form);
    var confAjax = {
        type: 'POST',
        url: $(form).attr('action') + '/tarea/pooladiariaAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            /*var idTarea = data.idTarea;
            var txtNombreTarea = $("#txt-tarea-nombre-" + idTarea);
            var pViejoTarea = $("#p-tarea-nombre-" + idTarea);
            pViejoTarea.text(txtNombreTarea.val());
            */
           
           //target.appendChild(data.htmlTarea);
           
        }
    };
    var selectores = {
        divCargando: $("#cargando-principal"),
        divError: $(form).find(".error")
    };
    templateAjax1(confAjax, selectores);
    return false;
};
