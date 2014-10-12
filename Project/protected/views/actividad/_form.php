<?php
/* @var $this ActividadController */
/* @var $model Actividad */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'actividad-form',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl
    ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'ID_CATEGORIA');
        echo $form->labelEx($model, 'NOMBRE_ACTIVIDAD');
        echo $form->textField($model, 'NOMBRE_ACTIVIDAD', array('class' => 'input_categoria', 'size' => 60, 'maxlength' => 100, 'placeholder' => 'Agregar Actividad'));
        echo $form->error($model, 'NOMBRE_ACTIVIDAD');
        ?>
    </div>

    <div class="row buttons">
        <?php
        $label = "agregar";
        $url = Yii::app()->homeUrl . '/actividad/crearAjax';
        $data = array(
            'success' => file_get_contents('js/ajax/actividad/crear.js'),
            'error' => file_get_contents('js/ajax/actividad/error_crear.js'),
            'dataType' => 'json'
        );
        $htmlOptions = array(
            'id' => 'btnCrearActividad_' . $model->ID_CATEGORIA,
            'name' => 'btnCrearActividad_' . $model->ID_CATEGORIA
        );
        echo CHtml::ajaxSubmitButton($label, $url, $data, $htmlOptions);
        ?>
        <div class="clearFix"></div>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
