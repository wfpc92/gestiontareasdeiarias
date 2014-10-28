<?php
/* @var $modelCategoria Categoria */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'editar',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array(
            'onsubmit' => 'return tareaActualizarAjax(this)',
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

        /* echo $form->hiddenField($model, 'FECHA_INICIO');
          echo $form->labelEx($model, 'NOMBRE_TAREA');
          echo $form->textField($model, 'NOMBRE_TAREA', array(
          'id' => 'SUP',
          'size' => 60,
          'maxlength' => 100,
          'placeholder' => 'Editar Tarea'));
          echo $form->error($model, 'NOMBRE_TAREA'); */
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

    <?php $this->endWidget(); ?>

</div><!-- form -->

