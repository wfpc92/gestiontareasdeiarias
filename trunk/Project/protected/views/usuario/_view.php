<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CORREO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CORREO), array('view', 'id'=>$data->CORREO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRES')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APELLIDOS')); ?>:</b>
	<?php echo CHtml::encode($data->APELLIDOS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTRASENA')); ?>:</b>
	<?php echo CHtml::encode($data->CONTRASENA); ?>
	<br />


</div>