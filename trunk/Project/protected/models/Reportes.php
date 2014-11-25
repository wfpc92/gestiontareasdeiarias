<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Reportes {
    
    public function getNumeroTareasFinalizadas($fechaInicio,$fechaFin){
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = 'SELECT count( * ) as contador
                FROM tarea
                WHERE estado =1
                AND fecha_fin <= \''.$fechaFin.'\'
                AND fecha_inicio >= \''.$fechaInicio.'\'
                AND correo = \''.$userId.'\'';
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();        
        $rows = $dataReader->readAll();
                
        return $rows;
    }
    
    public function getNumeroTareasPendientes($fechaInicio,$fechaFin){
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = 'SELECT count( * ) as contador
                FROM tarea
                WHERE estado is NULL
                AND fecha_fin <= \''.$fechaFin.'\'
                AND fecha_inicio >= \''.$fechaInicio.'\'
                AND correo = \''.$userId.'\'';
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        // using foreach to traverse through every row of data
        //foreach ($dataReader as $row) { 
        //}
        // retrieving all rows at once in a single array
        $rows = $dataReader->readAll();
        
        return $rows;
    }
    
    public function getTareasFinalizadas($fechaInicio,$fechaFin){
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = 'SELECT nombre_tarea
                FROM tarea
                WHERE estado =1
                AND fecha_fin <= \''.$fechaFin.'\'
                AND fecha_inicio >= \''.$fechaInicio.'\'
                AND correo = \''.$userId.'\'';
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        // using foreach to traverse through every row of data
        //foreach ($dataReader as $row) { 
        //}
        // retrieving all rows at once in a single array
        $rows = $dataReader->readAll();
        
        return $rows;
    }
    
    public function getTareasPendientes($fechaInicio,$fechaFin){
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = 'SELECT nombre_tarea
                FROM tarea
                WHERE estado is NULL
                AND fecha_fin <= \''.$fechaFin.'\'
                AND fecha_inicio >= \''.$fechaInicio.'\'
                AND correo = \''.$userId.'\'';
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        // using foreach to traverse through every row of data
        //foreach ($dataReader as $row) { 
        //}
        // retrieving all rows at once in a single array
        $rows = $dataReader->readAll();
        
        return $rows;
    }
    
    public function getProductividad($fechaInicio,$fechaFin){
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = 'SELECT productividad
                FROM productividad
                WHERE fecha_productividad <= \''.$fechaFin.'\'
                AND fecha_productividad >= \''.$fechaInicio.'\'
                AND id_usuario = \''.$userId.'\'';
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        // using foreach to traverse through every row of data
        //foreach ($dataReader as $row) { 
        //}
        // retrieving all rows at once in a single array
        $rows = $dataReader->readAll();
        
        return $rows;
    }
    
    public function getFechasProductividad($fechaInicio,$fechaFin){
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = 'SELECT fecha_productividad
                FROM productividad
                WHERE fecha_productividad <= \''.$fechaFin.'\'
                AND fecha_productividad >= \''.$fechaInicio.'\'
                AND id_usuario = \''.$userId.'\'';
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        // using foreach to traverse through every row of data
        //foreach ($dataReader as $row) { 
        //}
        // retrieving all rows at once in a single array
        $rows = $dataReader->readAll();
        
        return $rows;
    }
}
