<?php
/* @var $this ActividadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividades',
);

$this->menu=array(
	array('label'=>'Create Actividad', 'url'=>array('create')),
	array('label'=>'Manage Actividad', 'url'=>array('admin')),
);
?>

<h1>Actividades</h1>

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
<?php echo $form->labelEx($model,'CATEGORIA'); ?>
                <?php
                    $categorias = CHtml::listData(Categoria::model()->findAll(), 'ID_CATEGORIA', 'NOMBRE_CATEGORIA');
                    echo $form->dropDownList($model,'ID_CATEGORIA', $categorias) 
                    ?> 		
		<?php echo $form->error($model,'ID_CATEGORIA'); ?>
<div class="row">
<?php echo $form->labelEx($model,'NOMBRE_ACTIVIDAD'); ?>
<?php echo $form->textField($model,'NOMBRE_ACTIVIDAD',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'NOMBRE_ACTIVIDAD'); ?>
</div>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>