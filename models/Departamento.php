<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "departamento".
 *
 * @property int $dep_id
 * @property string|null $dep_nombre
 *
 * @property Autor[] $autors
 * @property DepartamentoCarrera[] $departamentoCarreras
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dep_nombre'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dep_id'     => 'ID',
            'dep_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Autors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutors()
    {
        return $this->hasMany(Autor::className(), ['aut_fkdepartamento' => 'dep_id']);
    }

    public static function map(){
        return ArrayHelper::map(Departamento::find()->all(), 'dep_id', 'dep_nombre');
    }
}
