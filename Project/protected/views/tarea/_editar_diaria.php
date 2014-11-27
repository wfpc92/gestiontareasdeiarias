<?php
/* @var $modelCategoria Categoria */
/* @var $this Controller */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'editar',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array(
            'onsubmit' => 'return tareaActualizarAjax(this)',
            'class' => 'formTarea'
        )
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        $idUsuario = Yii::app()->user->getId();
        $categoria = new Categoria;
        $categorias = Categoria::model()->findAll("CORREO='{$idUsuario}'");
        $listaCategorias = CHtml::listData($categorias, 'ID_CATEGORIA', 'NOMBRE_CATEGORIA');

        echo $form->labelEx($categoria, 'Seleccione una categoria: ');
        echo CHtml::dropDownList('ID_CATEGORIA'
                , 'Seleccione...'
                , array('Seleccione...') + $listaCategorias
                , array('onchange' => 'return categoriaCargarAjax(this)')
        );
        ?>
        <div id="div-lst-actividades" ></div>
        <?php
        $this->renderPartial('_editar', array('model' => $model));

        $this->endWidget();
        ?>
    </div>
</div><!-- form -->

