<?php
/* @var $this TareaController */
/* @var $model Tarea */
/* @var $form CActiveForm */

$idTarea = $model->id_tarea;
?>

<div class="form editar-tarea">
    <h3>Editar tarea </h3>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => "tarea-editar-form-{$idTarea}",
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/tarea/actualizarAjax',
        'htmlOptions' => array(
            'onsubmit' => "return tareaGuardarAjax(this)",
            'class' => 'form-editar-tarea'
        )
    ));

    echo $form->hiddenField($model, "id_actividad");
    echo $form->hiddenField($model, "id_tarea");
    ?>

    <div id="tarea-editar-form-error-<?php echo $idTarea; ?>" class="error"></div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'nombre_tarea');
        echo $form->textField($model, 'nombre_tarea', array(
            'size' => 60,
            'maxlength' => 100,
            'id' => 'txt-tarea-nombre-' . $idTarea,
            'title' => 'Ingrese el nombre la tarea. (ej: hacer taller de calculo)'
        ));
        echo $form->error($model, 'nombre_tarea');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'descripcion');
        echo $form->textArea($model, 'descripcion', array('size' => 60, 'maxlength' => 255));
        echo $form->error($model, 'descripcion');
        ?>
    </div>

    <div class="row fecha-inicio">
        <?php
        $fechaInicio = $model->fechaInicioFormatoPicker();
        echo $form->labelEx($model, 'fecha_inicio');
        echo CHtml::textField('Tarea[fecha_inicio]', $fechaInicio, array(
            'id' => 'd-picker-fecha-inicio',
            'class' => 'dpicker',
            'title' => 'Ingrese la fecha en que inicia la tarea.'
        ));
        echo $form->error($model, 'fecha_inicio');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'prioridad');
        echo CHtml::dropDownList(
                'Tarea[prioridad]'
                , $model->prioridad
                , array(
            Tarea::PRIORIDADALTA => Tarea::PRIORIDADALTA,
            Tarea::PRIORIDADMEDIA => Tarea::PRIORIDADMEDIA,
            Tarea::PRIORIDADBAJA => Tarea::PRIORIDADBAJA
                )
                , array('title' => 'Ingrese el nivel de prioridad que le va a asignar a la tarea.',)
        );
        echo $form->error($model, 'prioridad');
        ?>
    </div>

    <div class="row">
        <?php
        $nombreTipoTarea = $model->id_tipo_tarea != NULL ? $model->id_tipo_tarea : NULL;
        //TipoTarea::model()->nombreTipoTarea($model->id_tipo_tarea);
        $listaNombresTipoTarea = TipoTarea::model()->todosTipoTareas();
        echo $form->labelEx($model, 'id_tipo_tarea');
        echo CHtml::dropDownList(
                'Tarea[id_tipo_tarea]'
                , $nombreTipoTarea
                , $listaNombresTipoTarea
                , array('title' => 'Ingrese el nivel de prioridad que le va a asignar a la tarea.',)
        );
        echo $form->error($model, 'id_tipo_tarea');
        ?>
    </div>


    <div class="row inamovible">
        <?php
        echo $form->labelEx($model, 'inamovible');
        $inaChecked = $model->inamovible == Tarea::INAMOVIBLESI ? true : false;
        echo CHtml::checkBox('inamovible', $inaChecked, array(
            'title' => 'Las tareas inamovibles son aquellas que finalizan en la fecha de finalizacion.'
            . ' El resto de tareas se programaran para el proximo dia.'
        ));
        echo $form->error($model, 'inamovible');
        ?>
        <div class="clearFix"></div>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton("Cerrar", array(
            'id' => 'btn-cerrar-tarea-' . $idTarea,
            'class' => '',
            'onclick' => 'return tareaCerrar(this)'
        ));
        
        echo CHtml::submitButton("Guardar", array(
            'id' => 'btn-guardar-tarea-' . $idTarea,
            'class' => 'guardar-tarea'
        ));        
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
