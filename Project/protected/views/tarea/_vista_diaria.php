<?php
$fechaFormato = Calendario::getFechaFormato();
?>
<h2><?php echo Calendario::getFechaFormatoHoy(); ?></h2>

<?php
/**
 * Obtener las tareas que hay para el dia
 */
$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => " id_usuario = {$userId}"
        . " and fecha_inicio = '{$fechaFormato}' "
        . " and Diaria != 0"
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view',
    'enablePagination' => false,
    'htmlOptions' => array(
        'id' => 'lst-tarea-diaria',
        'ondrop' => "drop(event)",
        'ondragover' => "allowDrop(event)"
    ))
);
