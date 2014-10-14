<?php

class TareaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
                'actions' => array('index', 'view', 'crearAjax', 'actualizarAjax'),
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
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Tarea;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Tarea'])) {
            $model->attributes = $_POST['Tarea'];
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;
            if ($model->save())
                $this->redirect(array('view', $model->ID_TAREA));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Tarea'])) {
            $model->attributes = $_POST['Tarea'];
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->ID_TAREA));
        }

        $this->render('update', array(
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
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Tarea');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Tarea('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Tarea']))
            $model->attributes = $_GET['Tarea'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Tarea the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Tarea::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Tarea $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tarea-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Funcion que crea una tarea y renderiza el formulario para editar la tarea. 
     */
    public function actionCrearAjax() {
        if (isset($_REQUEST['Tarea'])) {
            $model = new Tarea;
            $model->attributes = $_REQUEST['Tarea'];
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;
            $model->PRIORIDAD = 0;
            $result = $model->save();
            if ($result) {
                $htmlTarea = $this->renderPartial('_view', array('data' => $model), true);
                $htmlTareaEditar = $this->renderPartial('_editar', array('model' => $model), true);

                echo CJavaScript::jsonEncode(array(
                    'htmlTarea' => $htmlTarea,
                    'htmlTareaEditar' => $htmlTareaEditar,
                    'idActividad' => $model->ID_ACTIVIDAD,
                    'idTarea' => $model->ID_TAREA
                ));
            } else {
                //error, no guardo la actividad
                echo "ERROR: no se guardo la tarea";
            }
        } else {
            echo "ERROR: peticion de crear tarea mal formada.";
        }
    }

    /**
     * Funcion que actualizar una tarea. 
     */
    public function actionActualizarAjax() {
        $actualizar = false;
        $motivo = "";

        if (isset($_REQUEST['Tarea'])) {
            $model = Tarea::model()->findByPk($_REQUEST["Tarea"]["ID_TAREA"]);
            $model->attributes = $_REQUEST['Tarea'];
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;

            $result = $model->save();
            if ($result) {
                $actualizar = true;
            } else {
                $motivo = "ERROR: no se hizo la actualizacion en BD";
            }

            $motivo = $model->getErrors();
        } else {
            $motivo = "ERROR: peticion mal formada";
        }
        echo CJavaScript::jsonEncode(array(
            'actualizar' => $actualizar,
            'motivo' => $motivo
        ));
    }

}
