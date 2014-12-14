<?php
/* @var $this TareaController */
/* @var $data Tarea */
/* @var $form CActiveForm */

$idTarea = $data->id_tarea;
$fechaFormato = Calendario::getFechaFormato();
?>

<div id="tarea-view-<?php echo $idTarea; ?>" class="view">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => "tarea-mostrar-form-{$idTarea}",
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array(
            'class' => 'form-tarea'
        )
    ));

    echo $form->hiddenField($data, 'id_tarea');
    echo $form->hiddenField($data, 'fecha_inicio');
    echo CHtml::hiddenField('FECHA_HOY', Calendario::getFechaFormato());

    $check = false;
    if ($data->estado == Tarea::ESTADOFINALIZADA) {
        $check = true;
    }
    echo CHtml::checkBox("estado", $check, array(
        'onchange' => 'return tareaCheckAjax(this)',
        'title' => 'Finalizar Tarea.'
    ));

    $nomCompleto = "{$data->nombre_tarea} ";
    //$maxLog = 25;
    $maxLog = 40;
    $nomAbreviado = substr($nomCompleto, 0, strrpos(substr($nomCompleto, 0, $maxLog), " "));
    if (strlen($nomCompleto) > $maxLog) {
        $nomAbreviado .= "...";
    }

    echo CHtml::tag('p', array(
        'id' => "p-tarea-nombre-{$idTarea}",
        'onclick' => 'return tareaToogle(this)',
        'title' => $nomCompleto
            ), $nomAbreviado);

    $nomCompleto = "{$data->idActividad->nombre_actividad} ";
    $nomAbreviado = substr($nomCompleto, 0, strrpos(substr($nomCompleto, 0, $maxLog), " "));

    echo CHtml::tag('p', array(
        'id' => "p-tarea-actividad-{$idTarea}",
        'class' => 'tarea-actividad',
        'title' => $nomCompleto
            ), $nomAbreviado);
    ?>
    <div class="botones">
        <?php
        $disabledPlayAttr = ($data->estado == Tarea::ESTADONUEVA || $data->estado == Tarea::ESTADOEJECUCION ? '0' : "disabled");
        $disabledPlayValue = ($data->estado == Tarea::ESTADONUEVA || $data->estado == Tarea::ESTADOEJECUCION ? '0' : "disabled");

        $disabledPausaAttr = ($data->estado == Tarea::ESTADOPAUSA ? '0' : "disabled");
        $disabledPausaValue = ($data->estado == Tarea::ESTADOPAUSA ? '0' : "disabled");

        echo CHtml::button("Play Tarea", array(
            'id' => "btn-play-tarea-{$idTarea}",
            'class' => 'play-tarea',
            'onclick' => 'return tareaIniciarAjax(this)',
            'title' => 'Iniciar Tiempo.',
            $disabledPlayAttr => $disabledPlayValue
        ));

        echo CHtml::button("Pausar Tarea", array(
            'id' => "btn-pausar-tarea-{$idTarea}",
            'class' => 'pause-tarea',
            'onclick' => 'return tareaPausarAjax(this)',
            'title' => 'Pausar Tiempo.',
            $disabledPausaAttr => $disabledPausaValue
        ));
        ?>
        <div>
            <?php
        //echo CHtml::label("Duracion", "p-duracion-tarea-{$idTarea}");
        echo CHtml::tag('span', array(
                ), "Duración ");
        echo CHtml::tag('span', array(
            'id' => "p-duracion-tarea-{$idTarea}"
                ), $data->getDuracion());
        ?>
        </div>
        
        <div class="clearFix"></div>
    </div>
    <?php
    echo CHtml::link("Menú Tarea", "", array(
        'class' => 'menu-tarea',
        'onclick' => 'return tareaMenu(this)'
    ));
    ?>
    <ul class="tarea">
        <li class="editar">
            <?php
            echo CHtml::link("Editar", "#", array(
                'id' => "lnk-tarea-editar-form-{$idTarea}",
                'onclick' => 'return tareaMostrarAjax(this)'
            ));
            ?>
        </li>
        <li class="eliminar">
            <?php
            echo CHtml::link("Eliminar", "#", array(
                'id' => 'lnk-tarea-eliminar-' . $idTarea,
                'onclick' => 'return tareaEliminarModal(this)'
            ));
            ?>
        </li>
    </ul>

    <?php $this->endWidget(); ?>

    <div class="desplegable">
        <?php
        $dataProvider = new CActiveDataProvider('RegistroTarea', array(
            'pagination' => false,
            'criteria' => array(
                'condition' => "id_tarea={$idTarea}"
            )
        ));

        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '../registro_tarea/_view',
            'enablePagination' => false,
            'htmlOptions' => array(
                'id' => "lst-registro-tarea-{$idTarea}"
            )
        ));
        ?>
        
        <div class="clearFix"></div>
    </div>


</div>
