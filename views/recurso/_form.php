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
use webvimark\modules\UserManagement\models\User;
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

<?php if (User::hasRole(['admon', false])) { ?>

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


        <div class="row">
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($model, 'rec_fkrecursotipo')->widget(Select2::classname(), [
                    'data' => $tipo,
                    'options' => [
                        'placeholder' => 'Seleccione un tipo',
                    ],
                ])->label('Tipo'); ?>
            </div>
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($model, 'rec_fknivel')->widget(Select2::classname(), [
                    'data' => $nivel,
                    'options' => [
                        'placeholder' => 'Seleccione un nivel',
                    ],
                ])->label('Nivel'); ?>
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
<?php } else if (User::hasRole(['aut', false])) { ?>

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

        <div class="row">
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($model, 'rec_fkrecursotipo')->widget(Select2::classname(), [
                    'data' => $tipo,
                    'options' => [
                        'placeholder' => 'Seleccione un tipo',
                    ],
                ])->label('Tipo'); ?>
            </div>
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($model, 'rec_fknivel')->widget(Select2::classname(), [
                    'data' => $nivel,
                    'options' => [
                        'placeholder' => 'Seleccione un nivel',
                    ],
                ])->label('Nivel'); ?>
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

<?php } ?>