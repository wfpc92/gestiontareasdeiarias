
<h2><?php echo "Fecha: " . $fecha; ?></h2>

<?php
$userId = Yii::app()->user->getId();

$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => "FECHA_INICIO = '{$fecha}' "
        . " AND CORREO = '{$userId}'"
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view',
    'enablePagination' => false,
    'htmlOptions' => array(
    ))
);
?>