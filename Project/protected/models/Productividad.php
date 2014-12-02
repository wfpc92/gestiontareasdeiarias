<?php

/**
 * This is the model class for table "productividad".
 *
 * The followings are the available columns in table 'productividad':
 * @property string $id_productividad
 * @property string $fecha_productividad
 * @property string $productividad
 * @property string $id_usuario
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario
 */
class Productividad extends CActiveRecord {

    const ALTA = "ALTA";
    const MEDIA = "MEDIA";
    const BAJA = "BAJA";

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'productividad';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha_productividad, productividad, id_usuario', 'required'),
            array('productividad, id_usuario', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_productividad, fecha_productividad, productividad, id_usuario', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_productividad' => 'Id Productividad',
            'fecha_productividad' => 'Fecha Productividad',
            'productividad' => 'Productividad',
            'id_usuario' => 'Id Usuario',
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

        $criteria->compare('id_productividad', $this->id_productividad, true);
        $criteria->compare('fecha_productividad', $this->fecha_productividad, true);
        $criteria->compare('productividad', $this->productividad, true);
        $criteria->compare('id_usuario', $this->id_usuario, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Productividad the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
