<?php

class TareaController extends Controller {

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
                    'crearTareaPool',
                    'mostrarPoolAjax',
                    'pooladiariaAjax'
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
        $idActividad = NULL;
        $idTarea = NULL;
        $htmlTarea = NULL;
        $htmlTareaEditar = NULL;
        $progressBar = NULL;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $model = new Tarea;
            $model->attributes = $_REQUEST['Tarea'];
            $model->CORREO = Yii::app()->user->getId();
            $model->PRIORIDAD = 0;
            $model->scenario = "crearAjax";

            if ($model->validate()) {
                $model->save();
                $idActividad = $model->ID_ACTIVIDAD;
                $idTarea = $model->ID_TAREA;
                $htmlTarea = $this->renderPartial('_view', array('data' => $model), true);
                $htmlTareaEditar = $this->renderPartial('_editar', array('model' => $model), true);
                $progressBar = $model->progressBar(NULL);
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idActividad' => $idActividad,
            'idTarea' => $idTarea,
            'htmlTarea' => $htmlTarea,
            'htmlTareaEditar' => $htmlTareaEditar,
            'progressBar' => $progressBar,
            'error' => $error
        ));
    }

    /**
     * Funcion que muestra la tarea solicitada.
     */
    public function actionMostrarAjax() {
        $idActividad = NULL;
        $idTarea = NULL;
        $htmlTareaEditar = NULL;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $model = Tarea::model()->findByPk($_REQUEST["Tarea"]["ID_TAREA"]);
            $model->scenario = "crearAjax";
            if ($model->validate()) {
                $htmlTareaEditar = $this->renderPartial('_editar', array('model' => $model), true);
                $idActividad = $model->ID_ACTIVIDAD;
                $idTarea = $model->ID_TAREA;
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idActividad' => $idActividad,
            'idTarea' => $idTarea,
            'htmlTareaEditar' => $htmlTareaEditar,
            'error' => $error
        ));
    }

    public function actionMostrarPoolAjax() {
        $idActividad = NULL;
        $idTarea = NULL;
        $htmlTareaEditar = NULL;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $model = Tarea::model()->findByPk($_REQUEST["Tarea"]["ID_TAREA"]);
            $model->scenario = "crearAjax";
            if ($model->validate()) {
                $htmlTareaEditar = $this->renderPartial('_editar_diaria', array('model' => $model), true);
                $idActividad = $model->ID_ACTIVIDAD;
                $idTarea = $model->ID_TAREA;
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idActividad' => $idActividad,
            'idTarea' => $idTarea,
            'htmlTareaEditar' => $htmlTareaEditar,
            'error' => $error
        ));
    }
    
    /**
     * Funcion que actualizar una tarea. 
     */
    public function actionActualizarAjax() {
        $idActividad = (isset($_REQUEST['ID_ACTIVIDAD'])? $_REQUEST['ID_ACTIVIDAD'] : NULL);
        $idTarea = NULL;
        $actualizar = FALSE;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["ID_TAREA"];
            $model = Tarea::model()->findByPk($idTarea);            
            $model->attributes = $_REQUEST['Tarea'];
            $userId = Yii::app()->user->getId();
            if($idActividad!=NULL){
                $model->ID_ACTIVIDAD = $idActividad;
            }
            else{
                $idActividad = $model->ID_ACTIVIDAD;
            }            
            $model->CORREO = $userId;
            $model->scenario = "actualizarAjax";

            if ($model->validate()) {
                $model->save();
                $actualizar = true;
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idActividad' => $idActividad,
            'idTarea' => $idTarea,
            'actualizar' => $actualizar,
            'error' => $error,
        ));
    }

    /**
     * Funcion que eliminar una tarea. 
     */
    public function actionEliminarAjax() {
        $idActividad = NULL;
        $idTarea = NULL;
        $borrar = false;
        $progressBar = NULL;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["ID_TAREA"];
            $model = Tarea::model()->findByPk($idTarea);
            $model->attributes = $_REQUEST['Tarea'];
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;
            $idActividad = $model->ID_ACTIVIDAD;

            if ($model->validate()) {
                $model->delete();
                $progressBar = $model->progressBar(NULL);
                $borrar = true;
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idActividad' => $idActividad,
            'idTarea' => $idTarea,
            'borrar' => $borrar,
            'progressBar' => $progressBar,
            'error' => $error,
        ));
    }

    /**
     * Funcion que actualiza el estado de una tarea. 
     * @var $model Tarea
     */
    public function actionCheckAjax() {
        $idTarea = NULL;
        $idActividad = NULL;
        $progressBar = NULL;
        $error = NULL;
        
        $estado = isset($_REQUEST["ESTADO"]) ? 1 : 0;
        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["ID_TAREA"];
            $fecha = isset($_REQUEST["FECHA_HOY"]) ? $_REQUEST["FECHA_HOY"] : NULL;
            $model = Tarea::model()->findByPk($idTarea);
            $idActividad = $model->ID_ACTIVIDAD;
            $model->ESTADO = $estado;
            $model->save();
            $progressBar = $model->progressBar($fecha);
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idTarea' => $idTarea,
            'idActividad' => $idActividad,
            'progressBar' => $progressBar,
            'fecha' => $fecha,
            'error' => $error
        ));
    }

    /**
     * Funcion que renderiza las tareas de una fecha 
     */
    public function actionVistaDiaria() {
        if (Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->createUrl('site/login'));
        else {
            $userId = Yii::app()->user->getId();
            if (isset($_GET['fecha'])) {
                $fecha = date_create($_GET['fecha']);
            } else {
                $fecha = date_create();
            }
            Calendario::setFecha($fecha);
            $contentVistaDiaria = $this->renderPartial('_vista_diaria', array(
                'userId' => $userId
                    ), true);
            $contentPoolTareas = $this->renderPartial('_pool_tareas', array(
                'userId' => $userId
                    ), true);
            $this->render('../site/index', array(
                'vistaIzquierda' => $contentVistaDiaria,
                'vistaDerecha' => $contentPoolTareas
            ));
        }
    }

    /**
     * Funcion que crea una tarea y renderiza el formulario para editar la tarea. 
     */
    public function actionCrearTareaPool() {
        $htmlTarea = NULL;
        $htmlTareaEditar = NULL;
        $idActividad = NULL;
        $idTarea = NULL;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $model = new Tarea;
            $model->attributes = $_REQUEST['Tarea'];
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;
            $model->ID_ACTIVIDAD = NULL;
            $model->PRIORIDAD = 0;
            $result = $model->save();
            if ($result) {
                $htmlTarea = $this->renderPartial('_view', array('data' => $model), true);
                $htmlTareaEditar = $this->renderPartial('_editar_diaria', array('model' => $model), true);
            } else {
                $error = "ERROR: no se guardo la tarea";
            }
        } else {
            $error = "ERROR: peticion de crear tarea mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'htmlTarea' => $htmlTarea,
            'htmlTareaEditar' => $htmlTareaEditar,
            'idActividad' => $model->ID_ACTIVIDAD,
            'idTarea' => $model->ID_TAREA,
            'error' => $error
        ));
    }

    public function actionCargarActividades() {
        $categoriaModel = new Categoria;
        if (isset($_POST['Categoria'])) {
            $categoriaModel->attributes = $_POST['Categoria'];
        }

        $data = Actividad::model()->findAll('ID_CATEGORIA=' . $categoriaModel->ID_CATEGORIA);

        $data = CHtml::listData($data, 'ID_ACTIVIDAD', 'NOMBRE_ACTIVIDAD');

        foreach ($data as $value => $NOMBRE_ACTIVIDAD) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($NOMBRE_ACTIVIDAD), true);
        }
    }
    
    public function actionPooladiariaAjax() {
        $htmlTarea = NULL;
        $idActividad = NULL;
        $error = NULL;
        
        var_dump($_REQUEST);
        $idActividad = $_REQUEST['Tarea']['ID_ACTIVIDAD'];
        
        if (isset($_REQUEST['Tarea'])) {
            $model = new Tarea;
            $model->attributes = $_REQUEST['Tarea'];
            
            $model->cambiarADiaria($idActividad); //asignarle fecha de inicio, precondicion es que haya un id actividad.
            $htmlTarea = $this->renderPartial('_view', array('data' => $model), true);
        } else {
            $error = "ERROR: peticion de arrastrar tarea mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'htmlTarea' => $htmlTarea,
            'idActividad' => $model->ID_ACTIVIDAD,
            'error' => $error
        ));
    }

}
