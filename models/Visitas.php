<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visitas".
 *
 * @property int $vis_id
 */
class Visitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vis_id' => 'Vis ID',
        ];
    }

    public static function getCount() {
        return Visitas::find()->count();
    }

    public static function addVisit() {
        $visita = new Visitas();
        $visita->save();
    }
}
