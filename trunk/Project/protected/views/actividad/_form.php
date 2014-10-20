<?php
/* @var $this ActividadController */
/* @var $model Actividad */
/* @var $form CActiveForm */

$idCategoria = $model->ID_CATEGORIA;
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'actividad-form-' . $idCategoria,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/actividad/crearAjax',
        'htmlOptions' => array(
            'onsubmit' => 'return actividadCrearAjax(this)',
            'class' => 'formActividad'
        )
    ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'ID_CATEGORIA');
        echo $form->labelEx($model, 'NOMBRE_ACTIVIDAD');
        echo $form->textField($model, 'NOMBRE_ACTIVIDAD', array(
            'id' => 'txt-actividad-' . $idCategoria,
            'class' => 'input-categoria',
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Agregar Actividad'));
        echo $form->error($model, 'NOMBRE_ACTIVIDAD');
        ?>
    </div>

    <div class="row buttons">
        <?php
        $label = "agregar actividad";
        $htmlOptions = array(
            'id' => 'btn-crear-actividad-' . $idCategoria,
            'name' => 'btn-crear-actividad-' . $idCategoria
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
