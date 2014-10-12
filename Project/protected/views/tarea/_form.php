<?php
/* @var $this TareaController */
/* @var $model Tarea */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tarea-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'NOMBRE_TAREA');
        echo $form->textField($model, 'NOMBRE_TAREA', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Agregar Tarea'));
        echo $form->error($model, 'NOMBRE_TAREA');
        ?>
    </div>


    <div class="row buttons">
        <?php
        $label = "crearTarea";
        $url = Yii::app()->homeUrl . '/tarea/crearAjax';
        $data = array(
            'success' => file_get_contents('js/ajax/tarea/crear.js'),
            'error' => file_get_contents('js/ajax/tarea/error_crear.js')
        );
        $htmlOptions = array(
            'id'=>'btnCrearTarea_'.$model->ID_ACTIVIDAD
        );

        echo CHtml::ajaxSubmitButton($label, $url, $data);
        ?>
        <div class="clearFix"></div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->