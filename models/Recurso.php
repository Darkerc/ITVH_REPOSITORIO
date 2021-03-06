<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\web\UploadedFile;

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
 * @property UploadedFile[] $archivos
 */
class Recurso extends \yii\db\ActiveRecord
{
    public $recursoCarrera;
    public $palabrasc;
    public $archivos;
    public $autores;
    //public $autores;
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
            [['rec_nombre', 'rec_resumen', 'rec_registro', 'rec_fkrecursotipo', 'rec_fknivel', 'recursoCarrera', 'palabrasc'], 'required', 'message' => '{attribute} no puede estar vacio'],
            [['rec_nombre', 'rec_resumen', 'rec_descripcion'], 'string'],
            [['rec_registro', 'recursoCarrera', 'palabrasc', 'autores'], 'safe'],
            [['rec_fkrecursotipo', 'rec_fknivel'], 'integer'],
            [['rec_fknivel'], 'exist', 'skipOnError' => true, 'targetClass' => Nivel::className(), 'targetAttribute' => ['rec_fknivel' => 'niv_id']],
            [['rec_fkrecursotipo'], 'exist', 'skipOnError' => true, 'targetClass' => RecursoTipo::className(), 'targetAttribute' => ['rec_fkrecursotipo' => 'rectip_id']],
            [['archivos'], 'file', 'maxFiles' => 4],
            //[['archivos'], 'file', 'extensions' => 'jpg, gif, png, pdf'],
            //[['archivos'], 'file', 'maxSize' => '500000000'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rec_id'            => 'ID',
            'rec_nombre'        => 'T??tulo',
            'rec_resumen'       => 'Resumen',
            'rec_registro'      => 'Fecha de Registro',
            'rec_descripcion'   => 'Descripcion',
            'rec_fkrecursotipo' => 'Tipo',
            'rec_fknivel'       => 'Nivel',
            'recursoCarrera'    => 'Carreras',
            'palabrasc'         => 'Palabras Clave',
            'archivos'          => 'Archivos',
            'autores'           => 'Autores'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $year = date('Y');
            foreach ($this->archivos as $file) {
                $data = [
                    'Archivo' => [
                        'arc_nombre' => preg_replace('/\s+/', '', "{$year}-{$this->rec_nombre}-{$this->rec_id}.{$file->extension}"),
                        'arc_extension' => $file->extension,
                        'arc_original' => $file->baseName,
                        'arc_mimetype' => $file->type,
                        'arc_fecha' => date('Y-m-d')
                    ]
                ];

                $archivo = new Archivo();
                $archivo->load($data);
                $archivo->save();

                $rArchivo = new RecursoArchivo();
                $rArchivo->recarc_fkrecurso = $this->rec_id;
                $rArchivo->recarc_fkarchivo = $archivo->arc_id;
                $rArchivo->save();

                $file->saveAs('files/' . $archivo->arc_nombre);
            }
            return true;
        } else {
            return false;
        }
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
        $carreras = array_map(fn ($carrera) => $carrera->carrera, $this->recursoCarreras);
        $carr = join(' - ', $carreras);
        return !$carr ? 'Sin carreras' : $carr;
    }

    public function getCarreraId()
    {
        return array_map(fn ($carrera) => $carrera->reccar_fkcarrera, $this->recursoCarreras);
    }

    public function getPalabraId()
    {
        return array_map(fn ($palabra) => $palabra->pal_id, $this->palabras);
    }

    public function getPalabra()
    {
        $palabras = array_map(fn ($palabra) => $palabra->pal_nombre, $this->palabras);
        $carr = join(" - ", $palabras);
        return !$carr ? 'Sin Palabras Clave' : $carr;
    }

    public function getAutor()
    {
        return array_map(fn ($autores) => $autores->autcar_fkautor, $this->autorRecursos);
    }


    public function getCurrentUrl()
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }
}
