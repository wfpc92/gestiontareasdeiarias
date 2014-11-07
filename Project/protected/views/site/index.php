<?php
/* @var $this SiteController */
?>

<div id="contentIzq">
    <div id="cargando-principal"></div>
    <div id="error-principal"></div>
    <?php
    $form = '../categoria/_form';
    $modelCategoria = new Categoria;
    $modelCategoria->CORREO = Yii::app()->user->getId();
    $this->renderPartial($form, array('model' => $modelCategoria));
    ?> 
    <div id="itemsCategoria">
        <?php
        $dataProvider = new CActiveDataProvider('Categoria', array(
            'criteria' => array(
                'condition' => 'CORREO=\'' . $modelCategoria->CORREO . '\''),
            'pagination' => false
        ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '../categoria/_view',
            'enablePagination' => false,
            'id' => 'categoria-list-view'
        ));
        ?>  
    </div>
</div>

<div class="fluida">
    <div id="contentDer">
        <div id="actividad_progress_bar" class="progreso">
            
            <div id="progressbar"> 
                <span>Progreso: </span>
                <?php
                $this->widget('zii.widgets.jui.CJuiProgressBar', array(
                    'value' => 1000,
                    'htmlOptions' => array(
                        'id' => 'progress-bar-real'
                    )
                ));
                ?>
            </div>
            <div class="clear"></div>
        </div>

        <div class="menu">
            <ul id="menu">
                <li class="lista">
                    <?php
                    $text = "Hoy";
                    $url = Yii::app()->createUrl("tarea/vistaDiaria");
                    $htmlOptions = array();
                    echo CHtml::link($text, $url, $htmlOptions);
                    ?>
                    <script>
                        function allowDrop(ev) {
                            ev.preventDefault();
                        }
                        
                        function drag(ev) {
                            ev.dataTransfer.setData("text/html", ev.target.nodeName);
                        }

                        function drop(ev) {
                            ev.preventDefault();
                            //var data = ev.dataTransfer.getData("text/html");
                            var data = ev.dataTransfer.getData("text/html");
                            //ev.target.appendChild(document.getElementById(data));
                            tareaPoolADiariaAjax(data);
                        }
                    </script>
                </li>
                <li class="calendario">
                    <?php
                    $text = "Calendario";
                    $url = Yii::app()->urlManager->createUrl("calendario");
                    $htmlOptions = array();
                    echo CHtml::link($text, $url, $htmlOptions);
                    ?>
                </li>
                <li class="reportes">
                    <a href="#">Reportes</a>
                </li>
            </ul> 
        </div>

        <div id="content-princ-izq" ondrop="drop(event)" ondragover="allowDrop(event)">
            <?php
            if (isset($vistaIzquierda)) {
                echo $vistaIzquierda;
            }
            ?>
        </div>
        <div id = "content-princ-der" ondrop="drop(event)" ondragover="allowDrop(event)">
            <?php
            if (isset($vistaDerecha)) {
                echo $vistaDerecha;
            }
            ?>
        </div>
        <div class="clear"></div>
        <?php echo CHtml::Button(yii::t('app', 'Regresar'), array('id' => 'regresar')); ?>
    </div>    
</div>
