<?php
/* @var $this TipoTareaController */
/* @var $model TipoTarea */

$this->breadcrumbs=array(
	'Tipo Tareas'=>array('index'),
	$model->id_tipo_tarea=>array('view','id'=>$model->id_tipo_tarea),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoTarea', 'url'=>array('index')),
	array('label'=>'Create TipoTarea', 'url'=>array('create')),
	array('label'=>'View TipoTarea', 'url'=>array('view', 'id'=>$model->id_tipo_tarea)),
	array('label'=>'Manage TipoTarea', 'url'=>array('admin')),
);
?>

<h1>Update TipoTarea <?php echo $model->id_tipo_tarea; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>