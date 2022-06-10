<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso".
 *
 * @property int $rec_id
 * @property string $rec_nombre
 * @property string $rec_resumen
 * @property string $rec_registro
 * @property string $rec_descripcion
 * @property int $rec_fkrecursotipo
 * @property int $rec_fknivel
 *
 * @property AutorRecurso[] $autorRecursos
 * @property Bitacora[] $bitacoras
 * @property Palabra[] $palabras
 * @property Nivel $recFknivel
 * @property RecursoTipo $recFkrecursotipo
 * @property RecursoArchivo[] $recursoArchivos
 * @property RecursoCarrera[] $recursoCarreras
 */
class Recurso extends \yii\db\ActiveRecord
{
    public $recursoCarrera;
    public $palabras;
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
            [['rec_nombre', 'rec_resumen', 'rec_registro', 'rec_descripcion', 'rec_fkrecursotipo', 'rec_fknivel'], 'required'],
            [['rec_nombre', 'rec_resumen', 'rec_descripcion'], 'string'],
            [['rec_registro', 'recursoCarrera', 'palabras'], 'safe'],
            [['rec_fkrecursotipo', 'rec_fknivel'], 'integer'],
            [['rec_fknivel'], 'exist', 'skipOnError' => true, 'targetClass' => Nivel::className(), 'targetAttribute' => ['rec_fknivel' => 'niv_id']],
            [['rec_fkrecursotipo'], 'exist', 'skipOnError' => true, 'targetClass' => RecursoTipo::className(), 'targetAttribute' => ['rec_fkrecursotipo' => 'rectip_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rec_id'            => 'ID',
            'rec_nombre'        => 'Título',
            'rec_resumen'       => 'Resumen',
            'rec_registro'      => 'Fecha de Registro',
            'rec_descripcion'   => 'Descripcion',
            'rec_fkrecursotipo' => 'Tipo',
            'rec_fknivel'       => 'Nivel',
            'recursoCarrera'    => 'Carreras',
            'palabras'          => 'Palabras Clave',
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
     * Gets query for [[RecFkrecursotipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecFkrecursotipo()
    {
        return $this->hasOne(RecursoTipo::className(), ['rectip_id' => 'rec_fkrecursotipo']);
    }

    /**
     * Gets query for [[RecursoArchivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecursoArchivos()
    {
        return $this->hasMany(RecursoArchivo::className(), ['recarc_fkrecurso' => 'rec_id']);
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

    public function getNivel()
    {
        return $this->recFknivel->niv_nombre;
    }

    public function getTipo()
    {
        return $this->recFkrecursotipo->rectip_nombre;
    }

    public function getCarrera()
    {
        $carreras = "";
        foreach ($this->recursoCarreras as $carrera) {
            $carreras .= $carrera->carrera . ', ';
        };
        return $carreras;
    }

    public function getPalabra()
    {
        // $palabrasn = "";
        // foreach ($this->palabras as $palabra) {
        //     $palabrasn .= $palabra->pal_nombre . ', ';
        // };
        // return $palabrasn;
    }

    /*public function getUsuarioNombre()
    {
        return $this->getAutorRecursos()->where([])->one()->aut_nombre;
    }*/
}
