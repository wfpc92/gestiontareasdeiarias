<?php

define('USUARIO', 0);
define('ADMIN', 1);

class UsuarioController extends Controller {

    public $userData;

    public function init() {
        if (!Yii::app()->user->isGuest) {
            echo "perra";
            $this->userData = Usuario::model()->findByPk(Yii::app()->user->id);
        }
    }

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
                    'registro'
                ),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
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
     * @return Usuario the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Usuario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Usuario $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionRegistro() {
        $model = new Usuario;
        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->save()) {
                $this->redirect(Yii::app()->createUrl('site/login'));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuario']))
            $model->attributes = $_GET['Usuario'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    //hasta aqui
    public function actionRegistrarse() {
        $model = new Usuario('register');

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->render('registrarse', array('model' => $model));
    }

}
