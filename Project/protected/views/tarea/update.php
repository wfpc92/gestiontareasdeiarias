<?php
/* @var $this TareaController */
/* @var $model Tarea */

$this->breadcrumbs=array(
	'Tareas'=>array('index'),
	$model->ID_TAREA=>array('view','id'=>$model->ID_TAREA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tarea', 'url'=>array('index')),
	array('label'=>'Create Tarea', 'url'=>array('create')),
	array('label'=>'View Tarea', 'url'=>array('view', 'id'=>$model->ID_TAREA)),
	array('label'=>'Manage Tarea', 'url'=>array('admin')),
);
?>

<h1>Update Tarea <?php echo $model->ID_TAREA; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>