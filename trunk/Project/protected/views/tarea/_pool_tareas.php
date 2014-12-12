<h3 class="pool-tarea">Tareas Pendientes</h3>
<?php
$fechaFormato = Calendario::getFechaFormato();
$userId = Yii::app()->user->getId();

$form = '../tarea/_agregar_diaria';
$modelTarea = new Tarea;
$modelTarea->fecha_inicio = $fechaFormato;
$this->renderPartial($form, array('model' => $modelTarea));

$diariaSi = Tarea::DIARIASI;

$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => "id_usuario = {$userId}"
        . " AND DATE(fecha_inicio) <= '{$fechaFormato}' "
        . " AND diaria = '{$diariaSi}' "
    //. " AND inamovible = '" . Tarea::INAMOVIBLENO . "' "
    ))
);

$this->widget('zii.widgets.CListView', array(
    'id' => 'lst-pool-tareas',
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view_pool',
    'enablePagination' => false,
    'htmlOptions' => array(
    ))
);
