<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
/* @var $form CActiveForm */

$idCategoria = $data->ID_CATEGORIA;
?>

<div id="categoria-<?php echo $idCategoria; ?>" 
     class="view">    

    <div id="categoria-content-<?php echo $idCategoria; ?>" >
        <?php
        echo CHtml::link($data->NOMBRE_CATEGORIA, "#", array(
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
    echo $form->hiddenField($data, 'ID_CATEGORIA');

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
                'onclick' => 'return categoriaEliminarAjax(this)'
            ));
            ?>
        </li>
    </ul>

    <?php $this->endWidget(); ?>


    <div class="actividadesPorCate">
        <?php
        $form = '../actividad/_form';
        $modelActividad = new Actividad;
        $modelActividad->ID_CATEGORIA = $data->ID_CATEGORIA;
        $this->renderPartial($form, array('model' => $modelActividad));

        $dataProvider = new CActiveDataProvider('Actividad', array(
            'pagination' => false,
            'criteria' => array(
                'condition' => 'ID_CATEGORIA=' . $data->ID_CATEGORIA
            )
        ));

        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '../actividad/_view',
            'enablePagination' => false,
        ));
        ?>


        <div class="clearFix"></div>
    </div>
</div>
