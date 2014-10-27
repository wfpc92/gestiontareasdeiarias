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
        'action' => Yii::app()->homeUrl . '/tarea/actualizarAjax',
        'htmlOptions' => array(
            'onsubmit' => "return tareaGuardarAjax(this)",
            'onchange' => "return tareaActualizarAjax(this)",
            'class' => 'form-editar-tarea'
        )
    ));
    ?>

    <div id="tarea-editar-form-error-<?php echo $idTarea; ?>" class="error"></div>

    <div class="row">
        <?php
        echo $form->hiddenField($model, "ID_ACTIVIDAD");
        echo $form->hiddenField($model, "ID_TAREA");
        echo $form->labelEx($model, 'NOMBRE_TAREA');
        echo $form->textField($model, 'NOMBRE_TAREA', array(
            'size' => 60,
            'maxlength' => 100,
            'id' => 'txt-tarea-nombre-' . $idTarea,
            'title' => 'Ingrese el nombre la tarea. (ej: hacer taller de calculo)'
        ));
        echo $form->error($model, 'NOMBRE_TAREA');
        ?>
    </div>

    <div class="row">
        Descripcion de la tarea:(no implementada)
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'FECHA_INICIO');
        echo $form->textField($model, 'FECHA_INICIO', array(
            'id' => 'd-picker-fecha-inicio',
            'class' => 'dpicker',
            'title' => 'Ingrese la fecha en que inicia la tarea.'
        ));
        echo $form->error($model, 'FECHA_INICIO');

        echo $form->labelEx($model, 'FECHA_FIN');
        echo $form->textField($model, 'FECHA_FIN', array(
            'id' => 'd-picker-fecha-fin',
            'class' => 'dpicker',
            'title' => 'Ingrese la fecha en que finaliza la tarea.'
        ));
        echo $form->error($model, 'FECHA_FIN');
        ?>
    </div>

    <div class="row">
        Frecuencia (no implementada aun).
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'PRIORIDAD');
        echo $form->dropDownList($model, 'PRIORIDAD', array(
            "1" => "Alta", "2" => "Media", "3" => "Baja"), array(
            'title' => 'Ingrese el nivel de prioridad que le va a asignar a la tarea.'
        ));
        echo $form->error($model, 'PRIORIDAD');
        ?>
    </div>

    <div class="row">
        Tipo de Tarea: (investigacion, docencia, servicios, etc) (no implementada aun).
    </div>


    <div class="row">
        <?php
        echo $form->labelEx($model, 'INAMOVIBLE');
        echo $form->checkBox($model, 'INAMOVIBLE', array(
            'checked' => 1, 'unchecked' => 0,
            'title' => 'Las tareas inamovibles son aquellas que finalizan en la fecha de finalizacion.'
            . ' El resto de tareas se programaran para el proximo dia.'
        ));
        echo $form->error($model, 'INAMOVIBLE');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'HORA_INICIO');
        echo $form->textField($model, 'HORA_INICIO', array(
            'title' => 'Ingrese la hora en que iniciara la tarea.'
        ));
        echo $form->error($model, 'HORA_INICIO');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'HORA_FIN');
        echo $form->textField($model, 'HORA_FIN', array(
            'title' => 'Ingrese la hora en que finaliza la tarea.'
        ));
        echo $form->error($model, 'HORA_FIN');
        ?>
    </div>

    <div class="row buttons">
        <?php
        $label = "Guardar";
        $htmlOptions = array(
            'id' => 'btn-guardar-tarea-' . $idTarea,
            'class' => 'guardar-tarea'
        );
        echo CHtml::submitButton($label, $htmlOptions);

        $label = "Cerrar";
        $htmlOptions = array(
            'id' => 'btn-cerrar-tarea-' . $idTarea,
            'class' => '',
            'onclick' => 'return tareaCerrar(this)'
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>

    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->

<script>
    $(".dpicker").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd',
        showOn: "both",
        buttonImage: "<?php echo Yii::app()->baseUrl . "/images/calendar.gif"; ?>",
        buttonImageOnly: true,
        buttonText: "Seleccione una Fecha."
    });
</script>
