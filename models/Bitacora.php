<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bitacora".
 *
 * @property int $bit_id
 * @property string|null $bit_descripcion
 * @property int|null $bit_fkrecurso
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bitacora';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bit_descripcion'], 'string'],
            [['bit_fkrecurso'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bit_id'          => 'ID',
            'bit_descripcion' => 'Descripcion',
            'bit_fkrecurso'   => 'Fkrecurso',
        ];
    }
}
