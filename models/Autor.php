<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "autor".
 *
 * @property int $aut_id
 * @property string|null $aut_nombre
 * @property string|null $aut_paterno
 * @property string|null $aut_materno
 * @property string|null $aut_correo
 * @property int|null $aut_semestre
 * @property int|null $aut_fkcarrera
 * @property int|null $aut_fkautortipo
 * @property int|null $aut_fkdepartamento
 * @property int|null $aut_fkuser
 *
 * @property AutorTipo $autFkautortipo
 * @property Carrera $autFkcarrera
 * @property Departamento $autFkdepartamento
 * @property User $autFkuser
 * @property AutorRecurso[] $autorRecursos
 */
class Autor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aut_nombre', 'aut_paterno', 'aut_materno', 'aut_correo'], 'string'],
            [['aut_semestre', 'aut_fkcarrera', 'aut_fkautortipo', 'aut_fkdepartamento', 'aut_fkuser'], 'integer'],
            [['aut_fkcarrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['aut_fkcarrera' => 'car_id']],
            [['aut_fkautortipo'], 'exist', 'skipOnError' => true, 'targetClass' => AutorTipo::className(), 'targetAttribute' => ['aut_fkautortipo' => 'auttip_id']],
            [['aut_fkdepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['aut_fkdepartamento' => 'dep_id']],
            [['aut_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['aut_fkuser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aut_id'             => 'ID',
            'aut_nombre'         => 'Nombre',
            'aut_paterno'        => 'Apellido Paterno',
            'aut_materno'        => 'Apellido Materno',
            'aut_correo'         => 'Correo',
            'aut_semestre'       => 'Semestre',
            'aut_fkcarrera'      => 'Carrera',
            'aut_fkautortipo'    => 'Autor Tipo',
            'aut_fkdepartamento' => 'Departamento',
            'aut_fkuser'         => 'User',
        ];
    }

    /**
     * Gets query for [[AutFkautortipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFkautortipo()
    {
        return $this->hasOne(AutorTipo::className(), ['auttip_id' => 'aut_fkautortipo']);
    }

    /**
     * Gets query for [[AutFkcarrera]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFkcarrera()
    {
        return $this->hasOne(Carrera::className(), ['car_id' => 'aut_fkcarrera']);
    }

    /**
     * Gets query for [[AutFkdepartamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFkdepartamento()
    {
        return $this->hasOne(Departamento::className(), ['dep_id' => 'aut_fkdepartamento']);
    }

    /**
     * Gets query for [[AutFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFkuser()
    {
        return $this->hasOne(User::className(), ['id' => 'aut_fkuser']);
    }

    /**
     * Gets query for [[AutorRecursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutorRecursos()
    {
        return $this->hasMany(AutorRecurso::className(), ['autrec_fkautor' => 'aut_id']);
    }

    public static function map(){
        return ArrayHelper::map(Autor::find()->all(), 'aut_id', 'aut_nombre');
    }

    public static function autorId(){
        return self::find()->where(['aut_fkuser' => Yii::$app->user->identity->id])->one()->aut_id;
    }

    // Devuelve true si el autor es un alumno o si el recurso solamente cuenta solamente con un solo autor
    public static function isAllowedToEdit($user_id, $rec_id) {
        $autor = Autor::findOne(['aut_fkuser' => $user_id]);
        $recurso = Recurso::findOne(['rec_id' => $rec_id]);
        if(is_null($autor) || is_null($recurso)) return false;

        $autoresIds = array_map(fn($ar) => $ar->autrec_fkautor, $recurso->autorRecursos);
        if (!in_array($autor->aut_id, $autoresIds)) return false;
        
        if ($autor->aut_fkautortipo == 1) return false;
        return true;
    }
}
