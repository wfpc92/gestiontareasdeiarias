<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);
?>

<h1>Registrarse</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>