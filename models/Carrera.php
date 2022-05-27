<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property int $car_id
 * @property string $car_nombre
 * @property int $car_fkdepartamento
 *
 * @property Autor[] $autors
 * @property Departamento $carFkdepartamento
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
            [['car_nombre', 'car_fkdepartamento'], 'required'],
            [['car_nombre'], 'string'],
            [['car_fkdepartamento'], 'integer'],
            [['car_fkdepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['car_fkdepartamento' => 'dep_id']],
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
            'car_fkdepartamento' => 'Car Fkdepartamento',
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
     * Gets query for [[CarFkdepartamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarFkdepartamento()
    {
        return $this->hasOne(Departamento::className(), ['dep_id' => 'car_fkdepartamento']);
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
