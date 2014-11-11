<?php
$fechaFormato = Calendario::getFechaFormato();

?>
<h2><?php echo Calendario::getFechaFormatoHoy(); ?></h2>

<?php
$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => "FECHA_INICIO = '{$fechaFormato}' "
        . " AND CORREO = '{$userId}'"
        . " AND ID_ACTIVIDAD != 0"
    ))
);        

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view',
    'enablePagination' => false,
    'htmlOptions' => array(
    ))
);