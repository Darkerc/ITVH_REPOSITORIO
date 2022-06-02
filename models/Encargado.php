<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encargado".
 *
 * @property int $enc_id
 * @property string|null $enc_nombre
 * @property string|null $enc_paterno
 * @property string|null $enc_materno
 * @property int|null $enc_fkdepartamento
 *
 * @property Autor[] $autors
 */
class Encargado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encargado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enc_nombre', 'enc_paterno', 'enc_materno'], 'string'],
            [['enc_fkdepartamento'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enc_id'             => 'ID',
            'enc_nombre'         => 'Nombre',
            'enc_paterno'        => 'Apellido Paterno',
            'enc_materno'        => 'Apellido Materno',
            'enc_fkdepartamento' => 'Departamento',
        ];
    }

    /**
     * Gets query for [[Autors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutors()
    {
        return $this->hasMany(Autor::className(), ['aut_fkencargado' => 'enc_id']);
    }
}
