<?php

namespace app\models;

use Yii;
use yii\web\View;
use yii\helpers\Url;

/**
 * This is the model class for table "archivo".
 *
 * @property int $arc_id
 * @property string|null $arc_nombre
 * @property string|null $arc_extension
 * @property string|null $arc_original
 * @property int|null $arc_visitas
 * @property int|null $arc_descargas
 * @property string|null $arc_mimetype
 * @property string|null $arc_fecha
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
            [['arc_nombre', 'arc_extension', 'arc_original', 'arc_mimetype'], 'string'],
            [['arc_visitas', 'arc_descargas'], 'integer'],
            [['arc_fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'arc_id'        => 'ID',
            'arc_nombre'    => 'Nombre',
            'arc_extension' => 'Extensión',
            'arc_original'  => 'Nombre Original',
            'arc_visitas'   => 'Visitas',
            'arc_descargas' => 'Descargas',
            'arc_mimetype'  => 'Mimetype',
            'arc_fecha'     => 'Fecha de publicacion',
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

    public function getRecursoNombre()
    {
        $nombres = array_map(fn ($nombre) => $nombre->recNombre, $this->recursoArchivos);
        $nom = join(' - ', $nombres);
        return !$nom ? 'Sin Nombre del recurso' : $nom;
    }

    public function getArchivoURL()
    {
        return Url::home(true) . 'files/' . $this->arc_nombre;
    }

    // public function getArchivoPath()
    // {
    //     $path = Yii::getAlias('@webroot') . '/files';
    //     return '/files/' . $this->arc_nombre;
    // }

    public function getKartikFileType()
    {
        switch ($this->arc_extension) {
            case 'jpg':
            case 'png':
            case 'jpeg':
            case 'gif':
                return 'image';
            default:
                return $this->arc_extension;
        }
    }

    public function getBlobFiles()
    {
        $im = new \Imagick();
        $im->setResolution(150, 150);
        $blobs = [];
        $isReadeable = true;
        $i = 0;

        while ($isReadeable) {
            $filename =  Yii::getAlias('@webroot') . '/files/' . $this->arc_nombre . "[$i]";
            //var_dump($filename);
            try {
                $im->readimage($filename);
            } catch (\Throwable $_) {
                $isReadeable = false;
                break;
            }
            $im->setImageFormat('jpg');
            $im->writeImage('thumb.jpg');
            array_push($blobs, base64_encode($im->getImageBlob()));
            $im->clear();
            $i = $i + 1;
            //var_dump($im);
        }
        $im->destroy();

        return $blobs;
    }

    public function renderPDFBook()
    {
        $strImages = array_reduce($this->getBlobFiles(), fn ($str, $blob) => $str . '<img src="data:image/jpg;base64,' . $blob . '" />', "");

        $book = <<<EOD
            <div class="book_file" id="{$this->arc_id}" style="height: 70vh;">
                <div class="hard"> {$this->arc_nombre} </div>
                <div class="hard"></div>
                {$strImages}
                <div class="hard"></div>
                <div class="hard"></div>
            </div>
        EOD;

        $js = <<<STR
                $("#{$this->arc_id}").turn({
                    autoCenter: true
                });
            STR;



        return ['book' => $book, 'js' => $js];
    }

    public function actionDownload()
    {
        $path = Yii::getAlias('@webroot') . '/files/';

        $file = $path . $this->arc_nombre;

        if (file_exists($file)) {

            Yii::$app->response->sendFile($file);
        }
    }
}
