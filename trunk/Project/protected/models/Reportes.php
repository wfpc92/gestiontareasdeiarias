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
        $sql = "SELECT nombre_tarea
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
        $sql = "SELECT nombre_tarea
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
                WHERE fecha_productividad between '{$fechaFin}' AND '{$fechaInicio}'
                AND id_usuario = {$userId}
                ORDER BY fecha_productividad ASC";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

}
