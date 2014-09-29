<?php
/* @var $this TareaController */
/* @var $model Tarea */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_TAREA'); ?>
		<?php echo $form->textField($model,'ID_TAREA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_FRECUENCIA'); ?>
		<?php echo $form->textField($model,'ID_FRECUENCIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CORREO'); ?>
		<?php echo $form->textField($model,'CORREO',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_ACTIVIDAD'); ?>
		<?php echo $form->textField($model,'ID_ACTIVIDAD'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_TAREA'); ?>
		<?php echo $form->textField($model,'NOMBRE_TAREA',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_INICIO'); ?>
		<?php echo $form->textField($model,'FECHA_INICIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_FIN'); ?>
		<?php echo $form->textField($model,'FECHA_FIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_ULTIMA_PAUSA'); ?>
		<?php echo $form->textField($model,'FECHA_ULTIMA_PAUSA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DURACION'); ?>
		<?php echo $form->textField($model,'DURACION',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRIORIDAD'); ?>
		<?php echo $form->textField($model,'PRIORIDAD'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESTADO'); ?>
		<?php echo $form->textField($model,'ESTADO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'INAMOVIBLE'); ?>
		<?php echo $form->textField($model,'INAMOVIBLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HORA_INICIO'); ?>
		<?php echo $form->textField($model,'HORA_INICIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HORA_FIN'); ?>
		<?php echo $form->textField($model,'HORA_FIN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->