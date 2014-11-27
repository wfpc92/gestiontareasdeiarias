<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>



<div class="form login">
    <h2>Inicio de Sesión</h2>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false
    ));

    ?>
    
    <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>		
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Iniciar Sesión'); ?>
    </div>

    <div class="registrarse">
        <?php
        echo CHtml::link('Registrarse', Yii::app()->createUrl('usuario/registro'));
        ?>
    </div>
    <div class="clear"></div>

    <?php $this->endWidget(); ?>
</div>
