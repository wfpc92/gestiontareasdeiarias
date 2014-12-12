<?php
/* @var $this TipoTareaController */
/* @var $model TipoTarea */

$this->breadcrumbs=array(
	'Tipo Tareas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoTarea', 'url'=>array('index')),
	array('label'=>'Manage TipoTarea', 'url'=>array('admin')),
);
?>

<h1>Create TipoTarea</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>