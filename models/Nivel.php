<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "nivel".
 *
 * @property int $niv_id
 * @property string|null $niv_nombre
 *
 * @property Recurso[] $recursos
 */
class Nivel extends \yii\db\ActiveRecord
{
    const LICENCIATURA = 1;
    const POSGRADO     = 2;    
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nivel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['niv_nombre'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'niv_id'     => 'ID',
            'niv_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Recursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursos()
    {
        return $this->hasMany(Recurso::className(), ['rec_fknivel' => 'niv_id']);
    }

    public function getCarreras()
    {
        return $this->hasMany(Carrera::className(), ['car_fknivel' => 'niv_id']);
    }
    
    public static function map(){
        return ArrayHelper::map(Nivel::find()->all(), 'niv_id', 'niv_nombre');
    }
}
