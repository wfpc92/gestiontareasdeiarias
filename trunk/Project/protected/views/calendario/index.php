<?php
/* @var $this CalendarioController */
/* @var $dataProvider CActiveDataProvider */
?>

<div id="calendar"></div>
<?php
$this->widget('ext.EFullCalendar.EFullCalendar', array(
    'themeCssFile' => 'cupertino/theme.css',
    'htmlOptions' => array(
        'style' => 'width:800px; margin: 0 auto;'
    ),
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
        'event' => Yii::app()->createUrl('CalendarioController/CalendarEvents'),
    )
        )
);


