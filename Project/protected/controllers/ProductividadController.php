<?php

class ProductividadController extends Controller {

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
                    'actualizarAjax'
                ),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionActualizarAjax() {
        $error = NULL;

        $productividad = (isset($_REQUEST['productividad']) ? $_REQUEST['productividad'] : NULL);
        $fechaProductividad = (isset($_REQUEST['fecha_productividad']) ? $_REQUEST['fecha_productividad'] : NULL);
        $userId = Yii::app()->user->getId();

        $model = new Productividad;
        $model->productividad = $productividad;
        $model->fecha_productividad = $fechaProductividad;
        $model->id_usuario = $userId;
        if ($model->validate()) {
            $model->save();
        }

        if ($model->hasErrors()) {
            $error = $model->getErrors();
        }
        echo CJavaScript::jsonEncode(array(
            'error' => $error
        ));
    }

}
