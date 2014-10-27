<?php
/* @var $this TareaController */
/* @var $model Tarea */
/* @var $form CActiveForm */

$idActividad = $model->ID_ACTIVIDAD;
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tarea-form-' . $idActividad,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/tarea/crearAjax',
        'htmlOptions' => array(
            'onsubmit' => 'return tareaCrearAjax(this)',
            'class' => 'formTarea'
        )
    ));
    ?>

    <div id="tarea-form-error<?php echo $idActividad; ?>" class="error"></div>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'ID_ACTIVIDAD');
        echo $form->labelEx($model, 'NOMBRE_TAREA');
        echo $form->textField($model, 'NOMBRE_TAREA', array(
            'id' => 'txt-tarea-' . $idActividad,
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Nueva Tarea'));
        echo $form->error($model, 'NOMBRE_TAREA');
        ?>
    </div>


    <div class="row buttons">
        <?php
        $label = "Nueva tarea";
        $htmlOptions = array(
            'id' => 'btn-crear-tarea-' . $idActividad,
            'name' => 'btn-crear-tarea-' . $idActividad
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>
        <div class="clearFix"></div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->