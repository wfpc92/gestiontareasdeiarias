<?php
/* @var $this CalendarioController */
/* @var $dataProvider CActiveDataProvider */

$cs = Yii::app()->clientScript;
$bu = Yii::app()->baseUrl . '/';
//$cs->registerCssFile($bu . 'js/fullcalendar/fullcalendar.css');
//$cs->registerScriptFile($bu . 'js/fullcalendar/fullcalendar.js');
//$cs->registerScriptFile($bu . 'js/fullcalendar/lib/moment.min.js');
//$cs->registerScriptFile($bu . 'js/fullcalendar/lang-all.js');
?>

<div id="calendar"></div>
<!--
<script id="calendar-script">
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            height: 450,
            contentHeight: 400,
            header: {
                left: 'prevYear,prev,next,nextYear today',
                center: 'title',
                right: 'month'
            },
            editable: true,
            events: [
                /* {
                 title: 'All Day Event',
                 start: '2014-10-17',
                 //url: 'http://localhost/Project/index.php'
                 editable: true
                 },
                 {
                 title: 'Long Event',
                 start: '2014-10-17',
                 end: '2014-10-18',
                 //url: 'http://localhost/Project/index.php'
                 },*/
            ],
            eventLimit: true,
            columnFormat: {
                month: 'dddd',
                week: 'dddd, MMM dS',
                day: 'dddd, MMM dS'
            },
            timeFormat: {
                agenda: '',
                '': 'H:mm{ - H:mm}'
            },
            dayClick: function(date) {
                var direccion = "php //echo Yii::app()->createUrl("tarea/vistaDiaria");fin php";
                var fecha = date.toJSON();
                location.href = direccion + "?fecha="+fecha ;
                
    
            },
            eventRender: function(event, element, view)
            {
                element.bind('click', function()
                {
                    var day = ($.fullCalendar.formatDate(event.start, 'dd'));
                    var month = ($.fullCalendar.formatDate(event.start, 'MM'));
                    var year = ($.fullCalendar.formatDate(event.start, 'yyyy'));
                    alert('La fecha donde dio click es: ' + year + '-' + month + '-' + day);
                });
            },
            /*eventClick: function(event) {
             if (event.url) {
             window.open(event.url);
             return false;
             }
             }*/
        })
    });
</script> -->

<?php
    $this->widget('ext.EFullCalendar.EFullCalendar',array(
        'themeCssFile'=>'cupertino/theme.css',
        'htmlOptions'=>array(
            'style'=>'width:500px; margin: 0 auto;'
        ),
        'options'=>array(
            'header'=>array(
                'left'=>'prev,next',
                'center'=>'title',
                'right'=>'today,month',
            ),
            'editable'=>true,
            'selectable'=>true,
            'selectHelper'=>true,
            'dayClick'=> 'js:function(date) {
                var direccion = "'.Yii::app()->createUrl("tarea/vistaDiaria").'";'.
                'var fecha = date.toJSON();
                location.href = direccion + "?fecha="+fecha ;
            }',
            'event'=> Yii::app()->createUrl('CalendarioController/CalendarEvents'),
        )
    )
    );
?>


