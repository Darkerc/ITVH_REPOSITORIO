<?php

namespace app\models;
use webvimark\modules\UserManagement\models\User;

use Yii;

/**
 * This is the model class for table "usuario_dublin_core".
 *
 * @property int $usudc_id
 * @property int $usudc_fkuser
 * @property int $usudc_fkrecurso
 * @property int|null $usudc_autorizado
 * @property string $usudc_fecha
 *
 * @property Recurso $usudcFkrecurso
 * @property User $usudcFkuser
 */
class UsuarioDublinCore extends \yii\db\ActiveRecord
{
    public static $SIN_DETERMINAR = 0;
    public static $AUTORIZADO = 1;
    public static $NO_AUTORIZADO = -1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario_dublin_core';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usudc_fkuser', 'usudc_fkrecurso'], 'required'],
            [['usudc_fkuser', 'usudc_fkrecurso', 'usudc_autorizado'], 'integer'],
            [['usudc_fkrecurso'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::className(), 'targetAttribute' => ['usudc_fkrecurso' => 'rec_id']],
            [['usudc_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usudc_fkuser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usudc_id' => 'Usudc ID',
            'usudc_fkuser' => 'Usudc Fkuser',
            'usudc_fkrecurso' => 'Usudc Fkrecurso',
            'usudc_autorizado' => 'Usudc Autorizado',
            'usudc_fecha' => 'Fecha de creacion'
        ];
    }

    /**
     * Gets query for [[UsudcFkrecurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsudcFkrecurso()
    {
        return $this->hasOne(Recurso::className(), ['rec_id' => 'usudc_fkrecurso']);
    }

    /**
     * Gets query for [[UsudcFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsudcFkuser()
    {
        return $this->hasOne(User::className(), ['id' => 'usudc_fkuser']);
    }
}
