<?php

/**
 * This is the model class for table "actividad".
 *
 * The followings are the available columns in table 'actividad':
 * @property integer $ID_ACTIVIDAD
 * @property string $CORREO
 * @property integer $ID_CATEGORIA
 * @property string $NOMBRE_ACTIVIDAD
 * @property string $DESCRIPCION_ACTIVIDAD
 */
class Actividad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CORREO, ID_CATEGORIA', 'required'),
			array('ID_CATEGORIA', 'numerical', 'integerOnly'=>true),
			array('CORREO, NOMBRE_ACTIVIDAD', 'length', 'max'=>100),
			array('DESCRIPCION_ACTIVIDAD', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ACTIVIDAD, CORREO, ID_CATEGORIA, NOMBRE_ACTIVIDAD, DESCRIPCION_ACTIVIDAD', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ACTIVIDAD' => 'Id Actividad',
			'CORREO' => 'Correo',
			'ID_CATEGORIA' => 'Id Categoria',
			'NOMBRE_ACTIVIDAD' => 'Nombre Actividad',
			'DESCRIPCION_ACTIVIDAD' => 'Descripcion Actividad',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_ACTIVIDAD',$this->ID_ACTIVIDAD);
		$criteria->compare('CORREO',$this->CORREO,true);
		$criteria->compare('ID_CATEGORIA',$this->ID_CATEGORIA);
		$criteria->compare('NOMBRE_ACTIVIDAD',$this->NOMBRE_ACTIVIDAD,true);
		$criteria->compare('DESCRIPCION_ACTIVIDAD',$this->DESCRIPCION_ACTIVIDAD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Actividad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
