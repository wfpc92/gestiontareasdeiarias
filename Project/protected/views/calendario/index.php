<?php
/* @var $this CalendarioController */
/* @var $dataProvider CActiveDataProvider */
?>

<div id="calendar"></div>
<?php

$this->widget('ext.EFullCalendar.EFullCalendar', array(
    'themeCssFile' => 'cupertino/theme.css',
    'htmlOptions' => array(
    ),
    'lang'=>'es',
    'options' => array(
        'header' => array(
            'left' => 'prev,next',
            'center' => 'title',
            'right' => 'today,month',
        ),
        'editable' => true,
        'selectable' => true,
        'selectHelper' => true,
        'dayClick' => 'js:function(date) {
                var direccion = "' . Yii::app()->createUrl("tarea/vistaDiaria") . '";' .
        'var fecha = date.toJSON();
                location.href = direccion + "?fecha="+fecha ;
            }',
        'eventClick' => 'js:function(calEvent, jsEvent, view) {
                var direccion = "' . Yii::app()->createUrl("tarea/vistaDiaria") . '";' .
        'var fecha = calEvent.start.toJSON();
                location.href = direccion + "?fecha="+fecha ;
            }',
        'events' => Yii::app()->createUrl('calendario/calendarEvents'),
    )
        )
);
?>

<script>
    $(document).ready(function () {
        tareaCerrar();
    });
</script>


