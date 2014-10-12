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
    ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'NOMBRE_CATEGORIA');
        echo $form->textField($model, 'NOMBRE_CATEGORIA', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Agregar Categoría'));
        echo $form->error($model, 'NOMBRE_CATEGORIA');
        ?>
    </div>

    <div class="row buttons">
        <?php
        $label = "agregar";
        $url = Yii::app()->homeUrl . '/categoria/crearAjax';
        $ajaxOptions = array(
            'success' => file_get_contents('js/ajax/categoria/crear.js'),
            'error' => file_get_contents('js/ajax/categoria/error_crear.js')
        );
        $htmlOptions = array(
            'id' => 'btnCrearCategoria',
            'name' => 'btnCrearCategoria'
        );
        echo CHtml::ajaxSubmitButton($label, $url, $ajaxOptions, $htmlOptions);
        ?>
        <div class="clearFix"></div>
    </div>

    <?php $this->endWidget(); ?>

</div>
