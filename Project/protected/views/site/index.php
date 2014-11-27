<?php
/* @var $this SiteController */
?>

<div id="cargando-principal"></div>
<div id="confirmacion">Acción realizada correctamente....</div>
<div id="contentIzq">

    <div id="error-principal"></div>
    <?php
    $form = '../categoria/_form';
    $modelCategoria = new Categoria;
    $modelCategoria->id_usuario = Yii::app()->user->getId();
    $this->renderPartial($form, array('model' => $modelCategoria));
    ?> 
    <div id="itemsCategoria">
        <?php
        $dataProvider = new CActiveDataProvider('Categoria', array(
            'criteria' => array(
                'condition' => "id_usuario='{$modelCategoria->id_usuario}'"),
            'pagination' => false
        ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '../categoria/_view',
            'enablePagination' => false,
            'id' => 'categoria-list-view'
        ));
        ?>  
    </div>
</div>

<div class="fluida">
    <div id="contentDer">
        <div id="actividad_progress_bar" class="progreso">
            <div id="progressbar"> 
                <span>Progreso: </span>
                <?php
                $this->widget('zii.widgets.jui.CJuiProgressBar', array(
                    'value' => 1000,
                    'htmlOptions' => array(
                        'id' => 'progress-bar-real'
                    )
                ));
                ?>
            </div>
            <div class="clear"></div>
        </div>

        <div class="menu">
            <ul id="menu">
                <li class="lista">
                    <?php
                    echo CHtml::link("Hoy", Yii::app()->createUrl("tarea/vistaDiaria"));
                    ?>
                </li>
                <li class="calendario">
                    <?php
                    echo CHtml::link("Calendario", Yii::app()->urlManager->createUrl("calendario"));
                    ?>
                </li>
                <li class="reportes">
                    <a href="#">Reportes</a>
                </li>
            </ul> 
        </div>

        <div id="content-princ-izq">
            <?php
            if (isset($vistaIzquierda)) {
                echo $vistaIzquierda;
            }
            ?>
        </div>
        <div id = "content-princ-der">
            <?php
            if (isset($vistaDerecha)) {
                echo $vistaDerecha;
            }
            ?>
        </div>
        <div class="clear"></div>
    </div>    
</div>
