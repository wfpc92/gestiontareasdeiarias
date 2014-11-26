<?php

class ReportesController extends Controller
{
	public function actionIndex()
	{                
            $this->render('index');
	}
        public function actionFormularioTareasCompletadas(){
            $this->render('_form');
        }
        public function actionFormularioEsfuerzo(){
            $this->render('_form_esfuerzo');
        }
        public function actionTareasCompletadas(){
            $model = new Reportes;
            if (isset($_REQUEST['Tarea'])) {
                $fechaInicio = $_REQUEST['Tarea']['FECHA_INICIO'];
                $fechaFin = $_REQUEST['Tarea']['FECHA_FIN'];
            }            
            $cantidadTareasFinalizadas = $model->getNumeroTareasFinalizadas($fechaInicio,$fechaFin);
            $cantidadTareasPendientes = $model->getNumeroTareasPendientes($fechaInicio,$fechaFin);
            $tareasFinalizadas = $model->getTareasFinalizadas($fechaInicio,$fechaFin);
            $tareasPendientes = $model->getTareasPendientes($fechaInicio,$fechaFin);
            $this->render('tareasCompletadasGraficas',array('cantidadTareasFinalizadas'=>$cantidadTareasFinalizadas,
                    'cantidadTareasPendientes'=>$cantidadTareasPendientes,
                    'tareasFinalizadas'=>$tareasFinalizadas,
                    'tareasPendientes'=>$tareasPendientes));
        }
        
        public function actionEsfuerzoDiario(){
            $model = new Reportes;
            if (isset($_REQUEST['Tarea'])) {
                $fechaInicio = $_REQUEST['Tarea']['FECHA_INICIO'];
                $fechaFin = $_REQUEST['Tarea']['FECHA_FIN'];
            }            
            $productividad = $model->getProductividad($fechaInicio,$fechaFin);            
            $this->render('esfuerzoDiaGraficas',array('productividad'=>$productividad));
        }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}