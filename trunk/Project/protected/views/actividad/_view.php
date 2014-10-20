<?php
/* @var $this ActividadController */
/* @var $data Actividad */
/* @var $form CActiveForm  */

$idActividad = $data->ID_ACTIVIDAD;
$nombreActividad = $data->NOMBRE_ACTIVIDAD;
?>

<div id="actividad-<?php echo CHtml::encode($idActividad); ?>" 
     class="view">
         <?php
         $form = $this->beginWidget('CActiveForm', array(
             'id' => 'listar-tareas-form-' . $idActividad,
             'enableAjaxValidation' => false,
             'action' => Yii::app()->homeUrl . '/actividad'
         ));

         echo $form->hiddenField($data, "ID_ACTIVIDAD");
         ?>

    <div id="actividad-content-<?php echo $idActividad; ?>" >
        <?php
        echo CHtml::link($nombreActividad, "#", array(
            'id' => 'lnk-tarea-listar-' . $idActividad,
            'class' => 'actividad',
            'onclick' => 'return actividadListarTareasAjax(this)'
        ));
        ?>
    </div>



    <?php
    echo CHtml::link("Menú Actividad", "", array(
        'class' => 'menu-actividad',
        'onclick' => 'return actividadMenu(this)'
    ));
    ?>
    <ul class="actividad"> 
        <li class="editar">
            <?php
            echo CHtml::link("Editar", "#", array(
                'id' => 'lnk-actividad-editar-form-' . $idActividad,
                'onclick' => 'return actividadEditarFormAjax(this)'
            ));
            ?>
        </li>
        <li class="eliminar">
            <?php
            echo CHtml::link("Eliminar", "#", array(
                'id' => 'lnk-actividad-eliminar-' . $idActividad,
                'onclick' => 'return actividadEliminarAjax(this)'
            ));
            ?>
        </li>
    </ul>

    <?php
    $this->endWidget();
    ?>


</div>



