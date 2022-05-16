<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "palabra".
 *
 * @property int $pal_id
 * @property string|null $pal_nombre
 * @property int|null $pal_fkrecurso
 */
class Palabra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'palabra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pal_nombre'], 'string'],
            [['pal_fkrecurso'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pal_id'        => 'ID',
            'pal_nombre'    => 'Palabra Clave',
            'pal_fkrecurso' => 'Pal Fkrecurso',
        ];
    }
}
