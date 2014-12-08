<?php
/* @var $this ReportesController */
/* @var $model Reportes */
?>

<p>Los reportes a consultar son: </p>
<ul id="reportes">
    <li>
        <?php echo CHtml::link("Tareas Completadas", Yii::app()->createUrl("reportes/formularioTareasCompletadas")); ?>
    </li>
    <li>
        <?php echo CHtml::link("Sensación de productividad", Yii::app()->createUrl("reportes/formularioEsfuerzo")); ?>
    </li>
    <li>
        <?php echo CHtml::link("Dedicación por Tipo de tarea", Yii::app()->createUrl("reportes/formularioDedicacion")); ?>
    </li>
</ul>