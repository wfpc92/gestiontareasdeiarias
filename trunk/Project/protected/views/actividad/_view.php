<?php
/* @var $this ActividadController */
/* @var $data Actividad */
?>

<div id="actividad_<?php echo CHtml::encode($data->ID_ACTIVIDAD); ?>" class="view">

    
    <?php
    $label = $data->NOMBRE_ACTIVIDAD;
    $id_actividad = $data->ID_ACTIVIDAD;
    $url = Yii::app()->homeUrl . '/tarea/listarAjax/' . $id_actividad;
    $data = array(
        'update'=>'#content-tareas'
        /*'success' => file_get_contents('js/ajax/tarea/listar.js'),
        'error' => file_get_contents('js/ajax/tarea/error_listar.js')*/
    );
    $htmlOptions = array(
        'id' => 'btnListarTareas_'.$id_actividad
    );
    echo CHtml::ajaxLink($label, $url, $data, $htmlOptions);
    ?>


</div>
