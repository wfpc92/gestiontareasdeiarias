<?php

/**
 * This is the model class for table "calendario".
 *
 * The followings are the available columns in table 'calendario':
 * @property integer $id
 * @property integer $nombre
 */
class Calendario extends CActiveRecord {

    public static $fecha;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'calendario';
    }

    public static function getFechaFormatoHoy() {
        $dia = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $mes = array(null, "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $numdia = date_format(static::$fecha, "w"); //muestra el día de la semana
        $nummes = date_format(static::$fecha, "n");
        $diames = date_format(static::$fecha, "j"); //muestra el día del mes
        $anho = date_format(static::$fecha, "Y");
        return "$dia[$numdia], $diames de $mes[$nummes] del $anho";
    }

    public static function getFechaFormato() {
        if (static::$fecha == NULL) {
            return NULL;
        } else {
            return date_format(static::$fecha, "Y-m-d");
        }
    }

    public static function setFecha($f) {
        static::$fecha = $f;
    }

    public static function getFecha() {
        return static::$fecha;
    }

    public static function fechaFormatoPicker($fechaStr) {
        $fechaDate = date_create($fechaStr);
        return date_format($fechaDate, "Y-m-d");
    }

    public static function horaFormatoPicker($fechaStr) {
        $fechaDate = date_create($fechaStr);
        return date_format($fechaDate, "h:i A");
    }

    public static function horaFormatoDate($fechaStr) {
        $fechaDate = date_create($fechaStr);
        return array(
            'anio' => date_format($fechaDate, "Y"),
            'mes' => date_format($fechaDate, "m"),
            'dia' => date_format($fechaDate, "d"),
            'horas' => date_format($fechaDate, "H"),
            'minutos' => date_format($fechaDate, "i"),
            'segundos' => date_format($fechaDate, "s"),
        );
    }

    public static function fechaHoraFormatoSQL($fecha, $hora) {
        $fechaDate = date_create_from_format("Y-m-d h:i A", $fecha . " " . $hora);
        if ($fechaDate != false) {
            return date_format($fechaDate, "Y-m-d H:i:s");
        }
        return NULL;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre', 'required'),
            array('nombre', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombre', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nombre' => 'Nombre',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Calendario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
