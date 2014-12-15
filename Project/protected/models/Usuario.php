<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $id_usuario
 * @property string $correo
 * @property string $nombres
 * @property string $apellidos
 * @property string $contrasena
 * @property integer $nivel_admin
 * @property string $fecha_registro
 *
 * The followings are the available model relations:
 * @property Categoria[] $categorias
 * @property Tarea[] $tareas
 */
class Usuario extends CActiveRecord {

    public $repetir_contrasena;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('correo, nombres, apellidos, contrasena, repetir_contrasena', 'required',
                'message' => 'El campo {attribute} no debe estar vacio.'),
            array('nivel_admin', 'numerical', 'integerOnly' => true),
            array('correo, nombres, apellidos', 'length', 'max' => 100),
            array('nombres, apellidos', 'match', 'pattern' => '/^[a-zA-Z0-9[:space:]\süÜáéíóúÁÉÍÓÚñÑ,.]*$/', 'message' => 'Este campo solo puede contener letras, tildes, números y espacios.'),
            array('contrasena, repetir_contrasena', 'match', 'pattern' => '/^[a-zA-Z0-9\süÜáéíóúÁÉÍÓÚñÑ,.]*$/', 'message' => 'La contraseña debe ser alfanumerica.'),
            array('contrasena, repetir_contrasena', 'length', 'min' => 6, 'max' => 16),
            array('contrasena', 'compare', 'compareAttribute' => 'repetir_contrasena'),
            array('correo', 'unique', 'className' => 'Usuario'),
            array('correo', 'email'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_usuario, correo, nombres, apellidos, contrasena, nivel_admin, fecha_registro', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'categorias' => array(self::HAS_MANY, 'Categoria', 'id_usuario'),
            'tareas' => array(self::HAS_MANY, 'Tarea', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_usuario' => 'Id Usuario',
            'correo' => 'Correo',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'contrasena' => 'Contraseña (mínimo 6 caracteres)',
            'repetir_contrasena' => 'Repetir Contraseña',
            'nivel_admin' => 'Nivel Admin',
            'fecha_registro' => 'Fecha Registro',
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

        $criteria->compare('id_usuario', $this->id_usuario, true);
        $criteria->compare('correo', $this->correo, true);
        $criteria->compare('nombres', $this->nombres, true);
        $criteria->compare('apellidos', $this->apellidos, true);
        $criteria->compare('contrasena', $this->contrasena, true);
        $criteria->compare('nivel_admin', $this->nivel_admin);
        $criteria->compare('fecha_registro', $this->fecha_registro, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function nombreUsuarioActual() {
        $nombre = "";
        $usuario = Usuario::model()->findByPk(Yii::app()->user->getId());
        if ($usuario !== NULL) {
            $nombre = $usuario->nombres;
        }
        return $nombre;
    }

}
