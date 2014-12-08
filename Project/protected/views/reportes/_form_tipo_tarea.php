<div lass="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tareas-form',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/reportes/dedicacion',
        'htmlOptions' => array(
            'class' => 'formReporteDedicacion'
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
            'value' => '2014-01-01'
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
            'value' => '2014-12-19'
        ));
        ?>
    </div>
    <div class="row buttons">        
        <?php echo CHtml::Button('Regresar', array('submit' => '../reportes', 'class' => 'regresar-reportes')); ?>
        <?php
        $label = "Consultar";
        $htmlOptions = array(
            'id' => 'enviar-formulario-tarea',
            'class' => 'enviar-tarea'
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>
        <div class="clearFix"></div>
    </div>
    <?php
    $this->endWidget();
    ?>
</div>
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