var templateAjax1 = function(confAjax, selectores) {
    var divCargando = selectores.cargando ? selectores.cargando.div : null;
    var mensajeCargando = selectores.cargando ? selectores.cargando.mensaje : null;

    var divExito = selectores.exito ? selectores.exito.div : null;
    var mensajeExito = selectores.exito ? selectores.exito.mensaje : null;

    var divError = selectores.error ? selectores.error.div : null;
    var mensajeError = selectores.error ? selectores.error.mensaje : null;

    $.ajax({
        type: confAjax.type,
        url: confAjax.url,
        data: confAjax.data,
        dataType: confAjax.dataType,
        beforeSend: function() {
            mostrarCargando(divCargando, mensajeCargando);
            ocultarError(divError);
            if (confAjax.beforeSend) {
                confAjax.beforeSend();
            }
        },
        complete: function() {
            ocultarCargando(divCargando);
            if (divExito) {
                mostrarMensajeExito(divExito, mensajeExito)
                divExito.delay(1600).fadeOut(300);
            }
            if (confAjax.complete) {
                confAjax.complete();
            }
        },
        success: function(data, textStatus, jqXHR) {
            if (data && data.error) {
                this.error(jqXHR, textStatus, null);
                return false;
            }
            if (confAjax.success) {
                confAjax.success(data, textStatus, jqXHR);
            }
        },
        error: function(jqXHR, text, thr) {
            var response = jqXHR.responseText;
            response = response.replace(/'/g, '"');
            var obj = $.parseJSON(response);
            if (obj.error) {
                if (typeof obj.error === "string") {
                    mostrarError(divError, obj.error);
                } else if (typeof obj.error === "object") {
                    var mensajeError = "";
                    var cont = 0;
                    for (var err in obj.error) {
                        if (cont++ !== 0) {
                            mensajeError += "<br/>";
                        }
                        mensajeError += obj.error[err];
                    }
                    mostrarError(divError, mensajeError);
                } else {
                    console.log("error desconocido")
                    console.log(obj.error)
                }
            }
            if (confAjax.error) {
                confAjax.error(obj, text, thr);
            }
        }
    });
    return false;
};


