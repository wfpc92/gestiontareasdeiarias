<h2>Reporte Esfuerzo por Días</h2>
<p>Esta gráfica muestra la sensación de productividad que se tuvo el día mencionado (la sensación es ingresada por el usuario). 3 representa una sensación alta, 2 una sensación media y 1 una sensación baja</p>
<?php
$producNumero = array();
$producFecha = array();
$contadorAlta = 0;
$contadorMedia = 0;
$contadorBaja = 0;
foreach ($productividad as $prod) {
    switch ($prod['productividad']) {
        case Productividad::ALTA:
            $producNumero[] = 3;
            $contadorAlta += 1;
            break;
        case Productividad::MEDIA:
            $producNumero[] = 2;
            $contadorMedia += 1;
            break;
        case Productividad::BAJA:
            $producNumero[] = 1;
            $contadorBaja += 1;
            break;
    }
    $producFecha[] = substr($prod['fecha_productividad'], 0, 10);
}
?>
<?php
$this->widget(
        'chartjs.widgets.ChLine', array(
    'width' => 600,
    'height' => 300,
    'htmlOptions' => array("class" => "graficaProductividad"),
    'labels' => $producFecha,
    'datasets' => array(
        array(
            "fillColor" => "rgba(72,65,247,0.5)",
            "strokeColor" => "rgba(72,65,247,1)",
            "pointColor" => "#ffffff",
            "pointStrokeColor" => "rgba(72,65,247,0.5)",
            "data" => $producNumero,
        ),
    ),
    'options' => array(
        "scaleOverride" => true,
        "scaleSteps" => 3,
        "scaleStepWidth" => 1,
        "scaleStartValue" => 0)
        )
);
?>
<br />
<table class="reporteProductividad">
    <thead>
        <tr>
            <th>Día</th>
            <th>Sensación de productividad</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($productividad as $prod) {
            ?>
            <tr>
                <td>
                    <?php
                    $fecha = substr($prod['fecha_productividad'], 0, 10);
                    echo CHtml::link($fecha, Yii::app()->createUrl("tarea/vistaDiaria?fecha=" . $fecha));
                    ?>
                </td>
                <td>
                    <?php
                    echo $prod['productividad'];
                }
                ?>
            </td>
        </tr>
    </tbody>   
</table>

<?php
$proMensaje = '';
$denominador = ($contadorAlta + $contadorMedia + $contadorBaja);
if ($denominador != 0) {
    $promedio = (($contadorAlta * 3) + ($contadorMedia * 2) + $contadorBaja) / $denominador;
} else {
    $promedio = NULL;
}

switch (intval($promedio)) {
    case 1:$proMensaje = Productividad::BAJA;
        break;
    case 2:$proMensaje = Productividad::MEDIA;
        break;
    case 3:$proMensaje = Productividad::ALTA;
        break;
}

if ($denominador != 0):
    ?>
    <div>
        <?php echo "Su productividad en este rango de fechas es: " ?> <span class="productividad-final"><?php echo $proMensaje; ?></span>
    </div>
    <?php
endif;
echo CHtml::Button('Regresar', array('submit' => '../reportes/formularioTareasCompletadas', 'class' => 'regresar-form-reportes'));
