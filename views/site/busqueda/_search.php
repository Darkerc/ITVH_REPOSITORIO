<?php

use app\models\Autor;
use app\models\Carrera;
use app\models\Nivel;
use app\models\Palabra;
use app\models\Recurso;
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

    <div class="jumbotron p-3">
        <?= Html::tag('h3', Yii::t('app', 'filtro')) ?>
        <?php $form = ActiveForm::begin([
            'action' => ['busqueda'],
            'method' => 'get',
        ]) ?>

        <?= $form->field($searchModel, 'rec_nombre')->widget(Select2::classname(), [
            'data' => Recurso::mapNombre(),
            'options' => [
                'placeholder' => Yii::t('app', 'ingrese_titulo'), 'multiple' => true,
            ],
            'toggleAllSettings' => [
                'selectLabel' => '',
                'unselectLabel' => '',
                'selectOptions' => ['class' => 'd-none'],
                'unselectOptions' => ['class' => 'd-none'],
            ],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 15,
                'maximumSelectionLength' => 1,
            ],
        ])->label(Yii::t('app', 'titulo')); ?>

        <div class="row">
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($searchModel, 'rec_fkrecursotipo')->widget(Select2::classname(), [
                    'data' => RecursoTipo::map(),
                    'options' => [
                        'placeholder' => Yii::t('app', 'seleccionar_tipo'),
                    ],
                ])->label(Yii::t('app', 'tipo')); ?>
            </div>
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($searchModel, 'rec_fknivel')->widget(Select2::classname(), [
                    'data' => Nivel::map(),
                    'options' => [
                        'placeholder' => Yii::t('app', 'seleccionar_nivel'),
                    ],
                ])->label(Yii::t('app', 'nivel')); ?>
            </div>
        </div>

        <?= $form->field($searchModel, 'recursoCarrera')->widget(Select2::classname(), [
            'data' => Carrera::map(),
            'options' => ['placeholder' => Yii::t('app', 'seleccionar_carrera'), 'multiple' => true],
            'toggleAllSettings' => [
                'selectLabel' => '-Selecionar todo',
                'unselectLabel' => 'Deseleccionar todo',
                'selectOptions' => ['class' => 'text-success'],
                'unselectOptions' => ['class' => 'text-danger'],
            ],
            'pluginOptions' => [
                'tags' => true,
                'tokenSeparators' => [',', ' '],
                'maximumInputLength' => 20
            ],
        ])->label(Yii::t('app', 'carrera')); ?>

        <?= $form->field($searchModel, 'palabrasc')->widget(Select2::classname(), [
            'data' => Palabra::mapcount(),
            'options' => ['placeholder' => Yii::t('app', 'ingresar_palabra'), 'multiple' => true],
            'toggleAllSettings' => [
                'selectLabel' => 'Seleccionar todo',
                'unselectLabel' => 'Deseleccionar todo',
                'selectOptions' => ['class' => 'text-success'],
                'unselectOptions' => ['class' => 'text-danger'],
            ],
            'pluginOptions' => [
                'tags' => true,
                'tokenSeparators' => [',', ' '],
                'maximumInputLength' => 15
            ],
        ])->label(Yii::t('app', 'palabra_clave'));  ?>

        <div class="col col-12">
            <div class="form-group">
                <?= $form->field($searchModel, 'rec_registro', [
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
                ])->label(Yii::t('app', 'fecha_registro')); ?>
            </div>
        </div>


        <div class="row form-group">
            <div class="col col-12 col-md-6">
                <?= Html::resetButton(Yii::t('app', 'limpiar'), ['class' => 'btn btn-warning btn-block']) ?>
            </div>
            <div class="col col-12 col-md-6">
                <?= Html::submitButton(Yii::t('app', 'buscar'), ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>