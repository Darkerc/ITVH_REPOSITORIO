<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso_carrera".
 *
 * @property int $reccar_id
 * @property int|null $reccar_fkrecurso
 * @property int|null $reccar_fkcarrera
 *
 * @property Carrera $reccarFkcarrera
 * @property Recurso $reccarFkrecurso
 * @property int|null $count
 * @property string|null $carrer
 */
class RecursoCarrera extends \yii\db\ActiveRecord
{
    public $count;
    public $carrer;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recurso_carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reccar_fkrecurso', 'reccar_fkcarrera'], 'integer'],
            [['reccar_fkrecurso'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::className(), 'targetAttribute' => ['reccar_fkrecurso' => 'rec_id']],
            [['reccar_fkcarrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['reccar_fkcarrera' => 'car_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reccar_id' => 'Reccar ID',
            'reccar_fkrecurso' => 'Reccar Fkrecurso',
            'reccar_fkcarrera' => 'Reccar Fkcarrera',
        ];
    }

    /**
     * Gets query for [[ReccarFkcarrera]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReccarFkcarrera()
    {
        return $this->hasOne(Carrera::className(), ['car_id' => 'reccar_fkcarrera']);
    }

    /**
     * Gets query for [[ReccarFkrecurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReccarFkrecurso()
    {
        return $this->hasOne(Recurso::className(), ['rec_id' => 'reccar_fkrecurso']);
    }

    public function getCarrera()
    {
        return $this->reccarFkcarrera->car_nombre;
    }

    public function getRecurso()
    {
        return $this->reccarFkrecurso->rec_nombre;
    }

    public static function getCareersCount()
    {
        $data = RecursoCarrera::find()
            ->select(['carrera.car_nombre AS carrer, count(recurso_carrera.reccar_fkcarrera) AS count'])
            ->join('INNER JOIN', 'carrera', 'recurso_carrera.reccar_fkcarrera = carrera.car_id')
            ->groupBy(['reccar_fkcarrera'])
            ->orderBy([
                'count' => SORT_DESC,
            ])
            ->limit(10)
            ->all();

        return $data;
    }
}
