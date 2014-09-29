<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categoria-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <!--
	<div class="row">
		<?php echo $form->labelEx($model,'CORREO'); ?>
		<?php echo $form->textField($model,'CORREO',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CORREO'); ?>
	</div>
        -->
	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_CATEGORIA'); ?>
		<?php echo $form->textField($model,'NOMBRE_CATEGORIA',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NOMBRE_CATEGORIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DESCRIPCION_CATEGORIA'); ?>
		<?php echo $form->textField($model,'DESCRIPCION_CATEGORIA',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'DESCRIPCION_CATEGORIA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->