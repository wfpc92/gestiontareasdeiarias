<?php
/* @var $this TareaController */
/* @var $model Tarea */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tarea-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
        <!--
	<div class="row">
		<?php echo $form->labelEx($model,'ID_TAREA'); ?>
		<?php echo $form->textField($model,'ID_TAREA'); ?>
		<?php echo $form->error($model,'ID_TAREA'); ?>
	</div>
        -->
	<div class="row">
		<?php echo $form->labelEx($model,'ID_FRECUENCIA'); ?>
		<?php echo $form->textField($model,'ID_FRECUENCIA'); ?>
		<?php echo $form->error($model,'ID_FRECUENCIA'); ?>
	</div>
        <!--
	<div class="row">
		<?php echo $form->labelEx($model,'CORREO'); ?>
		<?php echo $form->textField($model,'CORREO',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CORREO'); ?>
	</div>
        -->
	<div class="row">
		<?php echo $form->labelEx($model,'ACTIVIDAD'); ?>
                <?php
                    $actividades = CHtml::listData(Actividad::model()->findAll(), 'ID_ACTIVIDAD', 'NOMBRE_ACTIVIDAD');
                    echo $form->dropDownList($model,'ID_ACTIVIDAD', $actividades) 
                    ?>
		<!--<?php echo $form->textField($model,'ID_ACTIVIDAD'); ?>-->
		<?php echo $form->error($model,'ID_ACTIVIDAD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_TAREA'); ?>
		<?php echo $form->textField($model,'NOMBRE_TAREA',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NOMBRE_TAREA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FECHA_INICIO'); ?>
		<?php echo $form->textField($model,'FECHA_INICIO'); ?>
		<?php echo $form->error($model,'FECHA_INICIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FECHA_FIN'); ?>
		<?php echo $form->textField($model,'FECHA_FIN'); ?>
		<?php echo $form->error($model,'FECHA_FIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FECHA_ULTIMA_PAUSA'); ?>
		<?php echo $form->textField($model,'FECHA_ULTIMA_PAUSA'); ?>
		<?php echo $form->error($model,'FECHA_ULTIMA_PAUSA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DURACION'); ?>
		<?php echo $form->textField($model,'DURACION',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'DURACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRIORIDAD'); ?>
		<?php echo $form->dropDownList($model,'PRIORIDAD',array("1"=>"Alta","2"=>"Media","3"=>"Baja")); ?>
		<?php echo $form->error($model,'PRIORIDAD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ESTADO'); ?>
		<?php echo $form->textField($model,'ESTADO'); ?>
		<?php echo $form->error($model,'ESTADO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'INAMOVIBLE'); ?>
		<?php echo $form->textField($model,'INAMOVIBLE'); ?>
		<?php echo $form->error($model,'INAMOVIBLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HORA_INICIO'); ?>
		<?php echo $form->textField($model,'HORA_INICIO'); ?>
		<?php echo $form->error($model,'HORA_INICIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HORA_FIN'); ?>
		<?php echo $form->textField($model,'HORA_FIN'); ?>
		<?php echo $form->error($model,'HORA_FIN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->