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
        //'condition' => "FECHA_INICIO = '{$fechaFormato}' "
        'condition' =>"CORREO = '{$userId}' AND Diaria != 1"
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view_pool',
    'enablePagination' => false,
    'htmlOptions' => array(
    ))
);
