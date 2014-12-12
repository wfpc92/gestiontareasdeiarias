<h2>Dedicacion</h2>
<?php
$tipoTarea = array();
$durac = array();
foreach ($dedicacionPorTipo as $ded) {
    $tipoTarea[] = $ded['nombre'];
    $durac[] = intval($ded['dur']);
}
$mayorDuracion = 0;
foreach ($durac as $du) {
    if($du>$mayorDuracion){
        $mayorDuracion = $du;
    }
}
$mayorDuracion = $mayorDuracion+5;
$this->widget(
            'chartjs.widgets.ChBars', 
            array(
                'width' => 600,
                'height' => 300,
                'htmlOptions' => array(),
                'labels' => $tipoTarea,
                'datasets' => array(
                    array(
                        "fillColor" => "#ff00ff",
                        "strokeColor" => "rgba(220,220,220,1)",
                        "data" => $durac
                    )       
                ),
                'options' => array(
                    "scaleOverride" => true, 
                    "scaleSteps" => $mayorDuracion, 
                    "scaleStepWidth" => 1, 
                    "scaleStartValue" =>0)
            )
        );
?>

<table>
    <tr>
        <th>Tipo de Tarea</th>
    </tr>        
    <?php
    foreach ($dedicacion as $ded) {
        ?>
        <tr>
            <td>
                <?php                
                echo $ded['nombre'];
            }
            ?>
        </td>
    </tr>
</table>
<table>
    <tr>
        <th>Tarea</th>
    </tr>        
    <?php
    foreach ($dedicacion as $ded) {
        ?>
        <tr>
            <td>
                <?php                
                $fecha = substr($ded['fecha_inicio'],0,10);
                echo CHtml::link($ded['nombre_tarea'], Yii::app()->createUrl("tarea/vistaDiaria?fecha=".$fecha));
            }
            ?>
        </td>
    </tr>
</table>
<table>
    <tr>
        <th>Duración</th>
    </tr>        
    <?php
    foreach ($dedicacion as $ded) {
        ?>
        <tr>
            <td>
                <?php                                
                echo $ded['dur'];
            }
            ?>
        </td>
    </tr>
</table>
<h2>Descripcion</h2>
<p>Esta grafica muestra cuanto tiempo se ha dedicado a cada tipo de tarea. En las tablas se puede encontrar informacion acerca de que tareas pertenecen a cada tipo y cuanto tiempo se ha invertido a cada tarea</p>
<?php echo CHtml::link("Menu Graficas", Yii::app()->createUrl("reportes")); ?>