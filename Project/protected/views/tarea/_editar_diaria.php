<?php
/* @var $model Tarea */
/* @var $this Controller */
/* @var $categoria Categoria */
/* @var $actividad Actividad */
/* @var $form CActiveForm */
?>
<h3>Editar tarea </h3>
<div class="form">
    <?php
    $idTarea = $model->id_tarea;

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
        <div id="div-lst-actividades-<?php echo $idTarea; ?>" >
            <?php
            if ($actividad != NULL) {
                $this->renderPartial('../actividad/droplist', array('actividad' => $actividad));
            }
            ?>
        </div>
        <?php
        //echo $form->hiddenField($model, 'id_tarea');
        $this->renderPartial('../tarea/_editar', array('model' => $model, 'pool' => 'pool'));
        ?>
    </div>
    <?php
    $this->endWidget();
    ?>
</div><!-- form -->

