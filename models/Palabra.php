<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "palabra".
 *
 * @property int $pal_id
 * @property string|null $pal_nombre
 * @property int|null $pal_fkrecurso
 *
 * @property Recurso $palFkrecurso
 */
class Palabra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'palabra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pal_nombre'], 'string'],
            [['pal_fkrecurso'], 'integer'],
            [['pal_fkrecurso'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::className(), 'targetAttribute' => ['pal_fkrecurso' => 'rec_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pal_id' => 'Pal ID',
            'pal_nombre' => 'Pal Nombre',
            'pal_fkrecurso' => 'Pal Fkrecurso',
        ];
    }

    /**
     * Gets query for [[PalFkrecurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPalFkrecurso()
    {
        return $this->hasOne(Recurso::className(), ['rec_id' => 'pal_fkrecurso']);
    }
}
