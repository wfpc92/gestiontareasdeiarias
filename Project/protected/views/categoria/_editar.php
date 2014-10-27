<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
/* @var $form CActiveForm */

$idCategoria = $model->ID_CATEGORIA;
?>

<div class="form form-editar-categoria">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'categoria-editar-form-' . $idCategoria,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/categoria',
        'htmlOptions' => array(
            'onsubmit' => 'return categoriaEditarAjax(this)'
        )
    ));
    ?>
    <div id="form-editar-categoria-error-<?php echo $idCategoria; ?>" class="error"></div>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'ID_CATEGORIA');
        echo $form->textField($model, 'NOMBRE_CATEGORIA', array(
            'id' => 'txt-categoria-editar-form' . $idCategoria,
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Editar Categoría'));
        echo $form->error($model, 'NOMBRE_CATEGORIA');
        ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton("Editar categoria", array(
            'id' => 'btn-categoria-editar-form' . $idCategoria,
        ));
        ?>
    </div>
    <div class="clearFix"></div>

    <?php $this->endWidget(); ?>

</div>
