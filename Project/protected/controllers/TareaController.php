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
                    'crearAjax',
                    'mostrarAjax',
                    'actualizarAjax',
                    'eliminarAjax',
                    'checkAjax',
                    'vistaDiaria',
                    'crearTareaPool',
                    'mostrarPoolAjax',
                    'pooladiariaAjax',
                    'crearRegistroTareaAjax',
                    'pausarRegistroTareaAjax',
                    'actualizarRegistroTareaAjax',
                    'eliminarRegistroTareaAjax'
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
            $model->scenario = "crearAjax";
            $model->id_usuario = Yii::app()->user->getId();

            if ($model->validate()) {
                $model->save();
                $idActividad = $model->id_actividad;
                $idTarea = $model->id_tarea;

                //actualizar con los campos por defecto
                $model = Tarea::model()->findByPk($idTarea);
                $model->fecha_inicio = $model->fecha_creacion;
                $model->save();
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
            $model = Tarea::model()->findByPk($_REQUEST["Tarea"]["id_tarea"]);
            $model->scenario = "crearAjax";
            if ($model->validate()) {
                $htmlTareaEditar = $this->renderPartial('_editar', array('model' => $model), true);
                $idActividad = $model->id_actividad;
                $idTarea = $model->id_tarea;
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
            $model = Tarea::model()->findByPk($_REQUEST["Tarea"]["id_tarea"]);
            $model->scenario = "crearAjax";
            if ($model->validate()) {
                $htmlTareaEditar = $this->renderPartial('_editar_diaria', array('model' => $model), true);
                $idActividad = $model->id_actividad;
                $idTarea = $model->id_tarea;
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
        $idActividad = (isset($_REQUEST['id_actividad']) ? $_REQUEST['id_actividad'] : NULL);
        $idTarea = NULL;
        $actualizar = FALSE;
        $error = NULL;

        $inamovible = isset($_REQUEST['inamovible']) ? Tarea::INAMOVIBLESI : Tarea::INAMOVIBLENO;

        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["id_tarea"];
            $model = Tarea::model()->findByPk($idTarea);
            $model->attributes = $_REQUEST['Tarea'];
            $model->inamovible = $inamovible;

            if ($idActividad != NULL) {
                $model->id_actividad = $idActividad;
            } else {
                $idActividad = $model->id_actividad;
            }
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
    /* @var $model Tarea */
    public function actionEliminarAjax() {
        $idActividad = NULL;
        $idTarea = NULL;
        $borrar = false;
        $progressBar = NULL;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["id_tarea"];
            $model = Tarea::model()->findByPk($idTarea);
            $model->attributes = $_REQUEST['Tarea'];

            if ($model != NULL) {
                $idActividad = $model->id_actividad;
                $model->eliminarTarea();
                $progressBar = $model->progressBar(NULL);
                $borrar = true;
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
        $estado = NULL;
        $error = NULL;

        $estado = isset($_REQUEST["estado"]) ? Tarea::ESTADOFINALIZADA : Tarea::ESTADOEJECUCION;

        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST["Tarea"]["id_tarea"];
            $fecha = isset($_REQUEST["fecha_hoy"]) ? $_REQUEST["fecha_hoy"] : NULL;
            $model = Tarea::model()->findByPk($idTarea);
            $idActividad = $model->id_actividad;
            $model->estado = $estado;
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
            'estado' => $estado,
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
            $contentVistaDiaria = $this->renderPartial('_vista_diaria', array(), true);
            $contentPoolTareas = $this->renderPartial('_pool_tareas', array(), true);
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
            $model->id_usuario = $userId;
            $model->id_actividad = NULL;
            $model->prioridad = Tarea::PRIORIDADMEDIA;
            $model->inamovible = Tarea::INAMOVIBLESI;
            $model->diaria = Tarea::DIARIASI;
            $model->scenario = 'crearAjax';

            if ($model->validate()) {
                $model->save();
                $idActividad = $model->id_actividad;
                $idTarea = $model->id_tarea;
                $htmlTarea = $this->renderPartial('_view_pool', array('data' => $model), true);
                $htmlTareaEditar = $this->renderPartial('_pool_tareas', array(), true);
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "ERROR: peticion de crear tarea mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'htmlTarea' => $htmlTarea,
            'htmlTareaEditar' => $htmlTareaEditar,
            'idActividad' => $idActividad,
            'idTarea' => $idTarea,
            'error' => $error
        ));
    }

    public function actionCargarActividades() {
        $categoriaModel = new Categoria;
        if (isset($_POST['Categoria'])) {
            $categoriaModel->attributes = $_POST['Categoria'];
        }

        $data = Actividad::model()->findAll('ID_CATEGORIA=' . $categoriaModel->ID_CATEGORIA);

        $data = CHtml::listData($data, 'id_actividad', 'NOMBRE_ACTIVIDAD');

        foreach ($data as $value => $NOMBRE_ACTIVIDAD) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($NOMBRE_ACTIVIDAD), true);
        }
    }

    /* @var $model Tarea */

    public function actionPooladiariaAjax() {
        $htmlTarea = NULL;
        $idActividad = NULL;
        $error = NULL;

        $idActividad = isset($_REQUEST['Tarea']['id_actividad']) ? $_REQUEST['Tarea']['id_actividad'] : NULL;

        if (isset($_REQUEST['Tarea'])) {
            $idTarea = $_REQUEST['Tarea']['id_tarea'];
            $hoy = isset($_REQUEST['FECHA_HOY']) ? $_REQUEST['FECHA_HOY'] : NULL;
            $model = Tarea::model()->findByPk($idTarea);
            $idActividad = $model->id_actividad;
            if ($idActividad != NULL) {
                $model->cambiarADiaria($idActividad, $hoy); //asignarle fecha de inicio, precondicion es que haya un id actividad.
                $htmlTarea = $this->renderPartial('_view', array('data' => $model), true);
            } else {
                $error = 'No puede mover esta tarea porque no tiene una actividad asociada.';
            }
        } else {
            $error = "ERROR: peticion de arrastrar tarea mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'htmlTarea' => $htmlTarea,
            'idActividad' => $model->id_actividad,
            'error' => $error
        ));
    }

    public function actionCrearRegistroTareaAjax() {
        $idTarea = NULL;
        $idRegistroTarea = NULL;
        $htmlRegistroTarea = NULL;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $model = new Tarea;
            $model->attributes = $_REQUEST['Tarea'];
            $model = Tarea::model()->findByPk($model->id_tarea);

            if ($model->validate()) {
                $nuevoRegistroTarea = $model->crearRegistroTarea();
                $idTarea = $model->id_tarea;
                $idRegistroTarea = $nuevoRegistroTarea->id_registro_tarea;
                $htmlRegistroTarea = $this->renderPartial('../registro_tarea/_view', array('data' => $nuevoRegistroTarea), true);
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "ERROR: peticion mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'idTarea' => $idTarea,
            'idRegistroTarea' => $idRegistroTarea,
            'htmlRegistroTarea' => $htmlRegistroTarea,
            'error' => $error
        ));
    }

    /* @var $model Tarea */
    /* @var $ultimoRT RegistroTarea */

    public function actionPausarRegistroTareaAjax() {
        $idTarea = NULL;
        $idRegistroTareaUltimo = NULL;
        $duracionUltimo = NULL;
        $idRegistroTarea = NULL;
        $htmlRegistroTarea = NULL;
        $error = NULL;

        if (isset($_REQUEST['Tarea'])) {
            $model = new Tarea;
            $model->attributes = $_REQUEST['Tarea'];
            $model = Tarea::model()->findByPk($model->id_tarea);

            if ($model->validate()) {
                // crear el nuevo registro de tarea.
                $nuevoRegistroTarea = $model->crearRegistroTarea();
                $idRegistroTarea = $nuevoRegistroTarea->id_registro_tarea;
                $idTarea = $model->id_tarea;
                // actualizar la duracion de la tarea mas reciente
                $ultimoRT = $model->pausarRegistroTarea();
                $idRegistroTareaUltimo = $ultimoRT->id_registro_tarea;
                $duracionUltimo = $ultimoRT->duracion;

                $model->estado = Tarea::ESTADOPAUSA;
                $model->save();
                $htmlRegistroTarea = $this->renderPartial('../registro_tarea/_view', array('data' => $nuevoRegistroTarea), true);
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "ERROR: peticion mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'idTarea' => $idTarea,
            'idRegistroTareaUltimo' => $idRegistroTareaUltimo,
            'duracionUltimo' => $duracionUltimo,
            'idRegistroTarea' => $idRegistroTarea,
            'htmlRegistroTarea' => $htmlRegistroTarea,
            'error' => $error
        ));
    }

    /* @var $model RegistroTarea */

    public function actionActualizarRegistroTareaAjax() {
        $idTarea = NULL;
        $idRegistroTarea = NULL;
        $error = NULL;

        if (isset($_REQUEST['RegistroTarea'])) {
            $idTarea = isset($_REQUEST['RegistroTarea']['id_tarea']) ? $_REQUEST['RegistroTarea']['id_tarea'] : NULL;
            $idRegistroTarea = isset($_REQUEST['RegistroTarea']['id_registro_tarea']) ? $_REQUEST['RegistroTarea']['id_registro_tarea'] : NULL;
            $duracion = isset($_REQUEST['RegistroTarea']['duracion']) ? $_REQUEST['RegistroTarea']['duracion'] : NULL;
            $model = RegistroTarea::model()->findByPk($idRegistroTarea);
            $fechaInicio = isset($_REQUEST['fecha_inicio']) ? $_REQUEST['fecha_inicio'] : NULL;
            $horaInicio = isset($_REQUEST['hora_inicio']) ? $_REQUEST['hora_inicio'] : NULL;
            //guardar la fecha de inicio y la hora de inicio en el mismo campo
            $fechaHoraInicio = Calendario::fechaHoraFormatoSQL($fechaInicio, $horaInicio);
            $model->duracion = $duracion;
            $model->fecha_inicio = $fechaHoraInicio;

            if ($model->validate()) {
                $model->save();
            }
            if ($model->hasErrors()) {
                $error = $model->getErrors();
            }
        } else {
            $error = "ERROR: peticion mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'idTarea' => $idTarea,
            'idRegistroTarea' => $idRegistroTarea,
            'error' => $error
        ));
    }

    public function actionEliminarRegistroTareaAjax() {
        $error = NULL;
        $idTarea = NULL;
        $idRegistroTarea = NULL;

        if (isset($_REQUEST['RegistroTarea'])) {
            $idRegistroTarea = $_REQUEST['RegistroTarea']['id_registro_tarea'] ? $_REQUEST['RegistroTarea']['id_registro_tarea'] : NULL;
            $model = RegistroTarea::model()->findByPk($idRegistroTarea);
            if ($model != NULL && !$model->delete()) {
                $error = "Error: no se elimina el registro, actualice la página.";
            } else {
                $idTarea = $model->id_tarea;
            }
        } else {
            $error = "ERROR: peticion mal formada.";
        }
        echo CJavaScript::jsonEncode(array(
            'error' => $error,
            'idTarea' => $idTarea,
            'idRegistroTarea' => $idRegistroTarea
        ));
    }

}
