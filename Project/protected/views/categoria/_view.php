<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
?>

<div id="categoria-<?php echo CHtml::encode($data->ID_CATEGORIA); ?>" 
     class="view">

    <a href="#" class="" onclick="return categoriaToogle(this)">
        <?php echo CHtml::encode($data->NOMBRE_CATEGORIA); ?>
    </a>

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
    </div>


</div>
