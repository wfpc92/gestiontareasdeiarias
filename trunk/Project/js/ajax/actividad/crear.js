function sucess(results) {
    var items = $("#categoria_" + results.ID_CATEGORIA + " .list-view .items");
    items.append(results.VIEW);
    var reciente = $("#actividad_" + results.ID_ACTIVIDAD);
    reciente.click(function() {
        return false;
    });
}
      