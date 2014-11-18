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
        'enableClientValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Correo'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Contraseña'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>		
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'Recuerdame'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Iniciar Sesión'); ?>
    </div>

    <div class="registrarse">
        <?php
        echo CHtml::link('Registrarse', Yii::app()->createUrl('Usuario/create'));
        ?>
    </div>
    <div class="clear"></div>

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
