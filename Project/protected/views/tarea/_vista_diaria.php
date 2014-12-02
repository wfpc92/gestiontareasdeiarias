
<?php
/*  @var $productividadModel Productividad */

$fechaFormato = Calendario::getFechaFormato();
$userId = Yii::app()->user->getId();
?>
<h2><?php echo Calendario::getFechaFormatoHoy(); ?></h2>

<?php
/**
 * Obtener las tareas que hay para el dia
 */
$dataProvider = new CActiveDataProvider('Tarea', array(
    'pagination' => false,
    'criteria' => array(
        'condition' => " id_usuario = {$userId}"
        . " and fecha_inicio = '{$fechaFormato}' "
        . " and Diaria != 0"
    ))
);

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '../tarea/_view',
    'enablePagination' => false,
    'htmlOptions' => array(
        'id' => 'lst-tarea-diaria',
        'ondrop' => "drop(event)",
        'ondragover' => "allowDrop(event)"
    ))
);

$productividadModel = Productividad::model()->findByAttributes(array("fecha_productividad" => Calendario::getFechaFormato()));

if ($productividadModel == NULL) {
    $productividadModel = new Productividad();
    $productividadModel->fecha_productividad = Calendario::getFechaFormato();
}

$form = $this->beginWidget('CActiveForm', array(
    'id' => "form-productividad",
    'enableAjaxValidation' => false,
    'action' => Yii::app()->homeUrl . '/productividad/actualizarAjax',
    'htmlOptions' => array(
        'onchange' => 'return productividadActualizarAjax(this)',
        'class' => ''
    )
        ));

echo CHtml::hiddenField("fecha_productividad", $productividadModel->fecha_productividad);
echo $form->labelEx($productividadModel, 'productividad');
echo CHtml::dropDownList(
        'productividad'
        , $productividadModel->productividad
        , array(
    Productividad::ALTA => Productividad::ALTA,
    Productividad::MEDIA => Productividad::MEDIA,
    Productividad::BAJA => Productividad::BAJA,
        )
        , array('title' => 'Ingrese su sensación de productividad para el día de hoy.')
);
?>


<?php $this->endWidget(); ?>