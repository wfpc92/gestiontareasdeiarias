<?php
/* @var $this CategoriaController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

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
<?php echo $form->textField($model,'NOMBRE_CATEGORIA',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'NOMBRE_CATEGORIA'); ?>
</div>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>