<?php
/* @var $this TipoTareaController */
/* @var $data TipoTarea */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_tarea')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_tarea), array('view', 'id'=>$data->id_tipo_tarea)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />


</div>