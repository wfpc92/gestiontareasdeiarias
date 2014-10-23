var tareaActualizarAjax = function(form) {
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            var idTarea = data.idTarea;
            var txtNombreTarea = $("#txt-tarea-nombre-" + idTarea);
            var pViejoTarea = $("#p-tarea-nombre-" + idTarea);
            pViejoTarea.text(txtNombreTarea.val());
        },
        error: function() {
            alert("ERROR: tareaActualizarAjax conexion fallida");
        }
    });
    return false;
};

var tareaCheckAjax = function(self) {
    var form = $(self).parent("form");
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + "/tarea/checkAjax",
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            actualizarProgreso(data.idActividad);
        },
        error: function() {
            alert("ERROR: tareaCheckAjax conexion fallida");
        }
    });
    return false;
};

var actualizarProgreso = function( idActividad ){
    $.ajax({
        type: 'GET',
        url:  "index.php/tarea/totalTarea?ID_ACTIVIDAD="+idActividad,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            //console.log(data.numTT);
            //console.log(data.numTTot);
            /*
            var idTare = data.idTarea;*/
            //var numTT = data.numTT; 
            //var numTTot= data.numTTot;
            
            //atualizo la barra de progreso.
            //$(this).parent().append('<div class="progressbar"></div>');
            //$(this).parent().children('div.progressbar').show();
            //$(this).parent().children('div.progressbar').progressbar("option", "value", 75);
            //$("#progress-bar-real").progressbar("option", "value", 75);
            //var progressBar = document.getElementById("progressBar");
            //progressBar.value += 10;
            //var barra = $("barra");
            //barra.setAvance(numTT / numTTtol);
            
        },
        error: function() {
            alert("ERROR: actualizarProgreso conexion fallida");
        }
    });
    return false;
};
