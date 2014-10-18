var categoriaEditarAjax = function (iden,nombre) {    
    var idenG = iden;
    var nombreG = nombre;
    $("#tgr-modificar").live("click", function () {                        
        $("#modificar-categoria-" + idenG).replaceWith("<span id='trg-modificar-categoria-"+idenG+"'>\n\
            <form method='post' action='/Project/index.php/categoria/editarAjax'>\n\
            <input id='valor-categoria' type='text' value='"+nombreG+"'>\n\
            <input id='btn-editar-categoria' type='submit' value='editar categoria' name='btn-editar-categoria'\n\
            onclick='return volverNormal("+idenG+",\""+nombreG+"\")'>\n\
            </form>\n\
            </span>");        
        return false;
    });
};

var volverNormal = function(iden,nombre){
    var idenG = iden;
    var nombreG = nombre;
    console.log(nombreG);
    $("#btn-editar-categoria").live("click", function () {        
        $("#trg-modificar-categoria-" + idenG).replaceWith("<span id='trg-modificar'>\n\
            "+nombreG+"\n\
            </span>");
        return false;
    });
};