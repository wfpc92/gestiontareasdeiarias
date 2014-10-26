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

$form = '../tarea/_agregar_diaria';
$modelTarea = new Tarea;
$modelTarea->FECHA_INICIO = $fecha;
$this->renderPartial($form, array('model' => $modelTarea));

//listview de las tareas que no tienen papa