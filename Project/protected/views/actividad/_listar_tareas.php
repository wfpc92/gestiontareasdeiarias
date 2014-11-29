<?php
/* @var $model Actividad */

$idActividad = $model->id_actividad;
$nombreActividad = $model->nombre_actividad;

$modelTarea = new Tarea;
$modelTarea->id_actividad = $idActividad;
?>

<div class="nombre-actividad"><span>Actividad: </span><?php echo $nombreActividad; ?></div>

<?php
$this->renderPartial('../tarea/_form', array(
    'model' => $modelTarea
));

$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => "id_actividad={$idActividad}"
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view',
    'enablePagination' => false,
    'htmlOptions' => array(
        'id' => "tareas-{$idActividad}"
    ))
);
