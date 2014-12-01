<?php

class ReportesController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array(
                    'index',
                    'formularioTareasCompletadas',
                    'formularioEsfuerzo',
                    'tareasCompletadas',
                    'esfuerzoDiario'
                ),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Actividad the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Actividad::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Actividad $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'actividad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function plantillaIndex($action) {
        $fecha = date_create();
        Calendario::setFecha($fecha);
        $contentVistaDiaria = $this->renderPartial($action, array(), true);
        $this->render('../site/index', array(
            'vistaIzquierda' => $contentVistaDiaria
        ));
    }

    public function actionIndex() {
        $this->plantillaIndex('index');
    }

    public function actionFormularioTareasCompletadas() {
        $this->plantillaIndex('_form');
    }

    public function actionFormularioEsfuerzo() {
        $this->plantillaIndex('_form_esfuerzo');
    }

    public function actionTareasCompletadas() {
        $fecha = date_create();
        Calendario::setFecha($fecha);

        $model = new Reportes;
        $content = $this->renderPartial("_form", array(), true);
        if (isset($_REQUEST['Tarea'])) {
            $fechaInicio = $_REQUEST['Tarea']['FECHA_INICIO'];
            $fechaFin = $_REQUEST['Tarea']['FECHA_FIN'];
            $cantidadTareasFinalizadas = $model->getNumeroTareasFinalizadas($fechaInicio, $fechaFin);
            $cantidadTareasPendientes = $model->getNumeroTareasPendientes($fechaInicio, $fechaFin);
            $tareasFinalizadas = $model->getTareasFinalizadas($fechaInicio, $fechaFin);
            $tareasPendientes = $model->getTareasPendientes($fechaInicio, $fechaFin);
            $content = $this->renderPartial('tareasCompletadasGraficas', array(
                'cantidadTareasFinalizadas' => $cantidadTareasFinalizadas,
                'cantidadTareasPendientes' => $cantidadTareasPendientes,
                'tareasFinalizadas' => $tareasFinalizadas,
                'tareasPendientes' => $tareasPendientes
                    ), true);
        }
        $this->render('../site/index', array(
            'vistaIzquierda' => $content
        ));
    }

    public function actionEsfuerzoDiario() {
        $fecha = date_create();
        Calendario::setFecha($fecha);
        $model = new Reportes;
        if (isset($_REQUEST['Tarea'])) {
            $fechaInicio = $_REQUEST['Tarea']['FECHA_INICIO'];
            $fechaFin = $_REQUEST['Tarea']['FECHA_FIN'];
        }
        $productividad = $model->getProductividad($fechaInicio, $fechaFin);
        $content = $this->renderPartial('esfuerzoDiaGraficas', array('productividad' => $productividad), true);
        $this->render('../site/index', array(
            'vistaIzquierda' => $content
        ));
    }

}
