<?php

/**
 * This is the model class for table "actividad".
 *
 * The followings are the available columns in table 'actividad':
 * @property integer $ID_ACTIVIDAD
 * @property string $CORREO
 * @property integer $ID_CATEGORIA
 * @property string $NOMBRE_ACTIVIDAD
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
            array('NOMBRE_ACTIVIDAD', 'required',
                'message' => 'Este campo no puede estar vacio.'),
            array('NOMBRE_ACTIVIDAD', 'match',
                'pattern' => '/^[a-zA-Z0-9[:space:]\süÜáéíóúÁÉÍÓÚñÑ]*$/',
                'message' => 'Este campo solo puede contener letras, tildes, números y espacios.'),
            array('ID_CATEGORIA', 'numerical', 'integerOnly' => true),
            array('CORREO, NOMBRE_ACTIVIDAD', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ID_ACTIVIDAD, CORREO, ID_CATEGORIA, NOMBRE_ACTIVIDAD', 'safe', 'on' => 'search'),
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
            'ID_ACTIVIDAD' => 'Id Actividad',
            'CORREO' => 'Correo',
            'ID_CATEGORIA' => 'Id Categoria',
            'NOMBRE_ACTIVIDAD' => 'Nombre Actividad',
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

        $criteria->compare('ID_ACTIVIDAD', $this->ID_ACTIVIDAD);
        $criteria->compare('CORREO', $this->CORREO, true);
        $criteria->compare('ID_CATEGORIA', $this->ID_CATEGORIA);
        $criteria->compare('NOMBRE_ACTIVIDAD', $this->NOMBRE_ACTIVIDAD, true);

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

    public function progressBar() {
        $idActividad = $this->ID_ACTIVIDAD;
        $criteria = new CDbCriteria;
        $criteria2 = new CDbCriteria;

        $criteria->compare('ID_ACTIVIDAD', $idActividad, true);
        $dataProvider = new CActiveDataProvider('Tarea', array(
            'pagination' => false,
            'criteria' => $criteria
        ));

        $criteria2->compare('ID_ACTIVIDAD', $idActividad, true);
        $criteria2->compare('ESTADO', 1, true);
        $dataProvider2 = new CActiveDataProvider('Tarea', array(
            'pagination' => false,
            'criteria' => $criteria2
        ));

        $numTT = $dataProvider2->getItemCount();
        $numTTot = $dataProvider->getItemCount();
        return array(
            'numTT' => $numTT,
            'numTTot' => $numTTot
        );
    }

}
