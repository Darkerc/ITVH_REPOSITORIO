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
            'arc_id'        => 'ID',
            'arc_nombre'    => 'Titulo',
            'arc_extencion' => 'Extencion',
            'arc_nombreOri' => 'Nombre Original',
            'arc_visitas'   => 'Visitas',
            'arc_descargas' => 'Descargas',
            'arc_mimetype'  => 'Mimetype',
        ];
    }
}
