<?php

use app\models\Autor;
use app\models\Carrera;
use app\models\Nivel;
use app\models\Palabra;
use app\models\RecursoTipo;
use yii\helpers\Html;
use kartik\select2\Select2;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use kartik\icons\FontAwesomeAsset;
use kartik\label\LabelInPlace;

FontAwesomeAsset::register($this);

$config = ['template' => "{input}\n{error}\n{hint}"];
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
            <div class="form-group">
                <?= $form->field($model, 'autores')->widget(Select2::classname(), [
                    'data' => Autor::map(),
                    'options' => ['dir' => 'rtl', 'placeholder' => '... Seleccionar los autores'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => true
                    ],
                ]); ?>
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'palabrasc')->widget(Select2::classname(), [
                    'data' => Palabra::mapcount(),
                    'options' => ['dir' => 'rtl', 'placeholder' => '... Selecciona un tipo'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]); ?>
            </div>
        </div>

        <div class="col col-12">
            <div class="form-group">
                <?= $form->field($model, 'recursoCarrera')->widget(Select2::classname(), [
                    'data' => Carrera::map(),
                    'options' => ['dir' => 'rtl', 'placeholder' => '... Selecciona un tipo'],
                    'pluginOptions' => ['allowClear' => true],
                ]); ?>
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <?= $form->field($model, 'rec_fkrecursotipo')->widget(Select2::classname(), [
                'data' => RecursoTipo::map(),
                'name' => 'float_state_04',
                'options' => ['dir' => 'rtl', 'placeholder' => '... Selecciona un tipo'],
                'pluginOptions' => ['allowClear' => true],
            ]); ?>
        </div>

        <div class="col col-12 col-md-6">
            <?= $form->field($model, 'rec_fknivel')->widget(Select2::classname(), [
                'data' => Nivel::map(),
                'name' => 'float_state_04',
                'options' => ['dir' => 'rtl', 'placeholder' => '... Selecciona un nivel'],
                'pluginOptions' => ['allowClear' => true],
            ]); ?>
        </div>

        <div class="col col-12">
            <div class="form-group">
                <?= $form->field($model, 'rec_registro', [
                    'addon' => ['prepend' => ['content' => '<i class="fas fa-calendar-alt"></i>']],
                    'options' => ['class' => 'drp-container mb-2']
                ])->widget(DateRangePicker::classname(), [
                    'name' => 'date_range_3',
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'timePicker' => true,
                        'timePickerIncrement' => 15,
                        'locale' => ['format' => 'Y-m-d h:i A']
                    ],
                    'language' => 'es'
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