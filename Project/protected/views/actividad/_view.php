<?php
/* @var $this ActividadController */
/* @var $data Actividad */
/* @var $form CActiveForm  */

$idActividad = $data->ID_ACTIVIDAD;
$nombreActividad = $data->NOMBRE_ACTIVIDAD;
?>

<div id="actividad-<?php echo CHtml::encode($idActividad); ?>" class="view">
    <?php
    $model = new Actividad;
    $model->ID_ACTIVIDAD = $idActividad;

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'listar-tareas-form-' . $idActividad,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/actividad/listarTareasAjax',
        'htmlOptions' => array(
            'onclick' => 'return actividadListarTareasAjax(this)'
        )
    ));

    $attribute = "ID_ACTIVIDAD";
    $htmlOptions = array(
        'id' => 'hdn-actividad-id-' . $idActividad
    );
    echo $form->hiddenField($model, $attribute, $htmlOptions);

    $label = $nombreActividad;
    $url = "#";
    $htmlOptions = array(
        'id' => 'btn-listar-tareas-' . $idActividad
    );
    echo CHtml::link($label, $url, $htmlOptions);

    $this->endWidget();
    ?>
</div>
