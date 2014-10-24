<?php

class TareaController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

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
                    'view',
                    'crearAjax',
                    'mostrarAjax',
                    'actualizarAjax',
                    'eliminarAjax',
                    'checkAjax',
                    'vistaDiaria',
                    'totalTarea'
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
        $htmlTarea = "";
        $htmlTareaEditar = "";
        $idActividad = NULL;
        $idTarea = NULL;
        $motivo = "";

        if (isset($_REQUEST['Tarea'])) {
            $model = new Tarea;
            $model->attributes = $_REQUEST['Tarea'];
            $userId = Yii::app()->user->getId();
            $idActividad = $model->ID_ACTIVIDAD;
            $model->CORREO = $userId;
            $model->PRIORIDAD = 0;
            $result = $model->save();
            if ($result) {
                $htmlTarea = $this->renderPartial('_view', array('data' => $model), true);
                $htmlTareaEditar = $this->renderPartial('_editar', array('model' => $model), true);
            } else {
                $motivo = "ERROR: no se guardo la tarea";
            }
        } else {
            $motivo = "ERROR: peticion de crear tarea mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'htmlTarea' => $htmlTarea,
            'htmlTareaEditar' => $htmlTareaEditar,
            'idActividad' => $model->ID_ACTIVIDAD,
            'idTarea' => $model->ID_TAREA,
            'motivo' => $motivo
        ));
    }

    /**
     * Funcion que muestra la tarea solicitada.
     */
    public function actionMostrarAjax() {
        $htmlTareaEditar = "";
        $idActividad = NULL;
        $idTarea = NULL;
        $motivo = "";

        if (isset($_REQUEST['Tarea'])) {
            $model = Tarea::model()->findByPk($_REQUEST["Tarea"]["ID_TAREA"]);
            if ($model !== NULL) {
                $htmlTareaEditar = $this->renderPartial('_editar', array('model' => $model), true);
                $idActividad = $model->ID_ACTIVIDAD;
                $idTarea = $model->ID_TAREA;
            }
        } else {
            $motivo = "ERROR: peticion de crear tarea mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'htmlTareaEditar' => $htmlTareaEditar,
            'idActividad' => $idActividad,
            'idTarea' => $idTarea,
            'motivo' => $motivo,
        ));
    }

    /**
     * Funcion que actualizar una tarea. 
     */
    public function actionActualizarAjax() {
        $actualizar = FALSE;
        $motivo = "";
        $idTarea = NULL;
        $idActividad = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["ID_TAREA"];
            $model = Tarea::model()->findByPk($idTarea);
            $model->attributes = $_REQUEST['Tarea'];
            $userId = Yii::app()->user->getId();
            $idActividad = $model->ID_ACTIVIDAD;
            $model->CORREO = $userId;
            $result = $model->save();

            if ($result) {
                $actualizar = true;
            }
            $motivo = $model->getErrors();
        } else {
            $motivo = "ERROR: peticion mal formada";
        }
        echo CJavaScript::jsonEncode(array(
            'actualizar' => $actualizar,
            'motivo' => $motivo,
            'idTarea' => $idTarea,
            'idActividad' => $idActividad
        ));
    }

    /**
     * Funcion que eliminar una tarea. 
     */
    public function actionEliminarAjax() {
        $borrar = false;
        $motivo = "";
        $idTarea = NULL;
        $idActividad = NULL;
        
        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["ID_TAREA"];
            $model = Tarea::model()->findByPk($idTarea);
            $model->attributes = $_REQUEST['Tarea'];
            $userId = Yii::app()->user->getId();
            $idActividad = $model->ID_ACTIVIDAD;
            $model->CORREO = $userId;
            $result = $model->delete();

            if ($result) {
                $borrar = true;
            } else {
                $motivo = "ERROR: no se hizo la eliminacion en BD";
            }
            $motivo = $model->getErrors();
        } else {
            $motivo = "ERROR: peticion mal formada";
        }
        echo CJavaScript::jsonEncode(array(
            'borrar' => $borrar,
            'motivo' => $motivo,
            'idTarea' => $idTarea,
            'idActividad' => $idActividad
        ));
    }

    /**
     * Funcion que actualiza el estado de una tarea. 
     */
    /* @var $model Tarea */
    public function actionCheckAjax() {
        $idTarea = NULL;
        $idActividad = NULL;
        
        $estado = isset($_REQUEST["ESTADO"]) ? 1 : 0;
        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["ID_TAREA"];
            $model = Tarea::model()->findByPk($idTarea);
            $idActividad = $model->ID_ACTIVIDAD;
            $model->ESTADO = $estado;
            $model->save();
        }
        echo CJavaScript::jsonEncode(array(
            'idTarea' => $idTarea,
            'idActividad' => $idActividad
        ));
    }

    /**
     * Funcion que renderiza las tareas de una fecha 
     */
    public function actionVistaDiaria() {
        if (Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->createUrl('site/login'));
        else {
            if (isset($_GET['fecha'])) {
                $d = strtotime($_GET['fecha']);
                $fecha = date("Y/m/d", $d);
            } else {
                $fecha = date("Y/m/d");
            }

            $contentVistaDiaria = $this->renderPartial('_vista_diaria', array(
                'fecha' => $fecha
                    ), true);
            $this->render('../site/index', array(
                'vista' => $contentVistaDiaria
            ));
        }
    }

    public function actionTotalTarea() {
        /* $model = Tarea::model()->findByPk($idTarea);
          $model->ESTADO = $estado;
          $model->save();
          $numTT =5;//consutla en bd
          $numTTol = 10; //consulta bd
         */
        $idActividad = $_GET["ID_ACTIVIDAD"];
        /*$dataProvider = new CActiveDataProvider('Tarea', array(
            'pagination' => false,
            'criteria' => array(
                'condition' => 'ID_ACTIVIDAD=' . $idActividad
        )));
        //var_dump($dataProvider->getItemCount());
        $numTT = $dataProvider->getItemCount();*/

        $numTT = 2;/*Yii::app()->db->createCommand()
                ->select(count('ID_ACTIVIDAD'))
                ->from('tarea')
                ->where('ID_ACTIVIDAD' == $idActividad);*/
        
        $numTTot = 4;/*Yii::app()->db->createCommand()
                ->select(count('ID_ACTIVIDAD'))
                ->from('tarea');*/
        
        echo CJavaScript::jsonEncode(array(
            //'idTarea' => $idTarea,
            'numTT' => $numTT,
            'numTTot' => $numTTot
        ));
    }

}