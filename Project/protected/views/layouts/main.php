<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" >
    <head>
        <?php
        $bu = Yii::app()->baseUrl . '/';
        $cs = Yii::app()->clientScript;
        $cs->registerMetaTag(
                'text/html; charset=utf-8', 'content-type', 'Content-Type');
        $cs->registerMetaTag('en', 'language');
        $cs->registerMetaTag('viewport', 'width-device-width, initial-scale=1');

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

        $cs->registerScriptFile($bu . 'js/proyecto.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile($bu . 'js/ajax/categoria/crear.js');
        $cs->registerScriptFile($bu . 'js/ajax/categoria/editar.js');
        $cs->registerScriptFile($bu . 'js/ajax/categoria/eliminar.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/crear.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/editar.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/eliminar.js');
        $cs->registerScriptFile($bu . 'js/ajax/actividad/listarTareas.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/actualizar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/cerrar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/crear.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/guardar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/eliminar.js');
        $cs->registerScriptFile($bu . 'js/ajax/tarea/mostrar.js');
        ?>

        <link rel="shortcut icon" href="favicon.ico">
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

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
                            //array('label' => 'Home', 'url' => array('/site/index')),
                            //array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                            //array('label' => 'Contact', 'url' => array('/site/contact')),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ));
                    ?>
                </div><!-- mainmenu -->
            </div><!-- header -->


            <?php
            echo $content;
            ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>