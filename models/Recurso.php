<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "recurso".
 *
 * @property int $rec_id
 * @property string $rec_nombre
 * @property string $rec_resumen
 * @property string $rec_registro
 * @property string $rec_descripcion
 * @property int $rec_status
 * @property int $rec_fkrecursotipo
 * @property int $rec_fknivel
 * @property string $tipo
 * @property int $cantidad
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
    public static $REC_STATUS_EN_REVICION = 0;
    public static $REC_STATUS_REVISADO = 1;

    public $tipo;
    public $cantidad;
    public $recursoCarrera;
    public $palabrasc;
    public $archivos;
    public $autores;
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
            [['rec_nombre', 'rec_resumen', 'rec_registro', 'rec_fkrecursotipo', 'rec_fknivel', 'recursoCarrera', 'palabrasc'], 'required', 'message' => '{attribute} no puede estar vacío'],
            [['rec_nombre', 'rec_resumen', 'rec_descripcion'], 'string'],
            [['rec_registro', 'recursoCarrera', 'palabrasc', 'autores'], 'safe'],
            [['rec_fkrecursotipo', 'rec_fknivel', 'rec_status'], 'integer'],
            [['rec_fknivel'], 'exist', 'skipOnError' => true, 'targetClass' => Nivel::className(), 'targetAttribute' => ['rec_fknivel' => 'niv_id']],
            [['rec_fkrecursotipo'], 'exist', 'skipOnError' => true, 'targetClass' => RecursoTipo::className(), 'targetAttribute' => ['rec_fkrecursotipo' => 'rectip_id']],
            [['archivos'], 'file', 'maxFiles' => 4, 'extensions' => ['png', 'jpg', 'gif', 'jpeg', 'pdf'], 'maxSize' => 1024 * 1024 * 2]
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
            'rec_descripcion'   => 'Descripción',
            'rec_fkrecursotipo' => 'Tipo',
            'rec_fknivel'       => 'Nivel',
            'recursoCarrera'    => $this->rec_fknivel == Nivel::POSGRADO ? 'Posgrados' : 'Carreras',
            'palabrasc'         => 'Palabras Clave',
            'archivos'          => 'Archivos',
            'autores'           => 'Autores'
        ];
    }

    public function upload($validate = true)
    {
        if ($validate && !$this->validate()) {
            return false;
        }

        $year = date('Y');
        foreach ($this->archivos as $file) {
            $data = [
                'Archivo' => [
                    'arc_nombre' => preg_replace('/\s+/', '', $year.'-'.$this->rec_nombre.'-'.$this->rec_id . '-'. microtime() . '.'. $file->extension),
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
    }

    public function getJoinName()
    {
        return str_replace(' ','_', $this->rec_nombre);
    }

    /**
     * Gets query for [[AutorRecursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioHistorial()
    {
        return $this->hasMany(UsuarioHistorial::className(), ['usuhis_fkrecurso' => 'rec_id']);
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

    public function getResumenWordCount()
    {
        return str_word_count($this->rec_resumen);
    }

    public function getDublinCoreData()
    {
        return [
            "title" => $this->rec_nombre,
            "creator" => $this->autoresNames,
            "description" => $this->rec_resumen,
            "format" => $this->filesMimeTypes,
            "date" => reset(explode(' ',$this->rec_registro)),
            "type" => $this->tipo,
            "identifier" => $this->palabra,
            "language" => 'es',
            "wordcount" => $this->resumenWordCount,
            "url" => $this->currentUrl
        ];
    }

    public static function mapNombre(){
        return ArrayHelper::map(Recurso::find()->all(), 'rec_nombre', 'rec_nombre');
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
        $carr = join(", ", $palabras);
        return !$carr ? 'Sin Palabras Clave' : $carr;
    }

    public function getAutor()
    {
        $autor = array_map(fn ($autor) => $autor->autor, $this->autorRecursos);
        $carr = join(' - ', $autor);
        return !$carr ? 'Sin autor(es)' : $carr;
    }

    public function getAutoresIds()
    {
        $ids = array_map(fn ($autor) => $autor->autrec_fkautor, $this->autorRecursos);
        return $ids;
    }

    public function getAutoresNames()
    {
        $names = array_map(fn (AutorRecurso $autor) => $autor->autrecFkautor->aut_nombre, $this->autorRecursos);
        return join(', ', $names);
    }

    public function getCurrentUrl()
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }

    public function getFilesMimeTypes()
    {
        $fileExtencions =  array_map(fn (RecursoArchivo $rArchivo) => $rArchivo->recarcFkarchivo->arc_mimetype, $this->recursoArchivos);
        return join(', ', $fileExtencions);
    }

    public function getDublinCoreJSON() {
        require_once Yii::$app->basePath . '/views/utils/DublinCoreFormats.php';
        return dublinCoreJSON($this->getDublinCoreData());
    }

    public function getDublinCoreXML() {
        require_once Yii::$app->basePath . '/views/utils/DublinCoreFormats.php';
        return htmlspecialchars(dublinCoreXML($this->getDublinCoreData()), ENT_QUOTES);
    }

    public function getDublinCoreCSV() {
        require_once Yii::$app->basePath . '/views/utils/DublinCoreFormats.php';
        return dublinCoreCSV($this->getDublinCoreData());
    }

    public static function getCountByType($year) {
        $data = Recurso::find()
            ->select(["count( `recurso`.`rec_id` ) AS `cantidad`, `recurso_tipo`.`rectip_nombre` AS `tipo` "])
            ->join('INNER JOIN', 'recurso_tipo', "`recurso`.`rec_fkrecursotipo` = `recurso_tipo`.`rectip_id`")
            ->groupBy(['rec_fkrecursotipo']);

        if ($year != "Todos") {
            $data->where(['year(`recurso`.`rec_registro`)' => $year]);
        }


        return $data->all();
    }


    /**
     *
     * @return Recurso[]
     */
    public static function suggestRecursosByUserId($id) {
        if (is_null($id)) return null;

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT
        `recurso_tipo`.`rectip_id`
        FROM
            (
                `recurso`
            JOIN `recurso_tipo` ON ( `recurso`.`rec_fkrecursotipo` = `recurso_tipo`.`rectip_id` )) 
        WHERE
            `recurso`.`rec_id` IN ( SELECT `usuario_historial`.`usuhis_fkrecurso` FROM `usuario_historial` WHERE `usuario_historial`.`usuhis_fkuser` = {$id} ) 
        GROUP BY
            `recurso_tipo`.`rectip_nombre` 
        ORDER BY
            count( `recurso`.`rec_id` ) DESC 
        LIMIT 3;", [':start_date' => '1970-01-01']);

        $result = $command->queryAll();

        $rectip_ids = array_map(fn ($obj) => $obj['rectip_id'], $result);

        $query = Recurso::find()
            ->where(['in', 'rec_fkrecursotipo', $rectip_ids])
            ->orderBy(new Expression('rand()'))
            ->limit(5)
            ->all();

        return $query;
    }
}
