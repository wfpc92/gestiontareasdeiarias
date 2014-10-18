<?php
/* @var $this CategoriaController 
  /* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'categoria-form',
        'enableAjaxValidation' => false,
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
            'placeholder' => 'Agregar Categoría'));
        echo $form->error($model, 'NOMBRE_CATEGORIA');
        ?>
    </div>

    <div class="row buttons">
        <?php
        $label = "agregar categoria";
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
