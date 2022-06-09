<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\RecursoTipo;
use app\models\Nivel;
use kartik\select2\Select2;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use kartik\icons\FontAwesomeAsset;
use kartik\label\LabelInPlace;
use app\models\Carrera;

FontAwesomeAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\RecursoSearch */
/* @var $form yii\widgets\ActiveForm */

$config = ['template' => "{input}\n{error}\n{hint}"];
$tipo = ArrayHelper::map(RecursoTipo::find()->all(), 'rectip_id', 'rectip_nombre');
$nivel = ArrayHelper::map(Nivel::find()->all(), 'niv_id', 'niv_nombre');
$carrera = ArrayHelper::map(Carrera::find()->all(), 'car_id', 'car_nombre');
$data = [
    "Sistemas" => "Sistemas",
    "Tecnologia" => "Tecnologia",
    "Administracion" => "Administracion",
    "Contaminacion" => "Contaminacion",
    "Innovacion" => "Innovacion"
];
?>

<div>

    <?php $form = ActiveForm::begin([
        'action' => ['busqueda'],
        'method' => 'get',
        'class' => 'row'
    ]); ?>

    <div class="row">
        <div class="col col-12">
            <?= $form->field($model, 'rec_nombre', $config)->widget(LabelInPlace::classname()); ?>
        </div>

        <div class="col col-12 col-md-6">
            <label class="control-label">Autores</label>
            <?= Select2::widget([
                'name' => 'Autores',
                'data' => $data,
                'maintainOrder' => true,
                'options' => ['placeholder' => 'Selecciona un autor ...', 'multiple' => true],
                'toggleAllSettings'   => [
                    'selectLabel'     => 'Seleccionar todo',
                    'unselectLabel'   => 'Deseleccionar todo',
                    'selectOptions'   => ['class' => 'text-success'],
                    'unselectOptions' => ['class' => 'text-danger'],
                ],
                'pluginOptions' => [
                    'tags' => true,
                    'maximumInputLength' => 10
                ],
            ]); ?>
        </div>

        <div class="col col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">Palabras clave</label>
                <?= Select2::widget([
                    'name' => 'Palabras Clave',
                    'data' => $data,
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Selecciona las palabras clave ...', 'multiple' => true],
                    'toggleAllSettings' => [
                        'selectLabel' => 'Seleccionar todo',
                        'unselectLabel' => 'Deseleccionar todo',
                        'selectOptions' => ['class' => 'text-success'],
                        'unselectOptions' => ['class' => 'text-danger'],
                    ],
                    'pluginOptions' => [
                        'tags' => true,
                        'maximumInputLength' => 10
                    ],
                ]); ?>
            </div>
        </div>

        <div class="col col-12">
            <div class="form-group">
                <?= $form->field($model, 'recursoCarrera')->widget(Select2::classname(), [
                    'data' => $carrera,
                    'options' => ['placeholder' => 'Selecciona una carrera...', 'multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                        'tokenSeparators' => [',', ' '],
                        'maximumInputLength' => 10
                    ],
                ])->label('Carreras'); ?>
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <?= $form->field($model, 'rec_fkrecursotipo')->dropDownList($tipo, ['prompt' => 'Seleccione uno']); ?>
        </div>

        <div class="col col-12 col-md-6">
            <?= $form->field($model, 'rec_fknivel')->dropDownList($nivel, ['prompt' => 'Seleccione uno']) ?>
        </div>


        <div class="col col-12">
            <div class="form-group">
                <?= $form->field($model, 'rec_registro', [
                    'addon' => ['prepend' => ['content' => '<i class="fas fa-calendar-alt"></i>']],
                    'options' => ['class' => 'drp-container mb-2']
                ])->widget(DateRangePicker::classname(), [
                    'useWithAddon' => true
                ]); ?>
            </div>
        </div>
    </div>

    <!-- <?= $form->field($model, 'rec_registro') ?> -->

    <div class="row form-group">
        <div class="col col-12 col-md-6">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-success btn-block']) ?>
        </div>
        <div class="col col-12 col-md-6">
            <?= Html::resetButton('Limpiar', ['class' => 'btn btn-warning btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>