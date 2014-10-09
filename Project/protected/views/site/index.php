<?php
/* @var $this SiteController */

//$this->pageTitle=Yii::app()->name;
?>

<div id="contentIzq">
    <?php
    $form = '../categoria/_form';
    $modelCategoria = new Categoria;
    $this->renderPartial
            ($form, array('model' => $modelCategoria));
    ?> 
    <div>
        <?php
        $dataProvider = new CActiveDataProvider('Categoria');
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '../categoria/_view',
        ));
        ?>  
    </div>
</div>
<div id="contentDer">
    <div class="progreso">
        Progreso:
    </div>
    <div class="menu">
        <ul id="menu">
            <li class="lista">
                <a href="#">Lista</a>
            </li>
            <li class="calendario">
                <a href="#">Calendario</a>
            </li>
        </ul>    
        <div class="clearFix"></div>
    </div>
    
    <a class="addTarea" href="#">Agregar tarea</a>
    
    <?php
    $form = '../tarea/_form';
    $modelTarea = new Tarea;
    $this->renderPartial
            ($form, array('model' => $modelTarea));
    ?>
    
    <?php
        $dataProvider = new CActiveDataProvider('Tarea');
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            //'viewData' => array('numero' => Yii::app()->getSession()->get('numeroActividad')),
            'viewData' => array('numero' => 1),
            'itemView' => '../tarea/_view',            
        ));
        ?>
    
</div>
<div class="clearFix"></div>


            
            
