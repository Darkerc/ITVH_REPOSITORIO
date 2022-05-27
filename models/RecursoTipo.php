<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso_tipo".
 *
 * @property int $rectip_id
 * @property string|null $rectip_nombre
 *
 * @property Recurso[] $recursos
 */
class RecursoTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recurso_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rectip_nombre'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rectip_id' => 'Rectip ID',
            'rectip_nombre' => 'Rectip Nombre',
        ];
    }

    /**
     * Gets query for [[Recursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursos()
    {
        return $this->hasMany(Recurso::className(), ['rec_fkrecursotipo' => 'rectip_id']);
    }
}
