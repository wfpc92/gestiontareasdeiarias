<?php
/* @var $this TareaController */
/* @var $data Tarea */
/* @var $form CActiveForm */

$idTarea = $data->ID_TAREA;
?>

<div id="tarea-view-<?php echo $idTarea; ?>"
     class="view">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tarea-mostrar-form-' . $idTarea,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array(
            'onclick' => 'return tareaMostrarAjax(this)',
            'class' => ''
        )
    ));

    echo $form->errorSummary($data);
    echo $form->hiddenField($data, 'ID_TAREA');
    
    //echo $form->checkBox($model, '');
    echo CHtml::tag('p', array(
        'id' => 'p-tarea-nombre-' . $idTarea)
            , CHtml::encode($data->NOMBRE_TAREA));



    $label = "Play Tarea";
    $htmlOptions = array(
        'id' => 'btn-play-tarea-' . $idTarea,
        'name' => 'btn-play-tarea-' . $idTarea,
        'class' => ''
    );
    echo CHtml::button($label, $htmlOptions);

    $label = "Pausar Tarea";
    $htmlOptions = array(
        'id' => 'lnk-pausar-tarea-' . $idTarea,
        'name' => 'lnk-pausar-tarea-' . $idTarea,
        'class' => ''
    );
    echo CHtml::button($label, $htmlOptions);

    echo CHtml::tag('p', array(
        'id' => 'p-duracion-tarea-' . $idTarea
            ), $data->DURACION);


    $label = "Eliminar Tarea";
    $htmlOptions = array(
        'id' => 'lnk-eliminar-tarea-' . $idTarea,
        'name' => 'lnk-eliminar-tarea-' . $idTarea,
        'class' => 'eliminar-tarea',
        'onclick' => 'return tareaEliminarAjax(this)'
    );
    echo CHtml::link($label, "#", $htmlOptions);

    $this->endWidget();
    ?>
    <a class="menu-tarea" href="#">Menú Tarea</a>
    <br />
</div>
