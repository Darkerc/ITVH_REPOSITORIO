<?php

use app\models\Carrera;
use app\models\Nivel;
use app\models\RecursoTipo;
use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use kartik\label\LabelInPlace;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
// on your view layout file
use kartik\icons\FontAwesomeAsset;
use kartik\select2\Select2;
use kartik\file\FileInput;

FontAwesomeAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */

$config = ['template' => "{input}\n{error}\n{hint}"];
$tipo = ArrayHelper::map(RecursoTipo::find()->all(), 'rectip_id', 'rectip_nombre');
$nivel = ArrayHelper::map(Nivel::find()->all(), 'niv_id', 'niv_nombre');
$carrera = ArrayHelper::map(Carrera::find()->all(), 'car_id', 'car_nombre');
?>

<div class="recurso-form">

    <?php $form = ActiveForm::begin([
        'method' => 'POST',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'rec_nombre', $config)->widget(LabelInPlace::classname()); ?>

    <?= $form->field($model, 'rec_resumen', $config)->widget(LabelInPlace::classname(), [
        'type' => LabelInPlace::TYPE_TEXTAREA
    ]); ?>

    <?= $form->field($model, 'rec_registro')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME,
        'ajaxConversion' => true,
        'widgetOptions' => [
            'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]); ?>


    <div class="row">
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'rec_fkrecursotipo')->dropDownList($tipo, ['prompt' => 'Seleccione uno']); ?>
        </div>
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'rec_fknivel')->dropDownList($nivel, ['prompt' => 'Seleccione uno']) ?>
        </div>
    </div>

    <?= $form->field($model, 'recursoCarrera')->widget(Select2::classname(), [
        'data' => $carrera,
        'options' => ['placeholder' => 'Selecciona una carrera...', 'multiple' => true],
        'toggleAllSettings' => [
            'selectLabel' => '',
            'unselectLabel' => 'Deseleccionar todo',
            'selectOptions' => ['class' => 'text-success'],
            'unselectOptions' => ['class' => 'text-danger'],
        ],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 20
        ],
    ])->label('Carreras'); ?>

    <?= $form->field($model, 'palabrasc')->widget(Select2::classname(), [
        'options' => ['placeholder' => 'Ingrese las palabras clave...', 'multiple' => true],
        'toggleAllSettings' => [
            'selectLabel' => '',
            'unselectLabel' => 'Deseleccionar todo',
            'selectOptions' => ['class' => 'text-success'],
            'unselectOptions' => ['class' => 'text-danger'],
        ],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 15
        ],
    ])->label('Palabras Clave');  ?>

    <div class="row">
        <div class="col col-12 form-group">
            <?=
            $form->field($model, 'archivos[]')->widget(FileInput::classname(), [
                'name' => 'archivos[]',
                'language' => 'es',
                'options' => [
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'showUpload' => false
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="d-flex justify-content-end form-group mt-5">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg px-5']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>