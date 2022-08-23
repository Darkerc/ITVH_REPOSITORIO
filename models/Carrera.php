<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['car_nombre', 'car_fkdepartamento', 'car_fknivel'], 'required'],
            [['car_nombre'], 'string'],
            [['car_fkdepartamento', 'car_fknivel'], 'integer'],
            [['car_fkdepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['car_fkdepartamento' => 'dep_id']],
            [['car_fknivel'], 'exist', 'skipOnError' => true, 'targetClass' => Nivel::className(), 'targetAttribute' => ['car_fknivel' => 'niv_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id'             => 'ID',
            'car_nombre'         => 'Nombre',
            'car_fkdepartamento' => 'Departamento',
            'car_fknivel'        => 'Nivel'
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

    public static function map(){
        return ArrayHelper::map(Carrera::find()->all(), 'car_id', 'car_nombre');
    }

    public static function mapByNivel($niv_id){
        $data = ArrayHelper::map(Carrera::find()->where(['car_fknivel' => $niv_id])->all(), 'car_id', 'car_nombre');
        return $data;
    }

    public function getCarFknivel()
    {
        return $this->hasOne(Nivel::className(), ['niv_id' => 'car_fknivel']);
    }
}
