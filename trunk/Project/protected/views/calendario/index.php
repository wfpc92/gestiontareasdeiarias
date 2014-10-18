
<?php
/* @var $this CalendarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calendarios',
); ?>
<html>
    <head>
        <h1>Calendario</h1>
        <!--<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
        <script src='lib/jquery.min.js'></script>
        <script src='lib/moment.min.js'></script>
        <script src='fullcalendar/fullcalendar.js'></script>-->
        <script src='fullcalendar/lang-all.js'></script>
        <div id="calendar"></div>
    </head>
    <body>
        <script id="calendar">
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    lang: 'es',
                    height: 450,
                    contentHeight: 400,
                    header: {
                        left: 'prevYear,prev,next,nextYear today',
                        center: 'title',
                        right: 'month'
                    },
                    editable: true,
                    events: [
                        {
                            title: 'All Day Event',
                            start: '2014-10-17',
                            /*url: 'http://localhost/Project/index.php'*/
                            editable: true
                        },
                        {
                            title: 'Long Event',
                            start: '2014-10-17',
                            end: '2014-10-18',
                            /*url: 'http://localhost/Project/index.php'*/
                        },
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
                        alert('Haz dado click en : ' + date);
                    },
                    eventRender: function(event, element, view)
                    {
                        element.bind('click', function()
                        {
                            var day = ($.fullCalendar.formatDate( event.start, 'dd' ));
                            var month = ($.fullCalendar.formatDate( event.start, 'MM' ));
                            var year = ($.fullCalendar.formatDate( event.start, 'yyyy' ));
                            alert('La fecha donde dio click es: '+year+'-'+month+'-'+day);
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
        </script>
    </body>
</html>
<!--    
<div id="calendar2">
    <?php 
        $this->widget('ext.EFullCalendar.EFullCalendar');        
    ?>
</div> -->
    
    