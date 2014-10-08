<?php
/*@var $this CategoriaController 
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

	<?php echo $form->errorSummary($model); ?>
       
	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_CATEGORIA'); ?>
		<?php echo $form->textField($model,'NOMBRE_CATEGORIA',array('size'=>60,'maxlength'=>100,'placeholder'=>'Agregar Categoría')); ?>
		<?php echo $form->error($model,'NOMBRE_CATEGORIA'); ?>
	</div>
        
        <!--
        -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                <div class="clearFix"></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->