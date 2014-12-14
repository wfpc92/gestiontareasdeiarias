<?php
/* @var $data RegistroTarea */
/* @var $form CActiveForm */

$idTarea = $data->id_tarea;
$idRegistroTarea = $data->id_registro_tarea;
?>
<div id="registro-tarea-view-<?php echo $idRegistroTarea; ?>" class="registro-tarea">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'registro-tarea-form-' . $idRegistroTarea,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array(
            'onchange' => 'return registroTareaActualizarAjax(this)'
        )
    ));

    echo $form->hiddenField($data, 'id_tarea');
    echo $form->hiddenField($data, 'id_registro_tarea');

    $fechaInicio = $data->fechaInicioFormatoPicker();
    $idDatePicker = "d-picker-fecha-inicio-registro-tarea-{$idRegistroTarea}";
    ?>
    <div class="fecha-inicio">
        <?php
        echo $form->labelEx($data, 'fecha_inicio');
        echo CHtml::textField('fecha_inicio', $fechaInicio, array(
            'id' => $idDatePicker,
            'class' => 'dpicker',
            'title' => 'Ingrese la fecha en que inicia la tarea.'
        ));
        ?>
    </div>
    <?php
    $horaInicio = $data->horaInicioFormatoPicker();
    $horaInicioFormatoDate = $data->horaInicioFormatoDate();
    $idTimePicker = "d-picker-hora-inicio-registro-tarea-{$idRegistroTarea}";
    ?>
    <div class="hora-inicio">
        <?php
        echo CHtml::label("Hora Inicio", "hora_inicio");
        echo CHtml::textField('hora_inicio', $horaInicio, array(
            'id' => $idTimePicker,
            'name' => 'timepicker',
            'class' => 'hasTimepicker',
            'title' => 'Ingrese la hora en que inicia la tarea.'
        ));
        ?>
    </div>
    <div class="duracion">
        <?php
        echo $form->labelEx($data, 'duración');
        echo $form->textField($data, 'duracion', array(
            'id' => "txt-registro-tarea-duracion-{$idRegistroTarea}",
            'class' => 'duracion-registro-tarea'
        ));
        ?>
    </div>
    <div class="clearFix"></div>
    <?php
    echo CHtml::link("Menú Registro de Tarea", "", array(
        'class' => 'menu-registro-tarea',
        'onclick' => 'return registroTareaMenu(this)'
    ));
    ?>
    <ul class="registro-tarea">
        <li class="eliminar">
            <?php
            echo CHtml::link("Eliminar", "#", array(
                'id' => "lnk-registro-tarea-eliminar-{$idRegistroTarea}",
                'onclick' => 'return registroTareaEliminarModal(this)'
            ));
            ?>
        </li>
    </ul>
    <?php
    $this->endWidget();
    ?>
    <div class="clearFix"></div>
</div>

<script>
    $(document).ready(function() {
        $("#<?php echo $idDatePicker; ?>")
            .datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy-mm-dd',
                showOn: "both",
                buttonImage: "<?php echo Yii::app()->baseUrl . "/images/calendar.gif"; ?>",
                buttonImageOnly: true,
                buttonText: "Seleccione una Fecha."
        });
            
        $('.hora-inicio input').ptTimeSelect({
            setButtonLabel: "Seleccionar",
            minutesLabel: "Min",
            hoursLabel: "Hrs"
        });
    });
</script>
