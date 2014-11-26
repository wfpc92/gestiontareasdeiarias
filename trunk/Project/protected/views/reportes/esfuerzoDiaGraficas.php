<?php    
    $producNumero = array();
    $producFecha = array();
    foreach($productividad as $prod){        
        switch($prod['productividad']){
            case 'alta':
                $producNumero[] = 3;
                break;
            case 'media':
                $producNumero[] = 2;
                break;
            case 'baja':
                $producNumero[] = 1;
                break;
        }
        $producFecha[] = $prod['fecha_productividad'];
    }        
?>
<?php 
        $this->widget(
            'chartjs.widgets.ChLine', 
            array(
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
                'options' => array()
            )
        ); 
?>
<br />
<table>
    <tr>
        <th>Día</th>
    </tr>        
        <?php
        foreach($productividad as $prod){
        ?>
    <tr>
        <td>
        <?php
            echo $prod['fecha_productividad'].'  ';
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
        foreach($productividad as $prod){
        ?>
    <tr>
        <td>
        <?php
            echo $prod['productividad'].'  ';
        }
        ?>
        </td>
    </tr>
</table>

