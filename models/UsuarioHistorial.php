<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_historial".
 *
 * @property int $usuhis_id
 * @property string $usuhis_fecha
 * @property int $usuhis_fkuser
 * @property int $usuhis_fkrecurso
 */
class UsuarioHistorial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario_historial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuhis_fkuser', 'usuhis_fkrecurso'], 'required'],
            [['usuhis_fkuser', 'usuhis_fkrecurso'], 'integer'],
            [['usuhis_fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usuhis_id' => 'Usuhis ID',
            'usuhis_fecha' => 'Usuhis Fecha',
            'usuhis_fkuser' => 'Fk User',
            'usuhis_fkrecurso' => 'Fk Recurso',
        ];
    }

    public static function visitRecurso($usr_id, $rec_id)
    {
        $usuarioHistorial = new UsuarioHistorial();
        $usuarioHistorial->usuhis_fkuser = $usr_id;
        $usuarioHistorial->usuhis_fkrecurso = $rec_id;
        $usuarioHistorial->save();

        return $usuarioHistorial;
    }
}
