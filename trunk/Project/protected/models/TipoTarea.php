<?php

/**
 * This is the model class for table "tipo_tarea".
 *
 * The followings are the available columns in table 'tipo_tarea':
 * @property string $id_tipo_tarea
 * @property string $nombre
 * @property string $id_usuario
 *
 * The followings are the available model relations:
 * @property Tarea[] $tareas
 * @property Usuario $idUsuario
 */
class TipoTarea extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tipo_tarea';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, id_usuario', 'required'),
            array('nombre', 'length', 'max' => 45),
            array('id_usuario', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_tipo_tarea, nombre, id_usuario', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tareas' => array(self::HAS_MANY, 'Tarea', 'id_tipo_tarea'),
            'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_tipo_tarea' => 'Id Tipo Tarea',
            'nombre' => 'Nombre',
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

        $criteria->compare('id_tipo_tarea', $this->id_tipo_tarea, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('id_usuario', $this->id_usuario, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TipoTarea the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function todosTipoTareas() {
        /* $connection = Yii::app()->db;
          $idUsuario = Yii::app()->user->getId();
          $sql = "select distinct tt.nombre nombre_tipo_tarea from tarea ta, tipo_tarea tt "
          . "where ta.id_usuario = {$idUsuario} and ta.id_tipo_tarea = tt.id_tipo_tarea";
          $command = $connection->createCommand($sql);
          $dataReader = $command->query();
          $rows = $dataReader->readAll();
          $nombre_tipo_tarea = array();
          $nombre_tipo_tarea[] = "Seleccione un tipo de tarea...";
          foreach ($rows as $tipo_tarea) {
          $nombre_tipo_tarea[$tipo_tarea["nombre_tipo_tarea"]] = $tipo_tarea["nombre_tipo_tarea"];
          }
          return $nombre_tipo_tarea; */
        return array(
            NULL => "Seleccione un tipo de tarea...",
            0 => 'docencia',
            1 => 'investigacion',
            2 => 'gestion',
            3 => 'servicios');
    }

    public function nombreTipoTarea($idTipoTarea) {
        $modelo = TipoTarea::model()->findByPk($idTipoTarea);
        if ($modelo != NULL) {
            return $modelo->nombre;
        }
        return NULL;
    }

}
