<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
?>

<div class="view">

    <!--
    <b><?php echo CHtml::encode($data->getAttributeLabel('ID_CATEGORIA')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->ID_CATEGORIA), array('view', 'id' => $data->ID_CATEGORIA)); ?>
    <br />
    -->

    <!--
    <b><?php echo CHtml::encode($data->getAttributeLabel('CORREO')); ?>:</b>
    <?php echo CHtml::encode($data->CORREO); ?>
    <br />
    -->

    <a href="#">
        <?php echo CHtml::encode($data->NOMBRE_CATEGORIA); ?>
    </a>

    <div class="actividadesPorCate">
        <?php
        $form = '../actividad/_form';
        $modelActividad = new Actividad;
        $this->renderPartial
                ($form, array('model' => $modelActividad));
        ?>
        <?php
        $dataProvider = new CActiveDataProvider('Actividad');
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '../actividad/_view',
        ));
        ?>
    </div>

    <!--<b>
    <?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_CATEGORIA')); ?>:</b>
    <?php echo CHtml::encode($data->DESCRIPCION_CATEGORIA); ?>
    <br />
    -->
</div>
