<?php

class ActividadController extends Controller {

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
                    'crearAjax',
                    'listarTareasAjax',
                    'editarFormAjax',
                    'editarAjax',
                    'eliminarAjax'),
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

    /**
     * Crear una actividad desde el lado el cliente.
     */
    public function actionCrearAjax() {
        $idCategoria = NULL;
        $idActividad = NULL;
        $htmlActividad = NULL;
        $error = NULL;

        if (isset($_REQUEST['Actividad'])) {
            $model = new Actividad;
            $model->attributes = $_REQUEST['Actividad'];

            if ($model->validate()) {
                $model->save();
                $idCategoria = $model->id_categoria;
                $idActividad = $model->id_actividad;
                $htmlActividad = $this->renderPartial('_view', array('data' => $model), true);
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idCategoria' => $idCategoria,
            'idActividad' => $idActividad,
            'htmlActividad' => $htmlActividad,
            'error' => $error
        ));
    }

    /**
     * listar las tareas de una actividad
     * @var $model Actividad
     */
    public function actionListarTareasAjax() {
        $idActividad = NULL;
        $htmlTareas = NULL;
        $progressBar = NULL;
        $error = NULL;

        if (isset($_REQUEST['Actividad'])) {
            $idActividad = $_REQUEST['Actividad']['id_actividad'];
            $model = Actividad::model()->findByPk($idActividad);
            $progressBar = $model->progressBar(NULL);
            $htmlTareas = $this->renderPartial('_listar_tareas', array(
                'model' => $model
                    ), true);
        }
        echo CJavaScript::jsonEncode(array(
            'idActividad' => $idActividad,
            'htmlTareas' => $htmlTareas,
            'progressBar' => $progressBar,
            'error' => $error
        ));
    }

    /**
     * Funcion que retorna el formulario de edicion de la actividad
     */
    public function actionEditarFormAjax() {
        $idActividad = NULL;
        $htmlEditarForm = NULL;
        $error = NULL;

        if (isset($_REQUEST['Actividad'])) {
            $idActividad = $_REQUEST["Actividad"]["id_actividad"];
            $model = Actividad::model()->findByPk($idActividad);
            if ($model !== NULL) {
                $htmlEditarForm = $this->renderPartial('_editar', array(
                    'model' => $model
                        ), TRUE);
            } else {
                $error = "Actividad Seleccionada Desconocida. Actualice la página.";
            }
        }
        echo CJavaScript::jsonEncode(array(
            'idActividad' => $idActividad,
            'htmlEditarForm' => $htmlEditarForm,
            'error' => $error
        ));
    }

    /**
     * Funcion que Editar una actividad y retorna la actividad.
     */
    public function actionEditarAjax() {
        $idActividad = NULL;
        $htmlActividad = NULL;
        $error = NULL;

        if (isset($_REQUEST['Actividad'])) {
            $idActividad = $_REQUEST["Actividad"]["id_actividad"];
            $model = Actividad::model()->findByPk($idActividad);
            $model->attributes = $_REQUEST['Actividad'];
            if ($model->validate()) {
                $model->save();
                $htmlActividad = CHtml::link($model->nombre_actividad, "#", array(
                            'id' => 'lnk-tarea-listar-' . $idActividad,
                            'class' => 'actividad',
                            'onclick' => 'return actividadListarTareasAjax(this)'
                ));
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idActividad' => $idActividad,
            'htmlActividad' => $htmlActividad,
            'error' => $error
        ));
    }

    /**
     * Funcion que elimina una actividad. 
     */
    public function actionEliminarAjax() {
        $borrar = false;
        $idActividad = NULL;
        $error = NULL;

        if (isset($_REQUEST['Actividad'])) {
            $idActividad = $_REQUEST["Actividad"]["id_actividad"];
            $model = Actividad::model()->findByPk($idActividad);
            if ($model->validate()) {
                $model->eliminarActividad();
                $borrar = true;
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'borrar' => $borrar,
            'idActividad' => $idActividad,
            'error' => $error
        ));
    }

}
