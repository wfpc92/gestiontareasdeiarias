$(document).ready(function() {
    $("#content-princ-der")
            .hide()
            .css("width", "0%");
    $("#content-princ-izq")
            .css("width", "100%");
    $("#error-principal")
            .css('display', 'none');
});


var validarEntrada = function(input) {
    var texto = input.val().trim();
    var longitud = texto.length;
    return longitud === 0 ? false : true;
};

var mostrarMensaje = function(div, mensaje) {
    div.css('display', 'block')
            .text(mensaje);
};

var mostrarCargando = function(div) {
    div.css('display', 'block')
            .text("Cargando, un momento por favor...");
};

var ocultarCargando = function(div) {
    div.css('display', 'none')
            .text("");
}
$(document).ready(function() {
    $("#content-princ-der").hide()
            .css("width", "0%");
    $("#content-princ-izq").css("width", "100%");
    
    $("ul.categoria").mouseleave(function() {
        $("ul.categoria").hide();
    });
    
    $("ul.actividad").mouseleave(function() {
        $("ul.actividad").hide();
    });
    
    $("ul.tarea").mouseleave(function() {
        $("ul.tarea").hide();
    });
    
    if ($(window).width() <= 700) {
        $(".actividadesPorCate .list-view .items .view form div a").click(function() {
            $("#contentIzq").hide();
            $("#contentDer").show();
        });
    }
});
$(document).ready(function() {
    /*$("#content-princ-der").hide()
            .css("width", "0%");
    $("#content-princ-izq").css("width", "100%");*/
    $("ul.categoria li").mouseout(function() {
        $("ul.categoria").hide();
    });
    $("ul.actividad li").mouseout(function() {
        $("ul.actividad").hide();
    });
    $("ul.tarea li").mouseout(function() {
        $("ul.tarea").hide();
    });
    
    if ($(window).width() <= 700) {
        $(".actividadesPorCate .list-view .items .view form div a").click(function() {
            $("#contentIzq").hide();
            $("#contentDer").show();
        });
    }
});
