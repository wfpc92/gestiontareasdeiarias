<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRES'); ?>
		<?php echo $form->textField($model,'NOMBRES',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NOMBRES'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'APELLIDOS'); ?>
		<?php echo $form->textField($model,'APELLIDOS',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'APELLIDOS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CORREO'); ?>
		<?php echo $form->textField($model,'CORREO',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CORREO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CONTRASENA'); ?>
		<?php echo $form->passwordField($model,'CONTRASENA',array('size'=>50,'maxlength'=>50)); ?>                
		<?php echo $form->error($model,'CONTRASENA'); ?>
	</div>
        
        <div class="row">
                <?php echo $form->labelEx($model,'repeat_password'); ?>
                <?php echo $form->passwordField($model,'repeat_password',array('size'=>50,'maxlength'=>50)); ?>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrarse' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->