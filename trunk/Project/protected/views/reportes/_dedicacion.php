<h2>Dedicacion</h2>
<p>Esta gráfica muestra cuanto tiempo se ha dedicado a cada tipo de tarea. En las tablas se puede encontrar información acerca de que tareas pertenecen a cada tipo y cuánto tiempo se ha invertido a cada tarea</p>
<br/>
<?php
$tipoTarea = array();
$durac = array();
foreach ($dedicacionPorTipo as $ded) {
    $tipoTarea[] = ucwords($ded['nombre']);
    $durac[] = intval($ded['dur']);
}
$mayorDuracion = 0;
foreach ($durac as $du) {
    if($du>$mayorDuracion){
        $mayorDuracion = $du;
    }
}
$cantidad = 10;
$ancho = intval($mayorDuracion / 7);

$this->widget(
            'chartjs.widgets.ChBars', 
            array(
                'width' => 600,
                'height' => 300,
                'htmlOptions' => array("class"=>"graficaDedicacion"),
                'labels' => $tipoTarea,
                'datasets' => array(
                    array(
                        "fillColor" => "rgba(76,250,189,0.5)",
                        "strokeColor" => "#22F7A6",
                        "data" => $durac
                    )       
                ),
                'options' => array(
                    "scaleOverride" => true, 
                    "scaleSteps" => $cantidad, 
                    "scaleStepWidth" => $ancho, 
                    "scaleStartValue" =>0)
            )
        );
?>

<table class="dedicacion">
    <thead>
        <tr>
            <th>Tipo de Tarea</th>
            <th>Tarea</th>
            <th>Duración</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($dedicacion as $ded) {
        ?>
        <tr>
            <td>
                <?php                
                echo ucwords($ded['nombre']);
                ?>
            </td>
            <td>
                <?php                
                $fecha = substr($ded['fecha_inicio'],0,10);
                echo CHtml::link($ded['nombre_tarea'], Yii::app()->createUrl("tarea/vistaDiaria?fecha=".$fecha));
                ?>
            </td>
            <td class="duracion">
                <?php
                echo $ded['dur'];;
                }
                ?>
            </td>
        </tr>
    </tbody>
</table>

<?php echo CHtml::Button('Regresar', array('submit' => '../reportes/formularioTareasCompletadas', 'class' => 'regresar-form-reportes')); ?>
