<?php

/**
 * This is the model class for table "frecuencia_personalizada".
 *
 * The followings are the available columns in table 'frecuencia_personalizada':
 * @property integer $ID_FREC_PER
 * @property integer $ID_FRECUENCIA
 * @property string $DIA
 * @property string $HORA_INICIO
 * @property string $HORA_FIN
 */
class FrecuenciaPersonalizada extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'frecuencia_personalizada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_FREC_PER, ID_FRECUENCIA, DIA, HORA_INICIO, HORA_FIN', 'required'),
			array('ID_FREC_PER, ID_FRECUENCIA', 'numerical', 'integerOnly'=>true),
			array('DIA', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_FREC_PER, ID_FRECUENCIA, DIA, HORA_INICIO, HORA_FIN', 'safe', 'on'=>'search'),
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
			'ID_FREC_PER' => 'Id Frec Per',
			'ID_FRECUENCIA' => 'Id Frecuencia',
			'DIA' => 'Dia',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_FREC_PER',$this->ID_FREC_PER);
		$criteria->compare('ID_FRECUENCIA',$this->ID_FRECUENCIA);
		$criteria->compare('DIA',$this->DIA,true);
		$criteria->compare('HORA_INICIO',$this->HORA_INICIO,true);
		$criteria->compare('HORA_FIN',$this->HORA_FIN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FrecuenciaPersonalizada the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
