<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bitacora".
 *
 * @property int $bit_id
 * @property string|null $bit_descripcion
 * @property int|null $bit_fkrecurso
 *
 * @property Recurso $bitFkrecurso
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bitacora';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bit_descripcion'], 'string'],
            [['bit_fkrecurso'], 'integer'],
            [['bit_fkrecurso'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::className(), 'targetAttribute' => ['bit_fkrecurso' => 'rec_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bit_id'          => 'ID',
            'bit_descripcion' => 'Descripción',
            'bit_fkrecurso'   => 'Recurso',
        ];
    }

    /**
     * Gets query for [[BitFkrecurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBitFkrecurso()
    {
        return $this->hasOne(Recurso::className(), ['rec_id' => 'bit_fkrecurso']);
    }

    public static function addEvent($rec_id, $property, $value, $action)
    {
        // $user = Yii::$app->user->identity->findIdentity(Yii::$app->user->identity->id);
        $model = new Bitacora();
        $model->bit_fkrecurso = $rec_id;
        $model->bit_descripcion = json_encode([
            'accion' => $action,
            'usu_id' => Yii::$app->user->identity->id,
            'usu_nombre' =>  Yii::$app->user->identity->username,
            'propiedad' => $property,
            'valor' => $value,
        ]);
        $model->save();
    }

    public static $ACTION_UPDATE = 'ACTUALIZAR';
    public static $ACTION_DELETE = 'ELIMINAR';
}
