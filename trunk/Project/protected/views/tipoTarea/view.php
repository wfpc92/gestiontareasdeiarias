<?php
/* @var $this TipoTareaController */
/* @var $model TipoTarea */

$this->breadcrumbs=array(
	'Tipo Tareas'=>array('index'),
	$model->id_tipo_tarea,
);

$this->menu=array(
	array('label'=>'List TipoTarea', 'url'=>array('index')),
	array('label'=>'Create TipoTarea', 'url'=>array('create')),
	array('label'=>'Update TipoTarea', 'url'=>array('update', 'id'=>$model->id_tipo_tarea)),
	array('label'=>'Delete TipoTarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_tarea),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoTarea', 'url'=>array('admin')),
);
?>

<h1>View TipoTarea #<?php echo $model->id_tipo_tarea; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_tarea',
		'nombre',
		'id_usuario',
	),
)); ?>
