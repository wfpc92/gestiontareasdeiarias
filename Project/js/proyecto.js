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
            .text("Cargando, un momento por favor...");
};

var ocultarCargando = function(div) {
    div.css('display', 'none')
            .text("");
}

var mostrarError = function(div, mensaje) {
    div.css('display', 'block')
            .css('background', 'red')
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

