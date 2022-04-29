<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor_tipo".
 *
 * @property int $autt_id
 * @property string|null $autt_nombre
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
            [['autt_nombre'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'autt_id' => 'Autt ID',
            'autt_nombre' => 'Autt Nombre',
        ];
    }
}
