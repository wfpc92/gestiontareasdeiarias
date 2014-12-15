<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Reportes {

    public function getNumeroTareasFinalizadas($fechaInicio, $fechaFin) {
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = "SELECT count( * ) as contador
                FROM tarea
                WHERE estado = '" . Tarea::ESTADOFINALIZADA . "'
                AND fecha_inicio between '{$fechaInicio}' AND '{$fechaFin}'
                AND id_usuario = {$userId}";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();

        return $rows;
    }

    public function getNumeroTareasPendientes($fechaInicio, $fechaFin) {
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = "SELECT count( * ) as contador
                FROM tarea
                WHERE estado != '" . Tarea::ESTADOFINALIZADA . "'
                AND fecha_inicio between '{$fechaInicio}' AND '{$fechaFin}'
                AND id_usuario = {$userId}";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

    public function getTareasFinalizadas($fechaInicio, $fechaFin) {
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = "SELECT nombre_tarea, fecha_inicio
                FROM tarea
                WHERE estado = '" . Tarea::ESTADOFINALIZADA . "'
                AND fecha_inicio between '{$fechaInicio}' AND '{$fechaFin}'
                AND id_usuario = {$userId}";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();

        return $rows;
    }

    public function getTareasPendientes($fechaInicio, $fechaFin) {
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = "SELECT nombre_tarea, fecha_inicio
                FROM tarea
                WHERE estado != '" . Tarea::ESTADOFINALIZADA . "'
                AND fecha_inicio between '{$fechaInicio}' AND '{$fechaFin}'
                AND id_usuario = {$userId}";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

    public function getProductividad($fechaInicio, $fechaFin) {
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = "SELECT productividad, fecha_productividad
                FROM productividad
                WHERE fecha_productividad between '{$fechaInicio}' AND '{$fechaFin}'
                AND id_usuario = {$userId}
                AND productividad != '' 
                ORDER BY fecha_productividad ASC";

        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

    public function getDedicacion($fechaInicio, $fechaFin) {
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = "SELECT ti.nombre, t.nombre_tarea, SUM( r.duracion ) as dur, t.fecha_inicio
                FROM tarea t
                JOIN registro_tarea r ON ( r.id_tarea = t.id_tarea )
                JOIN tipo_tarea ti ON ( ti.id_tipo_tarea = t.id_tipo_tarea )
                WHERE t.fecha_inicio between '{$fechaInicio}' AND '{$fechaFin}'
                AND t.id_usuario = {$userId}
                GROUP BY t.nombre_tarea";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

    public function getDedicacionPorTipo($fechaInicio, $fechaFin) {
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $sql = "SELECT ti.nombre, SUM( r.duracion ) as dur
                FROM tarea t
                JOIN registro_tarea r ON ( r.id_tarea = t.id_tarea )
                JOIN tipo_tarea ti ON ( ti.id_tipo_tarea = t.id_tipo_tarea )
                WHERE t.fecha_inicio between '{$fechaInicio}' AND '{$fechaFin}'
                AND t.id_usuario = {$userId}
                GROUP BY ti.nombre";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

}
