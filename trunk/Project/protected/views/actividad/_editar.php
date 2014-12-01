<?php
/* @var $this CategoriaController */
/* @var $model Actividad */
/* @var $form CActiveForm */

$idActividad = $model->id_actividad;
?>

<div class="form form-editar-actividad">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => "actividad-editar-form-{$idActividad}",
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/actividad',
    ));
    ?>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'id_actividad');
        echo $form->textField($model, 'nombre_actividad', array(
            'id' => "txt-actividad-editar-form-{$idActividad}",
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Editar Actividad'));
        echo $form->error($model, 'nombre_actividad');
        ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton("Editar Actividad", array(
            'id' => "btn-actividad-editar-form-{$idActividad}",
            'onclick' => 'return actividadEditarAjax(this)',
            'title' => 'Modificar Nombre de la Actividad.'
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
