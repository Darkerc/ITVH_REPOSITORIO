<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            'rectip_id'     => 'ID',
            'rectip_nombre' => 'Nombre',
            'rectip_multiple' => 'Multiple'
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

    public static function map(){
        return ArrayHelper::map(RecursoTipo::find()->all(), 'rectip_id', 'rectip_nombre');
    }
}
