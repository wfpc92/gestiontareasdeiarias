<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        if (Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->createUrl('site/login'));
        else {
            $fecha = date_create();
            Calendario::setFecha($fecha);
            $userId = Yii::app()->user->getId();
            
            $contentVistaDiaria = $this->renderPartial('../tarea/_vista_diaria', array(
                'userId' => $userId
                    ), true);
            $contentPoolTareas = $this->renderPartial('../tarea/_pool_tareas', array(
                'userId' => $userId
                    ), true);
            $this->render('index', array(
                'vistaIzquierda' => $contentVistaDiaria,
                'vistaDerecha' => $contentPoolTareas
            ));

            
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            $record = Usuario::model()->findByAttributes(array('correo' => $model->username));
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl('site/login'));
    }

}
