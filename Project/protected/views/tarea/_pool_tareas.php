<?php

$fechaFormato = Calendario::getFechaFormato();
$userId = Yii::app()->user->getId();


$form = '../tarea/_agregar_diaria';
$modelTarea = new Tarea;
$modelTarea->FECHA_INICIO = $fechaFormato;
$this->renderPartial($form, array('model' => $modelTarea));

$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => "CORREO = '{$userId}'"
        . " AND ID_ACTIVIDAD = 0 "
        ."AND FECHA_INICIO = '{$fechaFormato}' "
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view_pool',
    'enablePagination' => false,
    'htmlOptions' => array(
    ))
);
