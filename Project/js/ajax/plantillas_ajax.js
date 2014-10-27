var templateAjax1 = function(confAjax, selectores) {
    var divCargando = selectores.divCargando;
    var divError = selectores.divError;

    $.ajax({
        type: confAjax.type,
        url: confAjax.url,
        data: confAjax.data,
        dataType: confAjax.dataType,
        beforeSend: function() {
            mostrarCargando(divCargando);
            ocultarError(divError);
            if (confAjax.beforeSend) {
                confAjax.beforeSend();
            }
        },
        complete: function() {
            ocultarCargando(divCargando);
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
                confAjax.error(jqXHR, text, thr);
            }
        }
    });
    return false;
};


