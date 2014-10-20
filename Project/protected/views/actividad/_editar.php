<?php
/* @var $this CategoriaController */
/* @var $model Actividad */
/* @var $form CActiveForm */

$idActividad = $model->ID_ACTIVIDAD;
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'actividad-editar-form-' . $idActividad,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/actividad',
    ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'ID_ACTIVIDAD');
        echo $form->textField($model, 'NOMBRE_ACTIVIDAD', array(
            'id' => 'txt-actividad-editar-form-' . $idActividad,
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Editar Actividad'));
        echo $form->error($model, 'NOMBRE_ACTIVIDAD');
        ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton("Editar Actividad", array(
            'id' => 'btn-actividad-editar-form-' . $idActividad,
            'onclick' => 'return actividadEditarAjax(this)'
        ));
        ?>
    </div>
    <div class="clearFix"></div>

    <?php $this->endWidget(); ?>

</div>
