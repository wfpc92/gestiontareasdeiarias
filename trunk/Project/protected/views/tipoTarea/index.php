<?php
/* @var $this TipoTareaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Tareas',
);

$this->menu=array(
	array('label'=>'Create TipoTarea', 'url'=>array('create')),
	array('label'=>'Manage TipoTarea', 'url'=>array('admin')),
);
?>

<h1>Tipo Tareas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
