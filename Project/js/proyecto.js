function posCalendario() {
    $("#content-princ-izq").css("width", "95%");
    $("#content-princ-der").hide();
}
$(document).ready(function() {
    var alto = $(window).height();
    $("#content").css("min-height", $(window).height() + "px");
    if ($(window).width() <= 768) {
        $("#content-princ-der").css("width", "100%");
    }
    else {
        $("#content-princ-der")
                .css("width", "38%");
        $("#content-princ-izq")
                .css("width", "58%");
    }

    if ($("#content-princ-izq").width() <= 1200) {
        $(".botones").css("margin-right", "30px");
    } else {
        $(".botones").css("margin-right", "25%");
    }

    $("#regresar").click(function() {
        $("#contentDer").hide();
        $("#contentIzq").show();
    });

    $("#menu .calendario a").click(function() {
        posCalendario();
    });

    setTimeout(function() {
        $("#exito-principal").fadeOut(1500);
    }, 3000);

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
    return div;
};

var mostrarMensajeExito = function(div, mensaje) {
    div.css('display', 'block')
    if (mensaje) {
        div.text(mensaje);
    } else {
        div.text("Se han guardado todos los cambios.");
    }
    return div;

};

var mostrarCargando = function(div, mensaje) {
    div.css('display', 'block');
    if (mensaje) {
        div.text(mensaje)
    } else {
        div.text("Cargando, un momento por favor...");
    }
    return div;
};

var ocultarCargando = function(div) {
    div.css('display', 'none')
            .addClass("cargando")
            .text("");
}

var mostrarError = function(div, mensaje) {
    div.css('display', 'block')
            .addClass("mensaje-error")
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
        $(".botones").css("margin-right", "50px");
    }
    else {
        $("#content-princ-izq").css("width", "58%");
        $("#content-princ-der")
                .css("width", "38%")
                .show()
                .html(html);

        if ($("#content-princ-izq").width() <= 600) {
            $(".botones").css("margin-right", "50px");
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

    $("ul.registro-tarea").mouseleave(function() {
        $("ul.registro-tarea").hide();
    });

};
