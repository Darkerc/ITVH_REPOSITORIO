<?php

use app\models\Nivel;
use app\models\RecursoTipo;
use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use kartik\label\LabelInPlace;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
// on your view layout file
use kartik\icons\FontAwesomeAsset;
FontAwesomeAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */

$config = ['template' => "{input}\n{error}\n{hint}"];
$tipo = ArrayHelper::map(RecursoTipo::find()->all(), 'rectip_id', 'rectip_nombre');
$nivel = ArrayHelper::map(Nivel::find()->all(), 'niv_id', 'niv_nombre');
?>

<div class="recurso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rec_nombre', $config)->widget(LabelInPlace::classname()); ?>

    <?= $form->field($model, 'rec_resumen', $config)->widget(LabelInPlace::classname()); ?>

    <?= $form->field($model, 'rec_registro')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATETIME,
        'ajaxConversion' => true,
        'widgetOptions' => [
            'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'rec_descripcion', $config)->widget(LabelInPlace::classname()); ?>

    <div class="row">
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'rec_fkrecursotipo')->dropDownList($tipo, ['prompt' => 'Seleccione uno']); ?>
        </div>
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'rec_fknivel')->dropDownList($nivel, ['prompt' => 'Seleccione uno']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>