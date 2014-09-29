<?php
/* @var $this TareaController */
/* @var $data Tarea */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TAREA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TAREA), array('view', 'id'=>$data->ID_TAREA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_FRECUENCIA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_FRECUENCIA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CORREO')); ?>:</b>
	<?php echo CHtml::encode($data->CORREO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ACTIVIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->ID_ACTIVIDAD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_TAREA')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_TAREA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_INICIO')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_INICIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_FIN')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_FIN); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_ULTIMA_PAUSA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_ULTIMA_PAUSA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DURACION')); ?>:</b>
	<?php echo CHtml::encode($data->DURACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRIORIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->PRIORIDAD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INAMOVIBLE')); ?>:</b>
	<?php echo CHtml::encode($data->INAMOVIBLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HORA_INICIO')); ?>:</b>
	<?php echo CHtml::encode($data->HORA_INICIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HORA_FIN')); ?>:</b>
	<?php echo CHtml::encode($data->HORA_FIN); ?>
	<br />

	*/ ?>

</div>