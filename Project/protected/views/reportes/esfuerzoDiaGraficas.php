<h2>Reporte Esfuerzo por Días</h2>
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
    $producFecha[] = substr($prod['fecha_productividad'],0,10);
}
?>
<?php
$this->widget(
        'chartjs.widgets.ChLine', array(
    'width' => 600,
    'height' => 300,
    'htmlOptions' => array(),
    'labels' => $producFecha,
    'datasets' => array(
        array(
            "fillColor" => "rgba(220,220,220,0.5)",
            "strokeColor" => "rgba(220,220,220,1)",
            "pointColor" => "rgba(220,220,220,1)",
            "pointStrokeColor" => "#ffffff",
            "data" => $producNumero,
        ),
    ),
    'options' => array(
                    "scaleOverride" => true, 
                    "scaleSteps" => 3, 
                    "scaleStepWidth" => 1, 
                    "scaleStartValue" =>0)
        )
);
?>
<br />
<table>
    <tr>
        <th>Día</th>
    </tr>        
    <?php
    foreach ($productividad as $prod) {
        ?>
        <tr>
            <td>
                <?php                
                $fecha = substr($prod['fecha_productividad'],0,10);
                echo CHtml::link($fecha, Yii::app()->createUrl("tarea/vistaDiaria?fecha=".$fecha));
            }
            ?>
        </td>
    </tr>
</table>
<table>
    <tr>
        <th>Sensación de productividad</th>
    </tr>
    <?php
    foreach ($productividad as $prod) {
        ?>
        <tr>
            <td>
                <?php
                echo $prod['productividad'];
            }
            ?>
        </td>
    </tr>
</table>
<?php
    $proMensaje = '';
    $promedio = (($contadorAlta*3)+($contadorMedia*2)+$contadorBaja)/($contadorAlta+$contadorMedia+$contadorBaja);
    switch(intval($promedio)){
        case 1:$proMensaje = Productividad::BAJA;break;
        case 2:$proMensaje = Productividad::MEDIA;break;
        case 3:$proMensaje = Productividad::ALTA;break;
    }    
    echo "Su productividad en este rango de fechas es: ".$proMensaje;
?>
<h2>Descripcion</h2>
<p>Esta grafica muestra la sensacion de productividad que se tuvo el dia mencionado (la sensacion es ingresada por el usuario). 3 representa una sensacion alta, 2 una sensacion media y 1 una sensacion baja</p>
<?php echo CHtml::link("Regresar", Yii::app()->createUrl("reportes")); ?>
