<?php
/* @var $this ActividadController */
/* @var $model Actividad */

$this->breadcrumbs=array(
	'Actividads'=>array('index'),
	$model->ID_ACTIVIDAD=>array('view','id'=>$model->ID_ACTIVIDAD),
	'Update',
);

$this->menu=array(
	array('label'=>'List Actividad', 'url'=>array('index')),
	array('label'=>'Create Actividad', 'url'=>array('create')),
	array('label'=>'View Actividad', 'url'=>array('view', 'id'=>$model->ID_ACTIVIDAD)),
	array('label'=>'Manage Actividad', 'url'=>array('admin')),
);
?>

<h1>Update Actividad <?php echo $model->ID_ACTIVIDAD; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>