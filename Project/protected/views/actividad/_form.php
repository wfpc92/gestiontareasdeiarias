<?php
/* @var $this ActividadController */
/* @var $model Actividad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'actividad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
        <!--
        El formulario no debe pedir el correo del usuario
	<div class="row">
		<?php echo $form->labelEx($model,'CORREO'); ?>
		<?php echo $form->textField($model,'CORREO',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CORREO'); ?>
	</div>
        -->
        <!--
	<div class="row">
		<?php echo $form->labelEx($model,'CATEGORIA'); ?>
                <?php
                    $categorias = CHtml::listData(Categoria::model()->findAll(), 'ID_CATEGORIA', 'NOMBRE_CATEGORIA');
                    echo $form->dropDownList($model,'ID_CATEGORIA', $categorias) 
                    ?> 
		<?php echo $form->textField($model,'ID_CATEGORIA'); ?>
		<?php echo $form->error($model,'ID_CATEGORIA'); ?>
	</div>
        -->

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_ACTIVIDAD'); ?>
		<?php echo $form->textField($model,'NOMBRE_ACTIVIDAD',array('size'=>60,'maxlength'=>100,'placeholder'=>'Agregar Actividad')); ?>
		<?php echo $form->error($model,'NOMBRE_ACTIVIDAD'); ?>
	</div>
        
        <!--
	
        -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->