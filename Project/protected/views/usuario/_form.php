<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form login">
    <h2>Registrarse</h2>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombres'); ?>
        <?php echo $form->textField($model, 'nombres', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'nombres'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'apellidos'); ?>
        <?php echo $form->textField($model, 'apellidos', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'apellidos'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'correo'); ?>
        <?php echo $form->textField($model, 'correo', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'correo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'contrasena'); ?>
        <?php echo $form->passwordField($model, 'contrasena', array('size' => 50, 'maxlength' => 50)); ?>                
        <?php echo $form->error($model, 'contrasena'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'repetir_contrasena'); ?>
        <?php echo $form->passwordField($model, 'repetir_contrasena', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::Button('Regresar', array('submit' => '../site/login', 'class' => 'regresar-login')); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrarse' : 'Save'); ?>        
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->