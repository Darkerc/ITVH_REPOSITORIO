<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso_archivo".
 *
 * @property int $recarc_id
 * @property int|null $recarc_fkarchivo
 * @property int|null $recarc_fkrecurso
 * @property int|null $visitas
 * @property int|null $descargas
 *
 * @property Archivo $recarcFkarchivo
 * @property Recurso $recarcFkrecurso
 */
class RecursoArchivo extends \yii\db\ActiveRecord
{
    public $visitas;
    public $descargas;
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

    public static function getMostVisits()
    {
        $data = RecursoArchivo::find()
            ->select(["recarc_fkrecurso ,sum( `archivo`.`arc_visitas` ) AS `visitas`"])
            ->join('INNER JOIN', 'archivo', "`recurso_archivo`.`recarc_fkarchivo` = `archivo`.`arc_id`")
            ->join('INNER JOIN', 'recurso', "`recurso_archivo`.`recarc_fkrecurso` = `recurso`.`rec_id`")
            ->groupBy(['recarc_fkrecurso'])
            ->orderBy([
                'visitas' => SORT_DESC,
            ])
            ->limit(5)
            ->all();

        return $data;
    }

    public static function getMostDownloaded()
    {
        $data = RecursoArchivo::find()
            ->select(["recarc_fkrecurso, sum( `archivo`.`arc_descargas` ) AS `descargas`"])
            ->join('INNER JOIN', 'archivo', "`recurso_archivo`.`recarc_fkarchivo` = `archivo`.`arc_id`")
            ->join('INNER JOIN', 'recurso', "`recurso_archivo`.`recarc_fkrecurso` = `recurso`.`rec_id`")
            ->groupBy(['recarc_fkrecurso'])
            ->orderBy([
                'descargas' => SORT_DESC,
            ])
            ->limit(5)
            ->all();

        return $data;
    }
}
