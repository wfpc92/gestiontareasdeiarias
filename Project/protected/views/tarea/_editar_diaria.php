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
            'class' => 'formTarea editarPool'
        )
    ));
    ?>

    <div class="row">
        <?php
        $idUsuario = Yii::app()->user->getId();
        $categoria = new Categoria;
        $categorias = Categoria::model()->findAll("id_usuario='{$idUsuario}'");
        $listaCategorias = CHtml::listData($categorias, 'id_categoria', 'nombre_categoria');

        echo $form->labelEx($categoria, 'Seleccione una categoria: ');
        echo CHtml::dropDownList('id_categoria'
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

