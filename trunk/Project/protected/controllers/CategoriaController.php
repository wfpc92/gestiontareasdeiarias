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
                'actions' => array(
                    'crearAjax',
                    'editarFormAjax',
                    'editarAjax',
                    'eliminarAjax',
                    'cargarActividadesAjax'),
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
            $model->id_usuario = Yii::app()->user->getId();
            if ($model->validate()) {
                $model->save();
                $idCategoria = $model->id_categoria;
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
        $htmlEditarForm = NULL;
        $error = NULL;

        if (isset($_REQUEST['Categoria'])) {
            $idCategoria = $_REQUEST["Categoria"]["id_categoria"];
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
            $idCategoria = $_REQUEST["Categoria"]["id_categoria"];
            $model = Categoria::model()->findByPk($idCategoria);
            $model->attributes = $_REQUEST['Categoria'];
            if ($model->validate()) {
                $model->save();
                $htmlCategoria = CHtml::link($model->nombre_categoria, "#", array(
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
            $idCategoria = $_REQUEST["Categoria"]["id_categoria"];
            $model = Categoria::model()->findByPk($idCategoria);
            if ($model->validate()) {
                $model->eliminarCategoria();
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

    /**
     * Cargar las actividades de una categoria
     */
    public function actionCargarActividadesAjax() {
        $idCategoria = NULL;
        $htmlActividades = NULL;
        $error = NULL;

        if (isset($_REQUEST['id_categoria'])) {
            $idCategoria = $_REQUEST['id_categoria'];
            $actividad = new Actividad;
            $actividad->id_categoria = $idCategoria;
            $htmlActividades = $this->renderPartial("../actividad/droplist", array('actividad' => $actividad), TRUE);
        } else {
            $error = "Error en el envio del formulario.";
        }

        echo CJavaScript::jsonEncode(array(
            'idCategoria' => $idCategoria,
            'htmlActividades' => $htmlActividades,
            'error' => $error
        ));
    }

}
