<?php
/* @var $this TareaController */
/* @var $model Tarea */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $idTarea = $model->ID_TAREA;
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tarea-editar-form-' . $idTarea,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . "/tarea/actualizarAjax",
        'htmlOptions' => array(
            'onsubmit' => "return tareaActualizarAjax(this)",
            'onchange' => "return tareaActualizarAjax(this)",
            'class' => ''
        )
    ));
    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php
        echo $form->hiddenField($model, "ID_ACTIVIDAD");
        echo $form->hiddenField($model, "ID_TAREA");
        echo $form->labelEx($model, 'NOMBRE_TAREA');
        echo $form->textField($model, 'NOMBRE_TAREA', array('size' => 60, 'maxlength' => 100));
        echo $form->error($model, 'NOMBRE_TAREA');
        ?>
    </div>

    <div class="row">
        Descripcion de la tarea:(no implementada)
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'FECHA_INICIO');
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

        echo $form->labelEx($model, 'FECHA_FIN');
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

        echo $form->error($model, 'FECHA_INICIO');
        echo $form->error($model, 'FECHA_FIN');
        ?>
    </div>

    <div class="row">
        Frecuencia (no implementada aun).
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'PRIORIDAD');
        echo $form->dropDownList($model, 'PRIORIDAD', array("1" => "Alta", "2" => "Media", "3" => "Baja"));
        echo $form->error($model, 'PRIORIDAD');
        ?>
    </div>

    <div class="row">
        Tipo de Tarea: (investigacion, docencia, servicios, etc) (no implementada aun).
    </div>


    <div class="row">
        <?php
        echo $form->labelEx($model, 'INAMOVIBLE');
        echo $form->checkBox($model, 'INAMOVIBLE', array('checked' => 1, 'unchecked' => 0));
        echo $form->error($model, 'INAMOVIBLE');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'HORA_INICIO');
        echo $form->textField($model, 'HORA_INICIO');
        echo $form->error($model, 'HORA_INICIO');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'HORA_FIN');
        echo $form->textField($model, 'HORA_FIN');
        echo $form->error($model, 'HORA_FIN');
        ?>
    </div>

    <div class="row buttons">
        <?php
        $label = "Guardar";
        $htmlOptions = array(
            'id' => 'btn-guardar-tarea-' . $idTarea,
            'class' => ''
        );
        echo CHtml::submitButton($label, $htmlOptions);

        $label = "Cancelar";
        $htmlOptions = array(
            'id' => 'btn-cancelar-tarea-' . $idTarea,
            'class' => ''
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->