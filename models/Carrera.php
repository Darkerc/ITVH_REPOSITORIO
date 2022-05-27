<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property int $car_id
 * @property string|null $car_nombre
 *
 * @property Autor[] $autors
 * @property DepartamentoCarrera[] $departamentoCarreras
 * @property RecursoCarrera[] $recursoCarreras
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_nombre'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id' => 'Car ID',
            'car_nombre' => 'Car Nombre',
        ];
    }

    /**
     * Gets query for [[Autors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutors()
    {
        return $this->hasMany(Autor::className(), ['aut_fkcarrera' => 'car_id']);
    }

    /**
     * Gets query for [[DepartamentoCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentoCarreras()
    {
        return $this->hasMany(DepartamentoCarrera::className(), ['depcar_fkcarrera' => 'car_id']);
    }

    /**
     * Gets query for [[RecursoCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursoCarreras()
    {
        return $this->hasMany(RecursoCarrera::className(), ['reccar_fkcarrera' => 'car_id']);
    }
}
