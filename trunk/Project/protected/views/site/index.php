<?php
/* @var $this SiteController */
?>

<div id="contentIzq">
    <?php
    $form = '../categoria/_form';
    $modelCategoria = new Categoria;
    $this->renderPartial($form, array('model' => $modelCategoria));
    ?> 
    <div id="itemsCategoria">
        <?php
        $dataProvider = new CActiveDataProvider('Categoria', array(
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
                <li class="reportes">
                    <a href="#">Reportes</a>
                </li>
            </ul> 
            <div class="clearFix"></div>
        </div>

        <div id="content-princ-izq"></div>
        <div id="content-princ-der"></div>
        <div class="clearFix"></div>
    </div>
</div>
<div class="clearFix"></div>




<div class="clearFix"></div>


