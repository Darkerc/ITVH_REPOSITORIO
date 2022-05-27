<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo".
 *
 * @property int $tip_id
 * @property string|null $tip_nombre
 *
 * @property Recurso[] $recursos
 */
class Tipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_nombre'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tip_id' => 'Tip ID',
            'tip_nombre' => 'Tip Nombre',
        ];
    }

    /**
     * Gets query for [[Recursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursos()
    {
        return $this->hasMany(Recurso::className(), ['rec_fktipo' => 'tip_id']);
    }
}
