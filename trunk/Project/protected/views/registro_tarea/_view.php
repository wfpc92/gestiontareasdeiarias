<?php
/* @var $data RegistroTarea */
/* @var $form CActiveForm */

$idTarea = $data->id_tarea;
$idRegistroTarea = $data->id_registro_tarea;
?>
<div id="registro-tarea-view-<?php echo $idRegistroTarea; ?>">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'registro-tarea-form-' . $idRegistroTarea,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array()
    ));

    echo $form->hiddenField($data, 'id_tarea');
    echo $form->hiddenField($data, 'id_registro_tarea');

    $fechaInicio = $data->fechaInicioFormatoPicker();
    $idDatePicker = "d-picker-fecha-inicio-registro-tarea-{$idRegistroTarea}";
    echo $form->labelEx($data, 'fecha_inicio');
    echo CHtml::textField('fecha_inicio', $fechaInicio, array(
        'id' => $idDatePicker,
        'class' => 'dpicker',
        'title' => 'Ingrese la fecha en que inicia la tarea.'
    ));

    $horaInicio = $data->horaInicioFormatoPicker();
    $horaInicioFormatoDate = $data->horaInicioFormatoDate();
    $idTimePicker = "d-picker-hora-inicio-registro-tarea-{$idRegistroTarea}";
    echo CHtml::label("Hora Inicio:", "hora_inicio");
    echo CHtml::textField('hora_inicio', $horaInicio, array(
        'id' => $idTimePicker,
        'name' => 'timepicker',
        'class' => 'time_element',
        'title' => 'Ingrese la hora en que inicia la tarea.'
    ));

    echo $form->labelEx($data, 'duracion');
    echo $form->textField($data, 'duracion');

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

</div>
<script>


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
    $("#<?php echo $idTimePicker; ?>")
            .timepicki({
                fecha: <?php echo CJavaScript::encode($horaInicioFormatoDate); ?>
            });


</script>
