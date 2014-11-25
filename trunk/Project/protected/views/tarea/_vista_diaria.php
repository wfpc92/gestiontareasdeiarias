<?php
$fechaFormato = Calendario::getFechaFormato();
?>
<h2><?php echo Calendario::getFechaFormatoHoy(); ?></h2>

<?php
$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
    'condition' => "Diaria != 0 AND FECHA_INICIO='{$fechaFormato}'"
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
