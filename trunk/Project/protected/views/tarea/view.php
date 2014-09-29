<?php
/* @var $this TareaController */
/* @var $model Tarea */

$this->breadcrumbs=array(
	'Tareas'=>array('index'),
	$model->ID_TAREA,
);

$this->menu=array(
	array('label'=>'List Tarea', 'url'=>array('index')),
	array('label'=>'Create Tarea', 'url'=>array('create')),
	array('label'=>'Update Tarea', 'url'=>array('update', 'id'=>$model->ID_TAREA)),
	array('label'=>'Delete Tarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TAREA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tarea', 'url'=>array('admin')),
);
?>

<h1>View Tarea #<?php echo $model->ID_TAREA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_TAREA',
		'ID_FRECUENCIA',
		'CORREO',
		'ID_ACTIVIDAD',
		'NOMBRE_TAREA',
		'FECHA_INICIO',
		'FECHA_FIN',
		'FECHA_ULTIMA_PAUSA',
		'DURACION',
		'PRIORIDAD',
		'ESTADO',
		'INAMOVIBLE',
		'HORA_INICIO',
		'HORA_FIN',
	),
)); ?>
