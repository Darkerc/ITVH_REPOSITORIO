<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archivo".
 *
 * @property int $arc_id
 * @property string|null $arc_nombre
 * @property string|null $arc_extencion
 * @property string|null $arc_nombreOri
 * @property int|null $arc_visitas
 * @property int|null $arc_descargas
 * @property string|null $arc_mimetype
 *
 * @property RecursoArchivo[] $recursoArchivos
 */
class Archivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['arc_nombre', 'arc_extencion', 'arc_nombreOri', 'arc_mimetype'], 'string'],
            [['arc_visitas', 'arc_descargas'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'arc_id' => 'Arc ID',
            'arc_nombre' => 'Arc Nombre',
            'arc_extencion' => 'Arc Extencion',
            'arc_nombreOri' => 'Arc Nombre Ori',
            'arc_visitas' => 'Arc Visitas',
            'arc_descargas' => 'Arc Descargas',
            'arc_mimetype' => 'Arc Mimetype',
        ];
    }

    /**
     * Gets query for [[RecursoArchivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursoArchivos()
    {
        return $this->hasMany(RecursoArchivo::className(), ['recarc_fkarchivo' => 'arc_id']);
    }
}
