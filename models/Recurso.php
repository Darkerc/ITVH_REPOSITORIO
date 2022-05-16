<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso".
 *
 * @property int $rec_id
 * @property string|null $rec_nombre
 * @property string|null $rec_resumen
 * @property int|null $rec_fktipo
 * @property int|null $rec_fknivel
 */
class Recurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rec_nombre', 'rec_resumen'], 'string'],
            [['rec_fktipo', 'rec_fknivel'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rec_id'      => 'ID',
            'rec_nombre'  => 'Nombre',
            'rec_resumen' => 'Resumen',
            'rec_fktipo'  => 'Fktipo',
            'rec_fknivel' => 'Fknivel',
        ];
    }
}
