<?php

/**
 * This is the model class for table "tarea".
 *
 * The followings are the available columns in table 'tarea':
 * @property integer $ID_TAREA
 * @property integer $ID_FRECUENCIA
 * @property string $CORREO
 * @property integer $ID_ACTIVIDAD
 * @property string $NOMBRE_TAREA
 * @property string $FECHA_INICIO
 * @property string $FECHA_FIN
 * @property string $FECHA_ULTIMA_PAUSA
 * @property string $DURACION
 * @property integer $PRIORIDAD
 * @property integer $ESTADO
 * @property integer $INAMOVIBLE
 * @property string $HORA_INICIO
 * @property string $HORA_FIN
 */
class Tarea extends CActiveRecord {

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
            array('NOMBRE_TAREA', 'required',
                'on' => 'crearAjax',
                'message' => 'El campo {attribute} no puede estar vacio.'),
            array('NOMBRE_TAREA, FECHA_INICIO, FECHA_FIN, HORA_INICIO, HORA_FIN', 'required',
                'on' => 'actualizarAjax',
                'message' => 'El campo {attribute} no puede estar vacio.'),
            array('FECHA_INICIO', 'compare',
                'compareAttribute' => 'FECHA_FIN',
                'operator' => '<=',
                'on' => 'actualizarAjax',
                'message' => 'La fecha de Inicio debe ser menor a la fecha de Finalizacion.'),
            array('NOMBRE_TAREA', 'match',
                'pattern' => '/^[a-zA-Z0-9[:space:]\süÜáéíóúÁÉÍÓÚñÑ]*$/',
                'message' => 'Este campo solo puede contener letras, tildes, números y espacios.'),
            array('ID_FRECUENCIA, ID_ACTIVIDAD, PRIORIDAD, ESTADO, INAMOVIBLE', 'numerical', 'integerOnly' => true),
            array('CORREO, NOMBRE_TAREA', 'length', 'max' => 100),
            array('DURACION', 'length', 'max' => 5),
            array('FECHA_INICIO, FECHA_FIN, FECHA_ULTIMA_PAUSA, HORA_INICIO, HORA_FIN', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ID_TAREA, ID_FRECUENCIA, CORREO, ID_ACTIVIDAD, NOMBRE_TAREA, FECHA_INICIO, FECHA_FIN, FECHA_ULTIMA_PAUSA, DURACION, PRIORIDAD, ESTADO, INAMOVIBLE, HORA_INICIO, HORA_FIN', 'safe', 'on' => 'search'),
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
            'ID_TAREA' => 'Id Tarea',
            'ID_FRECUENCIA' => 'Id Frecuencia',
            'CORREO' => 'Correo',
            'ID_ACTIVIDAD' => 'Id Actividad',
            'NOMBRE_TAREA' => 'Nombre Tarea',
            'FECHA_INICIO' => 'Fecha Inicio (yyyy-mm-dd)',
            'FECHA_FIN' => 'Fecha Fin (yyyy-mm-dd)',
            'FECHA_ULTIMA_PAUSA' => 'Fecha Ultima Pausa',
            'DURACION' => 'Duracion',
            'PRIORIDAD' => 'Prioridad',
            'ESTADO' => 'Estado',
            'INAMOVIBLE' => 'Inamovible',
            'HORA_INICIO' => 'Hora Inicio',
            'HORA_FIN' => 'Hora Fin',
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

        $criteria->compare('ID_TAREA', $this->ID_TAREA);
        $criteria->compare('ID_FRECUENCIA', $this->ID_FRECUENCIA);
        $criteria->compare('CORREO', $this->CORREO, true);
        $criteria->compare('ID_ACTIVIDAD', $this->ID_ACTIVIDAD);
        $criteria->compare('NOMBRE_TAREA', $this->NOMBRE_TAREA, true);
        $criteria->compare('FECHA_INICIO', $this->FECHA_INICIO, true);
        $criteria->compare('FECHA_FIN', $this->FECHA_FIN, true);
        $criteria->compare('FECHA_ULTIMA_PAUSA', $this->FECHA_ULTIMA_PAUSA, true);
        $criteria->compare('DURACION', $this->DURACION, true);
        $criteria->compare('PRIORIDAD', $this->PRIORIDAD);
        $criteria->compare('ESTADO', $this->ESTADO);
        $criteria->compare('INAMOVIBLE', $this->INAMOVIBLE);
        $criteria->compare('HORA_INICIO', $this->HORA_INICIO, true);
        $criteria->compare('HORA_FIN', $this->HORA_FIN, true);

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

    public function progressBar() {
        return Actividad::model()->findByPk($this->ID_ACTIVIDAD)->progressBar();
    }

    public function listaTareas() {
        //$items[] = ;
        //$items[] = 
        $connection = Yii::app()->db;
        $sql = 'select distinct "" as "title", FECHA_INICIO as "start", FECHA_INICIO as "end"
                    from tarea
                    where ID_ACTIVIDAD is not null';
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
