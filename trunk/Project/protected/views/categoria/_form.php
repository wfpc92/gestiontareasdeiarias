<?php
/* @var $this CategoriaController 
  /* @var $model Categoria */
/* @var $form CActiveForm */
?>


<div class="form">
    <div id="error-form-categoria" class="error"></div>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'categoria-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'action' => Yii::app()->homeUrl . '/categoria/crearAjax',
        'htmlOptions' => array(
            'onsubmit' => 'return categoriaCrearAjax(this)'
        )
    ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'NOMBRE_CATEGORIA');
        echo $form->textField($model, 'NOMBRE_CATEGORIA', array(
            'id' => 'txt-categoria',
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Nueva Categoría'));
        echo $form->error($model, 'NOMBRE_CATEGORIA');
        ?>
    </div>

    <div class="row buttons">
        <?php
        $label = "Nueva categoria";
        $htmlOptions = array(
            'id' => 'btn-crear-categoria',
            'name' => 'btn-crear-categoria'
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>
    </div>
    <div class="clearFix"></div>

    <?php $this->endWidget(); ?>

</div>
