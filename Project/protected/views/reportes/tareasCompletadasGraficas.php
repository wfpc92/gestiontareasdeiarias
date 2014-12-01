<h1>Tareas</h1>
<?php
$this->widget(
        'chartjs.widgets.ChPie', array(
    'width' => 600,
    'height' => 300,
    'htmlOptions' => array(),
    'drawLabels' => true,
    'datasets' => array(
        array(
            "value" => intval($cantidadTareasFinalizadas[0]['contador']),
            //"value" => 1,
            "color" => "rgba(220,30, 70,1)",
            "label" => "Tareas Finalizadas"
        ),
        array(
            "value" => intval($cantidadTareasPendientes[0]['contador']),
            //"value" => 6,
            "color" => "rgba(66,66,66,1)",
            "label" => "Tareas Pendientes"
        )
    ),
    'options' => array()
        )
);
echo "Finalizadas: " . $cantidadTareasFinalizadas[0]['contador'] . "\nPendientes: " . $cantidadTareasPendientes[0]['contador'];
?>
<br />
<table>
    <tr>
        <th>Finalizadas</th>
    </tr>        
    <?php
    foreach ($tareasFinalizadas as $finalizada) {
        ?>
        <tr>
            <td>
                <?php
                echo $finalizada['nombre_tarea'];
            }
            ?>
        </td>
    </tr>
</table>
<table>
    <tr>
        <th>Pendientes</th>
    </tr>
    <?php
    foreach ($tareasPendientes as $pendiente) {
        ?>
        <tr>
            <td>
                <?php
                echo $pendiente['nombre_tarea'] . '  ';
            }
            ?>
        </td>
</table>       


