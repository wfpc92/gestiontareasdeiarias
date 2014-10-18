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
    echo CHtml::tag('p', array(
        'id' => 'p-tarea-nombre-' . $idTarea)
            , CHtml::encode($data->NOMBRE_TAREA));

    $label = "Eliminar Tarea";
    $htmlOptions = array(
        'id' => 'lnk-eliminar-tarea-' . $idTarea,
        'name' => 'lnk-eliminar-tarea-' . $idTarea,
        'onclick' => 'return tareaEliminarAjax(this)'
    );
    echo CHtml::link($label, "#", $htmlOptions);

    $this->endWidget();
    ?>
    <a class="eliminar-tarea" href="#">Eliminar</a>
    <br />
</div>