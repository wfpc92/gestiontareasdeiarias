<?php
/* @var $modelCategoria Categoria */
/* @var $this Controller */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'editar',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array(
            'onsubmit' => 'return tareaEditarAjax(this)',
            'class' => 'formTarea'
        )
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        $idUsuario = Yii::app()->user->getId();
        $categoria = new Categoria;
        $categorias = Categoria::model()->findAll("CORREO='{$idUsuario}'");
        $listaCategorias = CHtml::listData($categorias, 'ID_CATEGORIA', 'NOMBRE_CATEGORIA');

        echo $form->labelEx($categoria, 'Seleccione una categoria: ');
        echo CHtml::dropDownList('ID_CATEGORIA'
                , 'Seleccione...'
                , array('Seleccione...') + $listaCategorias
                , array('onchange' => 'return categoriaCargarAjax(this)')
        );
        ?>
        <div id="div-lst-actividades"></div>
        <?php
        $this->renderPartial('_editar',array('model' => $model));
        /*
        ?>
        
        
        <?php


        /* echo $form->dropDownList($categoria, 'ID_CATEGORIA', $listaCategorias, array(
          //'prompt'=>'ACTIVIDAD',
          'ajax' => array(
          'type' => 'POST',
          'url' => Yii::app()->createUrl('Tarea/cargarActividades'), //or $this->createUrl('loadcities') if '$this' extends CController
          'update' => '#NOMBRE_ACTIVIDAD', //or 'success' => 'function(data){...handle the data in the way you want...}',
          //'data'=>array('ID_ACTIVIDAD'=>'js:this.value'),
          ))
          );
          /*  echo
          /*
          $actividades = Actividad::model()->findAll();
          $listaActividades = CHtml::listData($actividades,'ID_ACTIVIDAD','NOMBRE_ACTIVIDAD');
          echo $form->labelEx($model, 'Actividad');
          echo $form->dropDownList($model,'ID_ACTIVIDAD', $listaActividades);
          echo $form->error($model, 'ID_ACTIVIDAD');
         */
        /*
        echo $form->hiddenField($model, 'FECHA_INICIO');
        echo $form->labelEx($model, 'NOMBRE_TAREA');
        echo $form->textField($model, 'NOMBRE_TAREA', array(
          'id' => 'txt-nombre-tarea',
          'size' => 60,
          'maxlength' => 100,
          'placeholder' => 'Editar Tarea'));
        echo $form->error($model, 'NOMBRE_TAREA');
        ?>
    </div>
    
    <div class="row">
        <?php
        $idTarea = $model->ID_TAREA;
        echo $form->labelEx($model, 'FECHA_INICIO');
        echo $form->textField($model, 'FECHA_INICIO', array(
            'id' => 'd-picker-fecha-inicio-' . $idTarea,
            'class' => ''
        ));

        echo $form->labelEx($model, 'FECHA_FIN');
        echo $form->textField($model, 'FECHA_FIN', array(
            'id' => 'd-picker-fecha-fin-' . $idTarea,
            'class' => ''
        ));


        echo $form->error($model, 'FECHA_INICIO');
        echo $form->error($model, 'FECHA_FIN');
        ?>
    </div>
    
    <div class="row">
        Frecuencia (no implementada aun).
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'PRIORIDAD');
        echo $form->dropDownList($model, 'PRIORIDAD', array("1" => "Alta", "2" => "Media", "3" => "Baja"));
        echo $form->error($model, 'PRIORIDAD');
        ?>
    </div>

    <div class="row">
        Tipo de Tarea: (investigacion, docencia, servicios, etc) (no implementada aun).
    </div>


    <div class="row">
        <?php
        echo $form->labelEx($model, 'INAMOVIBLE');
        echo $form->checkBox($model, 'INAMOVIBLE', array('checked' => 1, 'unchecked' => 0));
        echo $form->error($model, 'INAMOVIBLE');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'HORA_INICIO');
        echo $form->textField($model, 'HORA_INICIO');
        echo $form->error($model, 'HORA_INICIO');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'HORA_FIN');
        echo $form->textField($model, 'HORA_FIN');
        echo $form->error($model, 'HORA_FIN');
        ?>
    </div>

    <div class="row buttons">
        <?php
        $label = "editar tarea";
        $htmlOptions = array(
            'id' => 'editar',
            'name' => 'editar'
        );
        echo CHtml::submitButton($label, $htmlOptions);
        ?>
        <div class="clearFix"></div>
    </div>

    <?php */$this->endWidget(); ?>
    </div>
</div><!-- form -->

