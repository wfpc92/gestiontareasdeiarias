<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<h1>Login</h1>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'Correo'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Contrasena'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>		
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'Recuerdame'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

    <div class="registrarse">
        <?php
        echo CHtml::link('Registrarse', Yii::app()->createUrl('Usuario/create'));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<!--
<h1>
            Registrate
        </h1>
<?php
$form = '../usuario/_form';
$modelUsuario = new Usuario;
$this->renderPartial($form, array('model' => $modelUsuario));
?>
