<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor_recurso".
 *
 * @property int $autrec_id
 * @property int|null $autrec_fkrecurso
 * @property int|null $autrec_fkautor
 *
 * @property Autor $autrecFkautor
 * @property Recurso $autrecFkrecurso
 */
class AutorRecurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor_recurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autrec_fkrecurso', 'autrec_fkautor'], 'integer'],
            [['autrec_fkrecurso'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::className(), 'targetAttribute' => ['autrec_fkrecurso' => 'rec_id']],
            [['autrec_fkautor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autrec_fkautor' => 'aut_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'autrec_id' => 'Autrec ID',
            'autrec_fkrecurso' => 'Autrec Fkrecurso',
            'autrec_fkautor' => 'Autrec Fkautor',
        ];
    }

    /**
     * Gets query for [[AutrecFkautor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutrecFkautor()
    {
        return $this->hasOne(Autor::className(), ['aut_id' => 'autrec_fkautor']);
    }

    /**
     * Gets query for [[AutrecFkrecurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutrecFkrecurso()
    {
        return $this->hasOne(Recurso::className(), ['rec_id' => 'autrec_fkrecurso']);
    }

    public function getAutor()
    {
        return $this->autrecFkautor->aut_nombre;
    }
}
