<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
?>

<div id="categoria-<?php echo CHtml::encode($data->ID_CATEGORIA); ?>" 
     class="view">    

    <a href="#" class="categoria" onclick="return categoriaToogle(this)">
        <span id="modificar-categoria-<?php echo $data->ID_CATEGORIA ?>"><?php echo CHtml::encode($data->NOMBRE_CATEGORIA); ?></span>                
        <?php echo CHtml::link("eliminar","#",
                array('onclick'=>'return categoriaEliminarAjax(this)',
                        'class'=>'eliminar-categoria')); ?>
        
    </a>
    <span id="tgr-modificar">
        <?php
        $iden = $data->ID_CATEGORIA;
        $nombre = $data->NOMBRE_CATEGORIA;
        echo CHtml::link("editar", "#", array
            ('onclick' => 'return categoriaEditarAjax('.$iden.',"'.$nombre.'")',
                'class' => 'editar-categoria'));
        ?>
    </span>

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
    <a class="eliminar-categoria" href="#">Eliminar</a>
    <div class="clearFix"></div>


</div>
