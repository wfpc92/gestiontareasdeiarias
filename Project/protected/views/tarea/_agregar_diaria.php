<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'SUP',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl . '/tarea/crearTareaPool',
        'htmlOptions' => array(
            'onsubmit' => 'return tareaCrearAjax(this)',
            'class' => 'formTarea'
        )
    ));
    ?>

    <div class="row">
        <?php
        echo $form->hiddenField($model, 'ID_ACTIVIDAD');
        echo $form->hiddenField($model, 'FECHA_INICIO');
        echo $form->labelEx($model, 'NOMBRE_TAREA');
        echo $form->textField($model, 'NOMBRE_TAREA', array(
            'id' => 'SUP',
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Nueva Tarea'));
        echo $form->error($model, 'NOMBRE_TAREA');
        ?>
    </div>


    <div class="row buttons">
        <?php
        $label = "agregar tarea";
        $htmlOptions = array(
            'id' => 'SUP',
            'name' => 'SUP'
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>
        <div class="clearFix"></div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
