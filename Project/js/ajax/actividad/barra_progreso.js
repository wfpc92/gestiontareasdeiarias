var actualizarProgressBar = function(progressBar) {
    if (progressBar) {
        var numTT = progressBar.numTT;
        var numTTot = progressBar.numTTot;
        var porcentaje = (numTT / numTTot) * 100;
        //atualizo la barra de progreso.
        $("#progress-bar-real").progressbar("option", "value", porcentaje);
    }
    return false;
};
