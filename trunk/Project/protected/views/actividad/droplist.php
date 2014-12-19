<?php

/* @var $actividad Actividad */

$idCategoria = $actividad->id_categoria;
$actividades = Actividad::model()->findAll("id_categoria={$idCategoria}");
$lstActividades = CHtml::listData($actividades, 'id_actividad', 'nombre_actividad');

echo CHtml::label("Seleccione una Actividad:", "id_actividad");
echo CHtml::dropDownList('id_actividad'
        , $actividad->id_actividad
        , array(0 => 'Seleccione una actividad...') + $lstActividades
        , array()
);
