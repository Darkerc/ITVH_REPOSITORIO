<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encargado".
 *
 * @property int $enc_id
 * @property string|null $enc_nombre
 * @property string|null $enc_apellidoMaterno
 * @property string|null $enc_apellidoPaterno
 * @property int|null $enc_fkdepartamento
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
            [['enc_nombre', 'enc_apellidoMaterno', 'enc_apellidoPaterno'], 'string'],
            [['enc_fkdepartamento'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enc_id'              => 'ID',
            'enc_nombre'          => 'Nombre',
            'enc_apellidoMaterno' => 'Apellido Materno',
            'enc_apellidoPaterno' => 'Apellido Paterno',
            'enc_fkdepartamento'  => 'Fkdepartamento',
        ];
    }
}
