<?php
/* @var $this CategoriaController 
  /* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'categoria-form-'.$model->ID_CATEGORIA,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/categoria/editarAjax',
        'htmlOptions' => array(
            'onsubmit' => 'return categoriaEditarAjax(this)'
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
        
    
    
    <?php $this->endWidget(); ?>

</div>
