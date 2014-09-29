<?php
/* @var $this ActividadController */
/* @var $model Actividad */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_ACTIVIDAD'); ?>
		<?php echo $form->textField($model,'ID_ACTIVIDAD'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CORREO'); ?>
		<?php echo $form->textField($model,'CORREO',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_CATEGORIA'); ?>
		<?php echo $form->textField($model,'ID_CATEGORIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_ACTIVIDAD'); ?>
		<?php echo $form->textField($model,'NOMBRE_ACTIVIDAD',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPCION_ACTIVIDAD'); ?>
		<?php echo $form->textField($model,'DESCRIPCION_ACTIVIDAD',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->