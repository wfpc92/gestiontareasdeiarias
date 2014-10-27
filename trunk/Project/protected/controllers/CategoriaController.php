<?php

class CategoriaController extends Controller {
    
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
                'actions' => array('index', 'view', 'crearAjax', 'editarFormAjax', 'editarAjax', 'eliminarAjax'),
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
        $model = new Categoria;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Categoria'])) {
            $model->attributes = $_POST['Categoria'];
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->ID_CATEGORIA));
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

        if (isset($_POST['Categoria'])) {
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;
            $model->attributes = $_POST['Categoria'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->ID_CATEGORIA));
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
        $dataProvider = new CActiveDataProvider('Categoria');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Categoria('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Categoria']))
            $model->attributes = $_GET['Categoria'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Categoria the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Categoria::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Categoria $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'categoria-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Crear una categoria desde el lado el cliente.
     */
    public function actionCrearAjax() {
        $idCategoria = NULL;
        $htmlCategoria = NULL;
        $error = NULL;

        if (isset($_REQUEST['Categoria'])) {
            $model = new Categoria;
            $model->attributes = $_REQUEST['Categoria'];
            $userId = Yii::app()->user->getId();
            $model->CORREO = $userId;
            if ($model->validate()) {
                $model->save();
                $idCategoria = $model->ID_CATEGORIA;
                $htmlCategoria = $this->renderPartial('_view', array('data' => $model), true);
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }

        echo CJavaScript::jsonEncode(array(
            'idCategoria' => $idCategoria,
            'htmlCategoria' => $htmlCategoria,
            'error' => $error
        ));
    }

    /**
     * Funcion que retorna el formulario de edicion de la categoria
     */
    public function actionEditarFormAjax() {
        $idCategoria = NULL;
        $htmlEditarForm = "";
        $error = NULL;

        if (isset($_REQUEST['Categoria'])) {
            $idCategoria = $_REQUEST["Categoria"]["ID_CATEGORIA"];
            $model = Categoria::model()->findByPk($idCategoria);
            if ($model !== NULL) {
                $htmlEditarForm = $this->renderPartial('_editar', array(
                    'model' => $model
                        ), TRUE);
            } else {
                $error = "No existe esta categoria, actualice la página.";
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idCategoria' => $idCategoria,
            'htmlEditarForm' => $htmlEditarForm,
            'error' => $error
        ));
    }

    /**
     * Funcion que Editar una categoria y retorna la categoria.
     */
    public function actionEditarAjax() {
        $idCategoria = NULL;
        $htmlCategoria = NULL;
        $error = NULL;

        if (isset($_REQUEST['Categoria'])) {
            $idCategoria = $_REQUEST["Categoria"]["ID_CATEGORIA"];
            $model = Categoria::model()->findByPk($idCategoria);
            $model->attributes = $_REQUEST['Categoria'];
            if ($model->validate()) {
                $model->save();
                $htmlCategoria = CHtml::link($model->NOMBRE_CATEGORIA, "#", array(
                            'class' => 'categoria',
                            'onclick' => 'return categoriaToogle(this)'
                ));
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idCategoria' => $idCategoria,
            'htmlCategoria' => $htmlCategoria,
            'error' => $error
        ));
    }

    /**
     * Funcion que eliminar una categoria. 
     */
    public function actionEliminarAjax() {
        $borrar = FALSE;
        $idCategoria = NULL;
        $error = NULL;

        if (isset($_REQUEST['Categoria'])) {
            $idCategoria = $_REQUEST["Categoria"]["ID_CATEGORIA"];
            $model = Categoria::model()->findByPk($idCategoria);
            if ($model->validate()) {
                $model->delete();
                $borrar = TRUE;
            } else {
                $error = "ERROR: no se hizo la eliminacion en BD";
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "Error en el envio del formulario.";
        }
        echo CJavaScript::jsonEncode(array(
            'idCategoria' => $idCategoria,
            'borrar' => $borrar,
            'error' => $error
        ));
    }

}
