<?php
/* @var $model Actividad */

$idActividad = $model->ID_ACTIVIDAD;

$modelTarea = new Tarea;
$modelTarea->ID_ACTIVIDAD = $idActividad;
?>

<div class=""><?php echo $model->NOMBRE_ACTIVIDAD; ?></div>

<?php
$this->renderPartial('../tarea/_form', array(
    'model' => $modelTarea
));

$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => "ID_ACTIVIDAD={$idActividad}"
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view',
    'enablePagination' => false,
    'htmlOptions' => array(
        'id' => "tarea-{$idActividad}"
    ))
);