<?php

/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property string $id_categoria
 * @property string $nombre_categoria
 * @property string $fecha_creacion
 * @property string $id_usuario
 *
 * The followings are the available model relations:
 * @property Actividad[] $actividads
 * @property Usuario $idUsuario
 */
class Categoria extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'categoria';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre_categoria', 'required', 'message' => 'Debe ingresar el nombre de la Categoría.'),
            array('nombre_categoria', 'match', 'pattern' => '/^[a-zA-Z0-9[:space:]\süÜáéíóúÁÉÍÓÚñÑ,.]*$/', 'message' => 'El nombre de la Categoría solo pude contener letras, tildes, números y espacios.'),
            array('nombre_categoria', 'length', 'max' => 100),
            array('id_usuario', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_categoria, nombre_categoria, fecha_creacion, id_usuario', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'actividads' => array(self::HAS_MANY, 'Actividad', 'id_categoria'),
            'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_categoria' => 'Id Categoria',
            'nombre_categoria' => 'Nombre Categoria',
            'fecha_creacion' => 'Fecha Creacion',
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

        $criteria->compare('id_categoria', $this->id_categoria, true);
        $criteria->compare('nombre_categoria', $this->nombre_categoria, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('id_usuario', $this->id_usuario, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Categoria the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Eliminar esta categoria y todas las actividades asociadas.
     * @return type
     */
    public function eliminarCategoria() {
        $idCategoria = $this->id_categoria;
        $actividades = Actividad::model()->findAll("id_categoria={$idCategoria}");
        if ($actividades !== NULL) {
            foreach ($actividades as $actividad) {
                $actividad->eliminarActividad();
            }
        }
        return $this->delete();
    }

}
