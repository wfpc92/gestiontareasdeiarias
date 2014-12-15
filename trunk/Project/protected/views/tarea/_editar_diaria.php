<?php
/* @var $model Tarea */
/* @var $this Controller */
/* @var $categoria Categoria */
/* @var $actividad Actividad */
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
        $actividad = $model->idActividad;
        if ($actividad != NULL) {
            $categoria = $actividad->idCategoria;
            if ($categoria != NULL) {
                $idCategoria = $categoria->id_categoria;
            }
        } else {
            $categoria = new Categoria;
            $idCategoria = 0;
        }

        $categorias = Categoria::model()->findAll("id_usuario='{$model->id_usuario}'");
        $listaCategorias = CHtml::listData($categorias, 'id_categoria', 'nombre_categoria');

        echo $form->labelEx($categoria, 'Seleccione una categoria: ');
        echo CHtml::dropDownList('id_categoria'
                , $idCategoria
                , array(0 => "Seleccione una categoria...") + $listaCategorias
                , array('onchange' => 'return categoriaCargarAjax(this)')
        );
        ?>
        <div id="div-lst-actividades" >
            <?php
            if ($actividad != NULL) {
                $this->renderPartial('../actividad/droplist', array('actividad' => $actividad));
            }
            ?>
        </div>
        <?php
        $this->renderPartial('../tarea/_editar', array('model' => $model, 'pool'=>'pool'));

        $this->endWidget();
        ?>
    </div>
</div><!-- form -->

