<?php
/* @var $this ActividadController */
/* @var $model Actividad */
/* @var $form CActiveForm */

$idCategoria = $model->id_categoria;
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => "actividad-form-{$idCategoria}",
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/actividad/crearAjax',
        'htmlOptions' => array(
            'onsubmit' => 'return actividadCrearAjax(this)',
            'class' => 'formActividad'
        )
    ));
    ?>

    <div id="actividad-form-error-<?php echo $idCategoria; ?>" class="error"></div>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'id_categoria');
        echo $form->labelEx($model, 'nombre_actividad');
        echo $form->textField($model, 'nombre_actividad', array(
            'id' => "txt-actividad-{$idCategoria}",
            'class' => 'input-categoria',
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Nombre Actividad'
        ));
        echo $form->error($model, 'nombre_actividad');
        ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton("Nueva actividad", array(
            'id' => "btn-crear-actividad-{$idCategoria}",
            'name' => "btn-crear-actividad-{$idCategoria}",
            'title' => 'Agregar Actividad.'
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
