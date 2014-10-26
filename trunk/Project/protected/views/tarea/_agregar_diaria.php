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

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        $model->ID_ACTIVIDAD = 1;        
        echo $form->hiddenField($model, 'ID_ACTIVIDAD');        
        echo $form->hiddenField($model, 'FECHA_INICIO');
        echo $form->labelEx($model, 'NOMBRE_TAREA');
        echo $form->textField($model, 'NOMBRE_TAREA', array(
            'id' => 'SUP',
            'size' => 60,
            'maxlength' => 100,
            'placeholder' => 'Agregar Tarea'));
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
