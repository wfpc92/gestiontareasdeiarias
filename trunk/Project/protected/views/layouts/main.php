<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" >
    <head>
        <?php
        $cs = Yii::app()->clientScript;
        $cs->registerMetaTag(
                'text/html; charset=utf-8', 'content-type', 'Content-Type');
        $cs->registerMetaTag('en', 'language');
        $cs->registerMetaTag('viewport', 'width-device-width, initial-scale=1');

        $cs->registerCssFile('css/screen.css', 'screen, projection');
        $cs->registerCssFile('css/print.css', 'print');
        //$cs->registerCssFile('css/ie.css', 'screen, projection');

        $cs->registerCssFile('css/main.css');
        $cs->registerCssFile('css/form.css');
        $cs->registerCssFile('css/genericos.css');
        $cs->registerCssFile('css/estilos.css');
        $cs->registerCssFile('css/responsive768.css', 'screen and (max-width: 768px)');
        $cs->registerCssFile('css/responsive480.css', 'screen and (max-width: 480px)');
        $cs->registerCssFile('css/responsive360.css', 'screen and (max-width: 360px)');
        
        //$cs->registerScriptFile('js/fullcalendar/fullcalendar.css');
        $cs->registerCssFile('js/fullcalendar/fullcalendar.css');

        $cs->registerScriptFile('js/proyecto.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile('js/ajax/categoria/crear.js');
        $cs->registerScriptFile('js/ajax/actividad/crear.js');
        $cs->registerScriptFile('js/ajax/actividad/listarTareas.js');

        $cs->registerScriptFile('js/ajax/tarea/actualizar.js');
        
        $cs->registerScriptFile('js/fullcalendar/fullcalendar.js');
        $cs->registerScriptFile('js/fullcalendar/lib/jquery.min.js');
        $cs->registerScriptFile('js/fullcalendar/lib/moment.min.js');
        $cs->registerScriptFile('js/fullcalendar/lang-all.js');

        $cs->registerScriptFile('js/ajax/tarea/cerrar.js');
        $cs->registerScriptFile('js/ajax/tarea/crear.js');
        $cs->registerScriptFile('js/ajax/tarea/guardar.js');
        $cs->registerScriptFile('js/ajax/tarea/eliminar.js');
        $cs->registerScriptFile('js/ajax/tarea/mostrar.js');
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


            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
