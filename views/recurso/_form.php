<?php

use app\models\Carrera;
use app\models\Nivel;
use app\models\Palabra;
use app\models\RecursoArchivo;
use app\models\RecursoTipo;
use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use kartik\label\LabelInPlace;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
// on your view layout file
use kartik\select2\Select2;

use kartik\file\FileInput;
use kartik\icons\FontAwesomeAsset;
use webvimark\modules\UserManagement\models\User;

FontAwesomeAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */

$config = ['template' => "{input}\n{error}\n{hint}"];

$files = array_map(fn(RecursoArchivo $ra) => [
            'caption' => $ra->recarcFkarchivo->arc_nombre,
            'downloadUrl' => $ra->recarcFkarchivo->getArchivoURL(),
            'type' => $ra->recarcFkarchivo->getKartikFileType()
        ], $model->recursoArchivos)
?>

<div class="recurso-form">

    <?php $form = ActiveForm::begin([
        'method' => 'POST',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'rec_nombre', $config)->widget(LabelInPlace::classname(), [
        'label' => 'Titulo',
        'encodeLabel' => false,
        'pluginOptions' => [
            'labelPosition' => 'down',
            'labelArrowDown' => ' <i class="fas fa-chevron-down"></i>',
            'labelArrowUp' => ' <i class="fas fa-chevron-up"></i>',
            'labelArrowRight' => ' <i class="fas fa-chevron-right"></i>',
        ]
    ]); ?>

    <?= $form->field($model, 'rec_resumen', $config)->widget(LabelInPlace::classname(), [
        'type' => LabelInPlace::TYPE_TEXTAREA,
        'label' => 'Resumen',
        'encodeLabel' => false,
        'pluginOptions' => [
            'labelPosition' => 'down',
            'labelArrowDown' => ' <i class="fas fa-chevron-down"></i>',
            'labelArrowUp' => ' <i class="fas fa-chevron-up"></i>',
            'labelArrowRight' => ' <i class="fas fa-chevron-right"></i>',
        ]
    ]); ?>

    <?php if (User::hasRole(['admon', false])) { ?>
        <?= $form->field($model, 'rec_registro')->widget(DateControl::classname(), [
            'type' => 'datetime',
            'ajaxConversion' => true,
            'autoWidget' => true,
            'widgetClass' => '',
            'displayFormat' => 'dd-MM-yyyy HH:mm:ss A',
            'saveFormat' => 'php:Y-m-d H:i:s',
            'saveTimezone' => 'America/New_York',
            'displayTimezone' => 'America/New_York',
            'widgetOptions' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-MM-yyyy HH:mm:ss A'
                ]
            ],
            'language' => 'es'
        ]); ?>
    <?php } ?>



    <div class="row">
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'rec_fkrecursotipo')->widget(Select2::classname(), [
                'data' => RecursoTipo::map(),
                'options' => [
                    'placeholder' => 'Seleccione un tipo',
                ],
            ])->label('Tipo'); ?>
        </div>
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'rec_fknivel')->widget(Select2::classname(), [
                'data' => Nivel::map(),
                'options' => [
                    'placeholder' => 'Seleccione un nivel',
                ],
            ])->label('Nivel'); ?>
        </div>
    </div>

    <?= $form->field($model, 'recursoCarrera')->widget(Select2::classname(), [
        'data' => Carrera::map(),
        'options' => ['placeholder' => 'Selecciona una carrera...', 'multiple' => true, 'value' => $model->CarreraId],
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
        'pluginEvents' => [
            "select2:unselecting" => "function(data) { 
                console.log('unselecting', data)
            }",
            "select2:unselect" => "function(data) { 
                console.log('unselect', data)
            }",
            "select2:open" => "function(data) { 
                console.log('open', data)
            }",
        ]
    ])->label('Carreras'); ?>

    <?= $form->field($model, 'palabrasc')->widget(Select2::classname(), [
        'data' => Palabra::map($model->PalabraId),    
        'options' => ['placeholder' => 'Ingrese las palabras clave...', 'multiple' => true, 'value' => $model->PalabraId],
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
                    'initialPreview' => array_map(fn ($f) => $f['downloadUrl'], $files),
                    'showUpload' => false,
                    'initialPreviewAsData' => true,
                    'initialPreviewConfig' => $files
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