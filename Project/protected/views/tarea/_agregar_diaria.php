<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'agregar-tarea-diaria',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/tarea/crearTareaPool',
        'htmlOptions' => array(
            'onsubmit' => 'return tareaCrearPoolAjax(this)',
            'class' => 'formTarea formPool'
        )
    ));
    ?>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'id_actividad');
        echo $form->hiddenField($model, 'fecha_inicio');
        echo $form->labelEx($model, 'nombre_tarea');
        echo $form->textField($model, 'nombre_tarea', array(
            'id' => 'txt-tarea',
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Nueva Tarea'));
        echo $form->error($model, 'nombre_tarea');
        ?>
    </div>


    <div class="row buttons">
        <?php
        $label = "agregar tarea";
        $htmlOptions = array(
            'id' => 'btn-crear-tarea',
            'name' => 'btn-crear-tarea'
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>
        <div class="clearFix"></div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
