<?php
/* @var $this ActividadController */
/* @var $model Actividad */

$this->breadcrumbs=array(
	'Actividads'=>array('index'),
	$model->ID_ACTIVIDAD,
);

$this->menu=array(
	array('label'=>'List Actividad', 'url'=>array('index')),
	array('label'=>'Create Actividad', 'url'=>array('create')),
	array('label'=>'Update Actividad', 'url'=>array('update', 'id'=>$model->ID_ACTIVIDAD)),
	array('label'=>'Delete Actividad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_ACTIVIDAD),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Actividad', 'url'=>array('admin')),
);
?>

<h1>View Actividad #<?php echo $model->ID_ACTIVIDAD; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_ACTIVIDAD',
		'CORREO',
		'ID_CATEGORIA',
		'NOMBRE_ACTIVIDAD',
	),
)); ?>
