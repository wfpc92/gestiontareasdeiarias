<?php
/* @var $this TareaController */
/* @var $data Tarea */
/* @var $form CActiveForm */

$idTarea = $data->ID_TAREA;
?>

<div id="tarea-view-<?php echo $idTarea; ?>" class="view">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tarea-mostrar-form-' . $idTarea,
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array(
            'class' => 'form-tarea'
        )
    ));

    echo $form->hiddenField($data, 'ID_TAREA');
    if ($data->FECHA_INICIO != NULL){
        echo $form->hiddenField($data, 'FECHA_INICIO');
    }
    echo CHtml::hiddenField('FECHA_HOY',  Calendario::getFechaFormato());
    
    /*
    $check = false;
    if ($data->ESTADO == 1) {
        $check = true;
    }
    echo CHtml::checkBox("ESTADO", $check, array(
        'onchange' => 'return tareaCheckAjax(this)',
        'title' => 'Verifique la casilla si finalizó la tarea.'
    ));
    */
    echo CHtml::tag('p', array(
        'id' => 'p-tarea-nombre-' . $idTarea,
        'onclick' => 'return tareaMostrarPoolAjax(this)',
            ), CHtml::encode($data->NOMBRE_TAREA));
    ?>
    <div class="botones">
        <?php
        /*
        $label = "Play Tarea";
        $htmlOptions = array(
            'id' => 'btn-play-tarea-' . $idTarea,
            'name' => 'btn-play-tarea-' . $idTarea,
            'class' => 'play-tarea'
        );
        echo CHtml::button($label, $htmlOptions);

        $label = "Pausar Tarea";
        $htmlOptions = array(
            'id' => 'lnk-pausar-tarea-' . $idTarea,
            'name' => 'lnk-pausar-tarea-' . $idTarea,
            'class' => 'pause-tarea'
        );
        echo CHtml::button($label, $htmlOptions);
        */
        echo CHtml::tag('p', array(
            'id' => 'p-duracion-tarea-' . $idTarea
                ), $data->DURACION);
        ?>
        <div class="clearFix"></div>
    </div>
    <?php
    /* $label = "Eliminar Tarea";
      $htmlOptions = array(
      'id' => 'lnk-eliminar-tarea-' . $idTarea,
      'name' => 'lnk-eliminar-tarea-' . $idTarea,
      'class' => 'eliminar-tarea',
      'onclick' => 'return tareaEliminarAjax(this)'
      );
      echo CHtml::link($label, "#", $htmlOptions); */

    echo CHtml::link("Menú Tarea", "", array(
        'class' => 'menu-tarea',
        'onclick' => 'return tareaMenu(this)'
    ));
    ?>
    <ul class="tarea">
        <li class="eliminar">
            <?php
            echo CHtml::link("Eliminar", "#", array(
                'id' => 'lnk-tarea-eliminar-' . $idTarea,
                'onclick' => 'return tareaEliminarAjax(this)'
            ));
            ?>
        </li>
    </ul>
    <br />
    <?php
    $this->endWidget();
    ?>
</div>
