<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "palabra".
 *
 * @property int $pal_id
 * @property string|null $pal_nombre
 * @property int|null $pal_fkrecurso
 * @property int|null $count
 *
 * @property Recurso $palFkrecurso
 */
class Palabra extends \yii\db\ActiveRecord
{
    public $count;
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
            'pal_id'        => 'ID',
            'pal_nombre'    => 'Nombre',
            'pal_fkrecurso' => 'Recurso',
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

    public static function getPalabrasCounted()
    {
        $data = Palabra::find()
            ->select(['COUNT(palabra.pal_id) AS count, palabra.pal_nombre'])
            ->groupBy(['pal_nombre'])
            ->orderBy([
                'count' => SORT_DESC,
            ])
            ->all();

        return $data;
    }

    public static function map($ids){
        return ArrayHelper::map(Palabra::find()->where(['in', 'pal_id', $ids])->all(), 'pal_id', 'pal_nombre');
    }

    public static function mapcount(){
        return ArrayHelper::map(Palabra::getPalabrasCounted(), 'pal_nombre', 'pal_nombre');
    }
}
