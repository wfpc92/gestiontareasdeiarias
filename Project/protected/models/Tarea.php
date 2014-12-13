<?php

/**
 * This is the model class for table "tarea".
 *
 * The followings are the available columns in table 'tarea':
 * @property string $id_tarea
 * @property string $nombre_tarea
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property string $fecha_inicio
 * @property string $prioridad
 * @property string $estado
 * @property string $inamovible
 * @property string $id_actividad
 * @property string $id_usuario
 * @property string $id_tipo_tarea
 * @property string $diaria
 *
 * The followings are the available model relations:
 * @property RegistroTarea[] $registroTareas
 * @property TipoTarea $idTipoTarea
 * @property Actividad $idActividad
 * @property Usuario $idUsuario
 */
class Tarea extends CActiveRecord {

    const ESTADONUEVA = 'NUEVA';
    const ESTADOEJECUCION = 'EJECUCION';
    const ESTADOPAUSA = 'PAUSA';
    const ESTADOFINALIZADA = 'FINALIZADA';
    const PRIORIDADBAJA = 'BAJA';
    const PRIORIDADMEDIA = 'MEDIA';
    const PRIORIDADALTA = 'ALTA';
    const INAMOVIBLESI = 'SI';
    const INAMOVIBLENO = 'NO';
    const DIARIASI = 'SI';
    const DIARIANO = 'NO';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tarea';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre_tarea', 'required', 'on' => 'crearAjax',
                'message' => 'Debe ingresar el nombre de la Tarea.'),
            array('nombre_tarea, fecha_inicio, prioridad, estado, inamovible ', 'required',
                'on' => 'actualizarAjax', 'message' => 'El campo {attribute} no puede estar vacio.'),
            array('nombre_tarea, descripcion', 'match',
                'pattern' => '/^[a-zA-Z0-9[:space:]\süÜáéíóúÁÉÍÓÚñÑ,.()\'\"]*$/',
                'message' => 'El Nombre de la Tarea sólo puede contener letras, tildes, números y espacios.'),
            array('id_tarea, prioridad, estado, inamovible, id_actividad, id_usuario, id_tipo_tarea', 'length', 'max' => 10),
            array('nombre_tarea', 'length', 'max' => 100),
            array('descripcion', 'length', 'max' => 255),
            array('fecha_inicio', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_tarea, nombre_tarea, descripcion, fecha_creacion, fecha_inicio, prioridad, estado, inamovible, id_actividad, id_usuario, id_tipo_tarea', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'registroTareas' => array(self::HAS_MANY, 'RegistroTarea', 'id_tarea'),
            'idTipoTarea' => array(self::BELONGS_TO, 'TipoTarea', 'id_tipo_tarea'),
            'idActividad' => array(self::BELONGS_TO, 'Actividad', 'id_actividad'),
            'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_tarea' => 'Id Tarea',
            'nombre_tarea' => 'Nombre Tarea',
            'descripcion' => 'Descripcion Tarea',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_inicio' => 'Fecha Inicio',
            'prioridad' => 'Prioridad',
            'estado' => 'Estado',
            'inamovible' => 'Inamovible',
            'id_actividad' => 'Id Actividad',
            'id_usuario' => 'Id Usuario',
            'id_tipo_tarea' => 'Tipo Tarea',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria->compare('id_tarea', $this->id_tarea, true);
        $criteria->compare('nombre_tarea', $this->nombre_tarea, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_inicio', $this->fecha_inicio, true);
        $criteria->compare('prioridad', $this->prioridad, true);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('inamovible', $this->inamovible, true);
        $criteria->compare('id_actividad', $this->id_actividad, true);
        $criteria->compare('id_usuario', $this->id_usuario, true);
        $criteria->compare('id_tipo_tarea', $this->id_tipo_tarea, true);


        $criteria->compare('diaria', $this->diaria);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tarea the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Retornar la cantidad de tareas de una actividad.
     * @param type $fecha
     * @return type
     */
    public function progressBar($fecha) {
        return Actividad::model()->findByPk($this->id_actividad)->progressBar($fecha);
    }

    /**
     * Retornar una lista de tareas
     * @return type
     */
    public function listaTareas() {
        $connection = Yii::app()->db;
        $userId = Yii::app()->user->getId();
        $diariaNo = Tarea::DIARIANO;
        $sql = "SELECT CONCAT(CONVERT(COUNT(*), CHAR), ' Tareas') AS \"title\","
                . " DATE(fecha_inicio) AS \"start\", "
                . " DATE(fecha_inicio) AS \"end\" "
                . " FROM tarea "
                . " WHERE id_usuario = {$userId} "
                . " AND diaria = '{$diariaNo}'"
                . " GROUP BY DATE(fecha_inicio)";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

    public function cambiarADiaria($id, $fecha) {
        $this->FECHA_INICIO = $fecha;
        $this->diaria = Tarea::DIARIASI;
        $this->validate();
        return $this->save();
    }

    public function getDuracion() {
        $contador = 0;
        foreach ($this->registroTareas as $reg) {
            $contador += intval($reg->duracion);
        }
        return $contador;
    }

    public function fechaInicioFormatoPicker() {
        return Calendario::fechaFormatoPicker($this->fecha_inicio);
    }

    public function crearRegistroTarea() {
        $nuevoRegistroTarea = new RegistroTarea;
        $nuevoRegistroTarea->id_tarea = $this->id_tarea;
        if ($nuevoRegistroTarea->validate()) {
            $nuevoRegistroTarea->save();
            return RegistroTarea::model()->findByPk($nuevoRegistroTarea->id_registro_tarea);
        }
        return $nuevoRegistroTarea;
    }

    /* @var $ultimoRT RegistroTarea */
    /* @var $nuevoRT RegistroTarea */

    public function pausarRegistroTarea() {
        $arrRT = RegistroTarea::model()->findAllByAttributes(array('id_tarea' => $this->id_tarea));
        $numRT = count($arrRT);
        $ultimoRT = $arrRT[$numRT - 2];
        $nuevoRT = $arrRT[$numRT - 1];
        $fechaFinal = date_create($nuevoRT->fecha_inicio);
        $fechaInicial = date_create($ultimoRT->fecha_inicio);
        $diff = date_diff($fechaFinal, $fechaInicial, TRUE);
        //obtener los minutos entre la fecha
        $minutos = $diff->d * 24 * 60;
        $minutos += $diff->h * 60;
        $minutos += $diff->i;
        $ultimoRT->duracion = $minutos;
        $ultimoRT->save();
        return $ultimoRT;
    }

    public function eliminarTarea() {
        $idTarea = $this->id_tarea;
        $registroTarea = RegistroTarea::model()->findAll("id_tarea={$idTarea}");
        foreach ($registroTarea as $rt) {
            $rt->delete();
        }
        return $this->delete();
    }

}
