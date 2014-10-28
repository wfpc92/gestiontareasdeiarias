<?php

$fechaFormato = date_format($fecha, "Y-m-d");
$userId = Yii::app()->user->getId();


$form = '../tarea/_agregar_diaria';
$modelTarea = new Tarea;
$modelTarea->FECHA_INICIO = $fechaFormato;
$this->renderPartial($form, array('model' => $modelTarea));

$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => "FECHA_INICIO = '{$fechaFormato}' "
        . " AND CORREO = '{$userId}'"
        . " AND ID_ACTIVIDAD IS NULL    "
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view',
    'enablePagination' => false,
    'htmlOptions' => array(
    ))
);
