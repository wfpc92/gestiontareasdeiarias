$(document).ready(function() {
    $("#content-princ-der")
            .css("width", "38%");
    $("#content-princ-izq")
            .css("width", "58%");


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

    $("#regresar").click(function() {
        $("#contentDer").hide();
        $("#contentIzq").show();
    });
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
            .css('padding', '8px 35px 8px 14px')
            .css('margin-bottom', '18px')
            .css('color', '#c09853')
            .css('text-shadow', '0 1px 0 rgba(255, 255, 255, 0.5')
            .css('background-color', '#fcf8e3')
            .css('border', '1px solid #fbeed5')
            .css('-webkit-border-radius', '4px')
            .css('-moz-border-radius', '4px')
            .css('border-radius', '4px')
            .css('color', '#3a87ad')
            .css('background-color', '#d9edf7')
            .css('border-color', '#bce8f1')
            .text("Cargando, un momento por favor...");
};

var ocultarCargando = function(div) {
    div.css('display', 'none')
            .text("");
}

var mostrarError = function(div, mensaje) {
    div.css('display', 'block')
            .css('padding', '8px 35px 8px 14px')
            .css('margin-bottom', '18px')
            .css('color', '#c09853')
            .css('text-shadow', '0 1px 0 rgba(255, 255, 255, 0.5')
            .css('background-color', '#fcf8e3')
            .css('border', '1px solid #fbeed5')
            .css('-webkit-border-radius', '4px')
            .css('-moz-border-radius', '4px')
            .css('border-radius', '4px')
            .css('color', '#b94a48')
            .css('background-color', '#f2dede')
            .css('border-color', '#eed3d7')
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
        $("#content-princ-izq").css("width", "38%");
        $("#content-princ-der")
                .css("width", "58%")
                .show()
                .html(html);

        if ($("#content-princ-izq").width() <= 500) {
            $(".botones").css("float", "none")
                    .css("margin-left", "30px")
                    .css("margin-top", "0px");
            $(".form-tarea p").css("padding", "0 40px 10px 33px");
        } else {
            $(".botones").css("margin-right", "25%");
        }
    }

    $anchoizq = $("#content-princ-izq").width();
};

