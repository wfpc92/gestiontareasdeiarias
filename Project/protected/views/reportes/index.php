<?php
/* @var $this ReportesController 
    @var $model Reportes
 *
 *   
 */


$this->breadcrumbs=array(
	'Reportes',
);
?>
<?php
    $text = "Tareas Completadas";
    $url = Yii::app()->createUrl("reportes/formularioTareasCompletadas");
    $htmlOptions = array();
    echo CHtml::link($text, $url, $htmlOptions);
    
    $text = "Sensación de productividad";
    $url = Yii::app()->createUrl("reportes/formularioEsfuerzo");
    $htmlOptions = array();
    echo CHtml::link($text, $url, $htmlOptions);
?>