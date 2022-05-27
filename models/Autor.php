<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property int $aut_id
 * @property string|null $aut_nombre
 * @property string|null $aut_paterno
 * @property string|null $aut_marterno
 * @property string|null $aut_correo
 * @property int|null $aut_semestre
 * @property int|null $aut_fkcarrera
 * @property int|null $aut_fktipo
 * @property int|null $aut_fkdepartamento
 * @property int|null $aut_fkencargado
 * @property int|null $aut_fkuser
 *
 * @property Carrera $autFkcarrera
 * @property Departamento $autFkdepartamento
 * @property Encargado $autFkencargado
 * @property AutorTipo $autFktipo
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
            [['aut_nombre', 'aut_paterno', 'aut_marterno', 'aut_correo'], 'string'],
            [['aut_semestre', 'aut_fkcarrera', 'aut_fktipo', 'aut_fkdepartamento', 'aut_fkencargado', 'aut_fkuser'], 'integer'],
            [['aut_fkcarrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['aut_fkcarrera' => 'car_id']],
            [['aut_fktipo'], 'exist', 'skipOnError' => true, 'targetClass' => AutorTipo::className(), 'targetAttribute' => ['aut_fktipo' => 'auttip_id']],
            [['aut_fkdepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['aut_fkdepartamento' => 'dep_id']],
            [['aut_fkencargado'], 'exist', 'skipOnError' => true, 'targetClass' => Encargado::className(), 'targetAttribute' => ['aut_fkencargado' => 'enc_id']],
            [['aut_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['aut_fkuser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aut_id' => 'Aut ID',
            'aut_nombre' => 'Aut Nombre',
            'aut_paterno' => 'Aut Paterno',
            'aut_marterno' => 'Aut Marterno',
            'aut_correo' => 'Aut Correo',
            'aut_semestre' => 'Aut Semestre',
            'aut_fkcarrera' => 'Aut Fkcarrera',
            'aut_fktipo' => 'Aut Fktipo',
            'aut_fkdepartamento' => 'Aut Fkdepartamento',
            'aut_fkencargado' => 'Aut Fkencargado',
            'aut_fkuser' => 'Aut Fkuser',
        ];
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
     * Gets query for [[AutFkencargado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFkencargado()
    {
        return $this->hasOne(Encargado::className(), ['enc_id' => 'aut_fkencargado']);
    }

    /**
     * Gets query for [[AutFktipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutFktipo()
    {
        return $this->hasOne(AutorTipo::className(), ['auttip_id' => 'aut_fktipo']);
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
}
