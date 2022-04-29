<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property int $aut_id
 * @property string|null $aut_nombre
 * @property string|null $aut_apellidoMaterno
 * @property string|null $aut_apellidoPaterno
 * @property string|null $aut_correo
 * @property int|null $aut_semestre
 * @property int|null $aut_fkcarrera
 * @property int|null $aut_fktipo
 * @property int|null $aut_fkdepartamento
 * @property int|null $aut_fkencargado
 * @property int|null $aut_fkuser
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
            [['aut_nombre', 'aut_apellidoMaterno', 'aut_apellidoPaterno', 'aut_correo'], 'string'],
            [['aut_semestre', 'aut_fkcarrera', 'aut_fktipo', 'aut_fkdepartamento', 'aut_fkencargado', 'aut_fkuser'], 'integer'],
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
            'aut_apellidoMaterno' => 'Aut Apellido Materno',
            'aut_apellidoPaterno' => 'Aut Apellido Paterno',
            'aut_correo' => 'Aut Correo',
            'aut_semestre' => 'Aut Semestre',
            'aut_fkcarrera' => 'Aut Fkcarrera',
            'aut_fktipo' => 'Aut Fktipo',
            'aut_fkdepartamento' => 'Aut Fkdepartamento',
            'aut_fkencargado' => 'Aut Fkencargado',
            'aut_fkuser' => 'Aut Fkuser',
        ];
    }
}
