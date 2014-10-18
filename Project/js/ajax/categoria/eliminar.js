var categoriaEliminarAjax = function(self, event) {
    var form = $(self).parent("a");
    console.log("YOLO");
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/categoria/eliminarAjax',
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var borrar = data.borrar;
            var motivo = data.motivo;
            var idCategoria = data.idCategoria;
            //obtener la lista de tareas.
            var idCategoriaActual = "#categoria-" + idCategoria;
            $("div").remove(idCategoriaActual);            
            return false;
        },
        error: function() {
            alert("ERROR: categoriaEliminarAjax conexion fallida");
        }
    });
    //event.preventDefault();
    return false;
};