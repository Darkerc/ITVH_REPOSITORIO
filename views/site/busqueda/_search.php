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
        <?= Html::tag('h3', 'Filtros') ?>
        <?php $form = ActiveForm::begin([
            'action' => ['busqueda'],
            'method' => 'get',
        ]) ?>

        <?= $form->field($searchModel, 'rec_nombre')->widget(Select2::classname(), [
            'data' => Recurso::mapNombre(),
            'options' => [
                'placeholder' => 'Ingrese el Título', 'multiple' => true,
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
        ])->label('Título'); ?>

        <div class="row">
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($searchModel, 'rec_fkrecursotipo')->widget(Select2::classname(), [
                    'data' => RecursoTipo::map(),
                    'options' => [
                        'placeholder' => 'Seleccione un tipo',
                    ],
                ])->label('Tipo'); ?>
            </div>
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($searchModel, 'rec_fknivel')->widget(Select2::classname(), [
                    'data' => Nivel::map(),
                    'options' => [
                        'placeholder' => 'Seleccione un nivel',
                    ],
                ])->label('Nivel'); ?>
            </div>
        </div>

        <?= $form->field($searchModel, 'recursoCarrera')->widget(Select2::classname(), [
            'data' => Carrera::map(),
            'options' => ['placeholder' => 'Selecciona una carrera...', 'multiple' => true],
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
        ])->label('Carreras'); ?>

        <?= $form->field($searchModel, 'palabrasc')->widget(Select2::classname(), [
            'data' => Palabra::mapcount(),
            'options' => ['placeholder' => 'Ingrese las palabras clave...', 'multiple' => true],
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
        ])->label('Palabras Clave');  ?>

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
                ]); ?>
            </div>
        </div>


        <div class="row form-group">
            <div class="col col-12 col-md-6">
                <?= Html::resetButton('Limpiar', ['class' => 'btn btn-warning btn-block']) ?>
            </div>
            <div class="col col-12 col-md-6">
                <?= Html::submitButton('Buscar...', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>