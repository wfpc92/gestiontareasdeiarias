<div class="reportes-tareas-completadas">
    <h2>Tareas Completadas</h2>
    <p>La fecha inicial y final determinaran que tareas se han terminado y cuales estan pendiente en ese rango de tiempo</p>
    <p>Por favor ingrese la fecha inicial y final del reporte.</p>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tareas-form',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/reportes/tareasCompletadas',
        'htmlOptions' => array(
            'class' => 'formReporteTareasCompletadas'
        )
    ));
    ?>
    <div class="row fecha-inicio">
        <?php
        $model = new Tarea;
        echo $form->labelEx($model, 'FECHA_INICIO');
        echo $form->textField($model, 'FECHA_INICIO', array(
            'id' => 'd-picker-fecha-inicio',
            'class' => 'dpicker',
            'title' => 'Ingrese la fecha en que inicia la tarea.',
            'value' => ''
        ));
        ?>
    </div>
    <div class="row fecha-fin">
        <?php
        echo $form->labelEx($model, 'FECHA_FIN');
        echo $form->textField($model, 'FECHA_FIN', array(
            'id' => 'd-picker-fecha-fin',
            'class' => 'dpicker',
            'title' => 'Ingrese la fecha en que finaliza la tarea.',
            'value' => ''
        ));
        ?>
    </div>
    <div class="row buttons">
        <?php
        $label = "Consultar";
        $htmlOptions = array(
            'id' => 'enviar-formulario-tarea',
            'class' => 'enviar-tarea'
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>
        <?php echo CHtml::Button('Regresar', array('submit' => '../reportes', 'class' => 'regresar-reportes')); ?>
        <div class="clearFix"></div>
    </div>
    <?php
    $this->endWidget();
    ?>
</div>
<script>
    $(document).ready(function() {
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
    });
</script>