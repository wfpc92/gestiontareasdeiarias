<?php

/**
 * This is the model class for table "actividad".
 *
 * The followings are the available columns in table 'actividad':
 * @property string $id_actividad
 * @property string $nombre_actividad
 * @property string $id_categoria
 * @property string $fecha_creacion
 *
 * The followings are the available model relations:
 * @property Categoria $idCategoria
 * @property Tarea[] $tareas
 */
class Actividad extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'actividad';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre_actividad', 'required', 'message' => 'Este campo no puede estar vacio.'),
            array('nombre_actividad', 'match', 'pattern' => '/^[a-zA-Z0-9[:space:]\süÜáéíóúÁÉÍÓÚñÑ]*$/',
                'message' => 'Este campo solo puede contener letras, tildes, números y espacios.'),
            array('nombre_actividad', 'length', 'max' => 100),
            array('id_categoria', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_actividad, nombre_actividad, id_categoria, fecha_creacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
            'tareas' => array(self::HAS_MANY, 'Tarea', 'id_actividad'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_actividad' => 'Id Actividad',
            'nombre_actividad' => 'Nombre Actividad',
            'id_categoria' => 'Id Categoria',
            'fecha_creacion' => 'Fecha Creacion',
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

        $criteria->compare('id_actividad', $this->id_actividad, true);
        $criteria->compare('nombre_actividad', $this->nombre_actividad, true);
        $criteria->compare('id_categoria', $this->id_categoria, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Actividad the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Eliminar esta actividad y las tareas asociadas.
     * @return type
     */
    public function eliminarActividad() {
        $idActividad = $this->id_actividad;
        $tareas = Tarea::model()->findAll("id_actividad={$idActividad}");
        foreach ($tareas as $tarea) {
            $tarea->delete();
        }
        return $this->delete();
    }

    /**
     * Busca en la base de datos el numero de tareas y retorna la cantidad de tareas
     * en esta actividad.
     * @param type $fecha
     * @return type
     */
    public function progressBar($fecha) {
        $idActividad = $this->id_actividad;

        $criteria = new CDbCriteria;
        $criteria2 = new CDbCriteria;

        if ($fecha == NULL) {
            $criteria->compare('id_actividad', $idActividad, true);
            $dataProvider = new CActiveDataProvider('Tarea', array(
                'pagination' => false,
                'criteria' => $criteria
            ));

            $criteria2->compare('id_actividad', $idActividad, true);
            $criteria2->compare('estado', Tarea::ESTADOFINALIZADA, true);
            $dataProvider2 = new CActiveDataProvider('Tarea', array(
                'pagination' => false,
                'criteria' => $criteria2
            ));
        } else {
            $criteria->compare('fecha_inicio', $fecha, true);
            $dataProvider = new CActiveDataProvider('Tarea', array(
                'pagination' => false,
                'criteria' => $criteria
            ));

            $criteria2->compare('fecha_inicio', $fecha, true);
            $criteria2->compare('estado', Tarea::ESTADOFINALIZADA, true);
            $dataProvider2 = new CActiveDataProvider('Tarea', array(
                'pagination' => false,
                'criteria' => $criteria2
            ));
        }

        $numTT = $dataProvider2->getItemCount();
        $numTTot = $dataProvider->getItemCount();
        return array(
            'numTT' => $numTT,
            'numTTot' => $numTTot
        );
    }

}
