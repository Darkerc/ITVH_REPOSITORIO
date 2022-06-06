<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso_archivo".
 *
 * @property int $recarc_id
 * @property int|null $recarc_fkarchivo
 * @property int|null $recarc_fkrecurso
 *
 * @property Archivo $recarcFkarchivo
 * @property Recurso $recarcFkrecurso
 */
class RecursoArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recurso_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recarc_fkarchivo', 'recarc_fkrecurso'], 'integer'],
            [['recarc_fkarchivo'], 'exist', 'skipOnError' => true, 'targetClass' => Archivo::className(), 'targetAttribute' => ['recarc_fkarchivo' => 'arc_id']],
            [['recarc_fkrecurso'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::className(), 'targetAttribute' => ['recarc_fkrecurso' => 'rec_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'recarc_id' => 'Recarc ID',
            'recarc_fkarchivo' => 'Recarc Fkarchivo',
            'recarc_fkrecurso' => 'Recarc Fkrecurso',
        ];
    }

    /**
     * Gets query for [[RecarcFkarchivo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecarcFkarchivo()
    {
        return $this->hasOne(Archivo::className(), ['arc_id' => 'recarc_fkarchivo']);
    }

    /**
     * Gets query for [[RecarcFkrecurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecarcFkrecurso()
    {
        return $this->hasOne(Recurso::className(), ['rec_id' => 'recarc_fkrecurso']);
    }
}
