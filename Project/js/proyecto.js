function posCalendario() {
    $("#content-princ-izq").css("width", "95%");
    $("#content-princ-der").hide();
}
$(document).ready(function() {
    
    $("#content-princ-der")
            .css("width", "38%");
    $("#content-princ-izq")
            .css("width", "58%");

    $("#regresar").click(function() {
        $("#contentDer").hide();
        $("#contentIzq").show();
    });
    
    $("#menu .calendario a").click(function() {
        posCalendario();
    });
    
    menus();
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
            .addClass("cargando")
            .text("");
}

var mostrarError = function(div, mensaje) {
    div.css('display', 'block')
            .addClass("error")
            .html(mensaje);
};
var ocultarError = function(div) {
    div.css('display', 'none')
            .text("");
};

var mostrarPanelDerecho = function(html) {
    $ancho = $(window).width();

    if ($ancho <= 1200) {
        $("#content-princ-izq").css("width", "100%");
        $("#content-princ-der")
                .css("width", "100%")
                .show()
                .html(html);
        $(".botones").css("margin-right", "40px");
    }
    else {
        $("#content-princ-izq").css("width", "58%");
        $("#content-princ-der")
                .css("width", "38%")
                .show()
                .html(html);

        if ($("#content-princ-izq").width() <= 600) {
            $(".botones").css("margin-right", "40px");
        } else {
            $(".botones").css("margin-right", "25%");
        }
    }

    $anchoizq = $("#content-princ-izq").width();
};
var menus = function() {
     $("ul.categoria").mouseleave(function() {
        $("ul.categoria").hide();
    });    

    $("ul.actividad").mouseleave(function() {
        $("ul.actividad").hide();
    });

    $("ul.tarea").mouseleave(function() {
        $("ul.tarea").hide();
    });
};
