<?php
/* @var $this ReportesController */
/* @var $model Reportes */
?>

<ul>
    <li>
        <?php echo CHtml::link("Tareas Completadas", Yii::app()->createUrl("reportes/formularioTareasCompletadas")); ?>
    </li>
    <li>
        <?php echo CHtml::link("Sensación de productividad", Yii::app()->createUrl("reportes/formularioEsfuerzo")); ?>
    </li>
</ul>