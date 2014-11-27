<?php
/* @var $this Controller */
/* @var $cs CClientScript */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml" xml:lang = "es" >
    <head>

        <?php
        $bu = Yii::app()->baseUrl . '/';
        $cs = Yii::app()->clientScript;
        $cs->registerMetaTag('text/html; charset=utf-8', 'content-type', 'Content-Type');
        $cs->registerMetaTag('en', 'language');
        $cs->registerMetaTag('width-device-width, initial-scale=1', 'viewport');

        $cs->registerCssFile($bu . 'css/screen.css', 'screen, projection');
        $cs->registerCssFile($bu . 'css/print.css', 'print');
        //$cs->registerCssFile('css/ie.css', 'screen, projection');

        $cs->registerCssFile($bu . 'css/main.css');
        $cs->registerCssFile($bu . 'css/form.css');
        $cs->registerCssFile($bu . 'css/genericos.css');
        $cs->registerCssFile($bu . 'css/estilos.css');
        $cs->registerCssFile($bu . 'css/responsive1200.css', 'screen and (max-width: 1200px)');
        $cs->registerCssFile($bu . 'css/responsive920.css', 'screen and (max-width: 920px)');
        $cs->registerCssFile($bu . 'css/responsive700.css', 'screen and (max-width: 700px)');
        $cs->registerCssFile($bu . 'css/responsive360.css', 'screen and (max-width: 360px)');

        $cs->registerScriptFile($bu . 'lib/timepicki/js/timepicki.js');
        $cs->registerLinkTag("stylesheet", "text/css", $bu . "lib/timepicki/css/timepicki.css");

        $cs->registerScriptFile($bu . 'js/proyecto.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile($bu . 'js/ajax/plantillas_ajax.js');
        $cs->registerScriptFile($bu . 'js/ajax/categoria/cargar_actividades.js');
        $cs->registerScriptFile($bu . 'js/ajax/categoria/crear.js');
        $cs->registerScriptFile($bu . 'js/ajax/categoria/editar.js');
        $cs->registerScriptFile($bu . 'js/ajax/categoria/eliminar.js');
        $cs->registerScriptFile($bu . 'js/ajax/categoria/menu.js');
        $cs->registerScriptFile($bu . 'js/ajax/categoria/toogle.js');

        $cs->registerScriptFile($bu . 'js/ajax/actividad/barra_progreso.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/crear.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/editar.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/eliminar.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/listar_tareas.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/menu.js');

        $cs->registerScriptFile($bu . 'js/ajax/tarea/actualizar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/arrastre.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/cerrar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/check.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/crear.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/eliminar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/guardar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/iniciar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/menu.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/mostrar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/pausar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/toogle.js');

        $cs->registerScriptFile($bu . 'js/ajax/registro_tarea/actualizar.js');
        $cs->registerScriptFile($bu . 'js/ajax/registro_tarea/eliminar.js');
        $cs->registerScriptFile($bu . 'js/ajax/registro_tarea/menu.js');
        ?>


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <?php
        /* <script src="../../../Project/lib/jquery.js" type="text/javascript"></script> 
          <script src="../../../Project/lib/timepicki/js/timepicki.js" type="text/javascript"></script>
          <link href="../../../Project/lib/timepicki/css/timepicki.css" rel="stylesheet" type="text/css"/>
         */
        ?>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><a href="<?php echo Yii::app()->homeUrl; ?>">
                        <?php echo CHtml::encode(Yii::app()->name); ?>
                    </a>
                </div>
                <div id="mainmenu">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => array(
                            array('label' => 'Iniciar Sesión', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => "Cerrar Sesion " . Usuario::model()->nombreUsuarioActual(), 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ));
                    ?>
                </div>
            </div>


            <?php
            echo $content;
            ?>

            <div class="clear"></div>

        </div><!-- page -->



    </body>
</html>
