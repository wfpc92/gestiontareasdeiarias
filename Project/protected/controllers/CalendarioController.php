<?php

class CalendarioController extends Controller {

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
                'actions' => array('index', 'view', 'CalendarEvents'),
                //'actions'=>array('index','view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'CalendarEvents'),
                //'actions'=>array('create','update','admin'),
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
     * Lists all models.
     */
    public function actionIndex() {
        if (Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->createUrl('site/login'));
        else {
            //$selectedDate = $this->getSelectedDate();
            $contentCalendario = $this->renderPartial('index', array(
                    ), true);

            $this->render('../site/index', array(
                'vistaIzquierda' => $contentCalendario
            ));
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionCalendarEvents() {
        $items[] = array(
            'title' => 'Meeting',
            'start' => strtotime('2014-10-10'),
            'color' => '#CC0000',
            'allDay' => true,
            'url' => 'http://anyurl.com'
        );
        $items[] = array(
            'title' => 'Meeting reminder',
            'start' => strtotime('2014-10-11'),
            'end' => strtotime('2014-10-12'),
            'color' => 'blue',
        );
        echo CJSON::encode($items);
        Yii::app()->end();
    }

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
        $model = new Calendario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Calendario'])) {
            $model->attributes = $_POST['Calendario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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

        if (isset($_POST['Calendario'])) {
            $model->attributes = $_POST['Calendario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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

    private function getSelectedDate() {
        $year = $month = $day = null;
        $selectedDate = null;

        if (isset($_GET["year"]) && isset($_GET["month"]) && isset($_GET["day"])) {
            $year = filter_input(INPUT_GET, "year", FILTER_VALIDATE_INT);
            $month = filter_input(INPUT_GET, "month", FILTER_VALIDATE_INT);
            $day = filter_input(INPUT_GET, "day", FILTER_VALIDATE_INT);
        }

        if ($year && $month && $day) {
            $selectedDate = "$month/$day/$year";
        }

        return $selectedDate;
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Calendario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Calendario']))
            $model->attributes = $_GET['Calendario'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Calendario the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Calendario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Calendario $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'calendario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
