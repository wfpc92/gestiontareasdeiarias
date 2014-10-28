<?php
$dia = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
$mes = array(null, "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$numdia = date_format($fecha, "w"); //muestra el día de la semana
$nummes = date_format($fecha, "n");
$diames = date_format($fecha, "j"); //muestra el día del mes
$anho = date_format($fecha, "Y");
$fechaFormato = date_format($fecha, "Y-m-d");
?>
<h2><?php echo "Fecha: $dia[$numdia], $diames de $mes[$nummes] del $anho"; ?></h2>

<?php
$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => "FECHA_INICIO = '{$fechaFormato}' "
        . " AND CORREO = '{$userId}'"
        . " AND ID_ACTIVIDAD IS NOT NULL"
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view',
    'enablePagination' => false,
    'htmlOptions' => array(
    ))
);
