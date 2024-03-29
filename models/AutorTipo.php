<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "autor_tipo".
 *
 * @property int $auttip_id
 * @property string|null $auttip_nombre
 *
 * @property Autor[] $autors
 */
class AutorTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auttip_nombre'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'auttip_id'     => 'ID',
            'auttip_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Autors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutors()
    {
        return $this->hasMany(Autor::className(), ['aut_fkautortipo' => 'auttip_id']);
    }

    public static function map(){
        return ArrayHelper::map(AutorTipo::find()->all(), 'auttip_id', 'auttip_nombre');
    }
}
