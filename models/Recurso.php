<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso".
 *
 * @property int $rec_id
 * @property string|null $rec_nombre
 * @property string|null $rec_resumen
 * @property int|null $rec_fktipo
 * @property int|null $rec_fknivel
 *
 * @property AutorRecurso[] $autorRecursos
 * @property Bitacora[] $bitacoras
 * @property Palabra[] $palabras
 * @property Nivel $recFknivel
 * @property Tipo $recFktipo
 * @property RecursoArchivo[] $recursoArchivos
 * @property RecursoCarrera[] $recursoCarreras
 */
class Recurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rec_nombre', 'rec_resumen'], 'string'],
            [['rec_fktipo', 'rec_fknivel'], 'integer'],
            [['rec_fktipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['rec_fktipo' => 'tip_id']],
            [['rec_fknivel'], 'exist', 'skipOnError' => true, 'targetClass' => Nivel::className(), 'targetAttribute' => ['rec_fknivel' => 'niv_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rec_id' => 'Rec ID',
            'rec_nombre' => 'Rec Nombre',
            'rec_resumen' => 'Rec Resumen',
            'rec_fktipo' => 'Rec Fktipo',
            'rec_fknivel' => 'Rec Fknivel',
        ];
    }

    /**
     * Gets query for [[AutorRecursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutorRecursos()
    {
        return $this->hasMany(AutorRecurso::className(), ['autrec_fkrecurso' => 'rec_id']);
    }

    /**
     * Gets query for [[Bitacoras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoras()
    {
        return $this->hasMany(Bitacora::className(), ['bit_fkrecurso' => 'rec_id']);
    }

    /**
     * Gets query for [[Palabras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPalabras()
    {
        return $this->hasMany(Palabra::className(), ['pal_fkrecurso' => 'rec_id']);
    }

    /**
     * Gets query for [[RecFknivel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecFknivel()
    {
        return $this->hasOne(Nivel::className(), ['niv_id' => 'rec_fknivel']);
    }

    /**
     * Gets query for [[RecFktipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecFktipo()
    {
        return $this->hasOne(Tipo::className(), ['tip_id' => 'rec_fktipo']);
    }

    /**
     * Gets query for [[RecursoArchivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursoArchivos()
    {
        return $this->hasMany(RecursoArchivo::className(), ['recarc_fkrecursos' => 'rec_id']);
    }

    /**
     * Gets query for [[RecursoCarreras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursoCarreras()
    {
        return $this->hasMany(RecursoCarrera::className(), ['reccar_fkrecurso' => 'rec_id']);
    }
}
