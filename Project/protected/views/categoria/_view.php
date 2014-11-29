<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
/* @var $form CActiveForm */

$idCategoria = $data->id_categoria;
$nombreCategoria = $data->nombre_categoria;
?>

<div id="categoria-<?php echo $idCategoria; ?>" 
     class="view">    

    <div id="categoria-content-<?php echo $idCategoria; ?>">
        <?php
        echo CHtml::link($nombreCategoria, "#", array(
            'class' => 'categoria',
            'onclick' => 'return categoriaToogle(this)'
        ));
        ?>
    </div>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'categoria-form-' . $idCategoria,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/categoria'
    ));
    echo $form->hiddenField($data, 'id_categoria');

    echo CHtml::link("Menú Categoría", "", array(
        'class' => 'menu-categoria',
        'onclick' => 'return categoriaMenu(this)'
    ));
    ?>
    <ul class="categoria">
        <li class="editar">
            <?php
            echo CHtml::link("Editar", "#", array(
                'id' => 'lnk-categoria-editar-form-' . $idCategoria,
                'onclick' => 'return categoriaEditarFormAjax(this)'
            ));
            ?>
        </li>
        <li class="eliminar">
            <?php
            echo CHtml::link("Eliminar", "#", array(
                'id' => 'lnk-categoria-eliminar-' . $idCategoria,
                'onclick' => 'return categoriaEliminarModal(this)'
            ));
            ?>
        </li>
    </ul>

    <?php $this->endWidget(); ?>


    <div class="actividadesPorCate desplegable">
        <?php
        $modelActividad = new Actividad;
        $modelActividad->id_categoria = $idCategoria;
        $this->renderPartial('../actividad/_form', array('model' => $modelActividad));

        $dataProvider = new CActiveDataProvider('Actividad', array(
            'pagination' => false,
            'criteria' => array(
                'condition' => "id_categoria={$idCategoria}"
            )
        ));

        $this->widget('zii.widgets.CListView', array(
            'id' => "actividades-{$idCategoria}",
            'dataProvider' => $dataProvider,
            'itemView' => '../actividad/_view',
            'enablePagination' => false,
        ));
        ?>


        <div class="clearFix"></div>
    </div>
</div>
