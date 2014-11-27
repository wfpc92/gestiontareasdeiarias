<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
/* @var $form CActiveForm */

$idCategoria = $model->id_categoria;
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
        echo $form->hiddenField($model, 'id_categoria');
        echo $form->textField($model, 'nombre_categoria', array(
            'id' => 'txt-categoria-editar-form' . $idCategoria,
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Editar Categoría'));
        echo $form->error($model, 'nombre_categoria');
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
