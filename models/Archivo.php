<?php

namespace app\models;

use Yii;
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
            'arc_extension' => 'Extension',
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

    public function getArchivoURL() {
        return Url::home(true) . 'files/' . $this->arc_nombre;
    }

    public function getKartikFileType() {
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

    public function getBlobFiles() {
        $im = new \Imagick();
        $im->setResolution(100,100);
        $blobs = [];      
        $i = 0;
        
        // Yii::getAlias('@webroot') . '/files/' . $this->arc_nombre . "[$i]"
        while ($i < 5) {
            $im->readimage("/home/darkerc/Escritorio/repositorio/web/files/2022-Recurso con archivos-1141.pdf[0]");
            // $filename =  Yii::getAlias('@webroot') . '/files/' . $this->arc_nombre . "[$i]";
            $im->setImageFormat('jpg');    
            $im->writeImage('thumb.jpg');
            array_push($blobs, base64_encode($im->getImageBlob()));
            $i = $i + 1;
            $im->clear(); 
        }
        
        $im->destroy();

        return $blobs;
    }
}
