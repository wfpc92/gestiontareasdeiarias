var tareaActualizarAjax = function(form) {
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function(data) {
            console.log(data);
        },
        error: function() {
            alert("ERROR: tareaActualizarAjax conexion fallida");
        }
    });
    return false;
};

