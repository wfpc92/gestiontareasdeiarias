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

        <!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'ID_FRECUENCIA'); ?>
        <?php echo $form->textField($model, 'ID_FRECUENCIA'); ?>
        <?php echo $form->error($model, 'ID_FRECUENCIA'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'ACTIVIDAD'); ?>
        <?php
        $actividades = CHtml::listData(Actividad::model()->findAll(), 'ID_ACTIVIDAD', 'NOMBRE_ACTIVIDAD');
        echo $form->dropDownList($model, 'ID_ACTIVIDAD', $actividades)
        ?>

        <?php echo $form->error($model, 'ID_ACTIVIDAD'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'NOMBRE_TAREA'); ?>
        <?php echo $form->textField($model, 'NOMBRE_TAREA', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'NOMBRE_TAREA'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'FECHA_INICIO'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'FECHA_INICIO',
            'value' => $model->FECHA_INICIO,
            'language' => 'es',
            //'htmlOptions' => array('readonly'=>"readonly"),
            'options' => array(
                'autoSize' => true,
                'defaultDate' => $model->FECHA_INICIO,
                'dateFormat' => 'yy-mm-dd',
                //'buttonImage'=>Yii::app()->baseUrl.'/images/calendario.jpg',
                'buttonImageOnly' => true,
                'buttonText' => 'Fecha',
                'selectOtherMonths' => true,
                'showAnim' => 'slide',
                'showButtonPanel' => true,
                'showOn' => 'focus',
                'showOtherMonths' => true,
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'minDate' => 'date("Y-m-d")',
                'maxDate' => "+20Y",
            ),
        ));
        ?>
        <?php echo $form->error($model, 'FECHA_INICIO'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'FECHA_FIN'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'FECHA_FIN',
            'value' => $model->FECHA_FIN,
            'language' => 'es',
            //'htmlOptions' => array('readonly'=>"readonly"),
            'options' => array(
                'autoSize' => true,
                'defaultDate' => $model->FECHA_FIN,
                'dateFormat' => 'yy-mm-dd',
                //'buttonImage'=>Yii::app()->baseUrl.'/images/calendario.jpg',
                'buttonImageOnly' => true,
                'buttonText' => 'Fecha',
                'selectOtherMonths' => true,
                'showAnim' => 'slide',
                'showButtonPanel' => true,
                'showOn' => 'focus',
                'showOtherMonths' => true,
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'minDate' => 'date("Y-m-d")',
                'maxDate' => "+20Y",
            ),
        ));
        ?>
        <?php echo $form->error($model, 'FECHA_FIN'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'PRIORIDAD'); ?>
        <?php echo $form->dropDownList($model, 'PRIORIDAD', array("1" => "Alta", "2" => "Media", "3" => "Baja")); ?>
        <?php echo $form->error($model, 'PRIORIDAD'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'INAMOVIBLE'); ?>
        <?php echo $form->checkBox($model, 'INAMOVIBLE', array('checked' => 1, 'unchecked' => 0)); ?>		
        <?php echo $form->error($model, 'INAMOVIBLE'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'HORA_INICIO'); ?>
        <?php echo $form->textField($model, 'HORA_INICIO'); ?>
        <?php echo $form->error($model, 'HORA_INICIO'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'HORA_FIN'); ?>
        <?php echo $form->textField($model, 'HORA_FIN'); ?>
        <?php echo $form->error($model, 'HORA_FIN'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::Button('Guardar', array('submit' => 'index.php/tarea/create')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->