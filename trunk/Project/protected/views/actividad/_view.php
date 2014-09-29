<?php
/* @var $this ActividadController */
/* @var $data Actividad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ACTIVIDAD')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_ACTIVIDAD), array('view', 'id'=>$data->ID_ACTIVIDAD)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CORREO')); ?>:</b>
	<?php echo CHtml::encode($data->CORREO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CATEGORIA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_CATEGORIA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_ACTIVIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_ACTIVIDAD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_ACTIVIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION_ACTIVIDAD); ?>
	<br />


</div>