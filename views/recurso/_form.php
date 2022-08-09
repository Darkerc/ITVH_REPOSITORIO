<?php

use app\models\Autor;
use app\models\Carrera;
use app\models\Nivel;
use app\models\Palabra;
use app\models\RecursoArchivo;
use app\models\RecursoTipo;
use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use kartik\label\LabelInPlace;
use yii\widgets\ActiveForm;
// on your view layout file
use kartik\select2\Select2;
use kartik\file\FileInput;
use kartik\icons\FontAwesomeAsset;
use webvimark\modules\UserManagement\models\User;

$isUpdated = is_int($model->rec_id);

FontAwesomeAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */

$config = ['template' => "{input}\n{error}\n{hint}"];

$files = array_map(fn (RecursoArchivo $ra) => [
    'caption' => $ra->recarcFkarchivo->arc_nombre,
    'downloadUrl' => $ra->recarcFkarchivo->getArchivoURL(),
    'type' => $ra->recarcFkarchivo->getKartikFileType(),
], $model->recursoArchivos)
?>

<div class="recurso-form">
    <?php $form = ActiveForm::begin([
        'method' => 'POST',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <div class="d-flex mb-3">
        <?= $isUpdated ? Html::a('Regresar <img src="/images/regresar.png"> ', Yii::$app->request->referrer, ['class' => 'btn btn-warning btn-lg px-5']) : '' ?>
    </div>

    <div class="d-flex mb-3">
        <?= $form->field($model, 'rec_nombre', array_merge($config, ['options' => ['class' => 'w-100']]))->widget(LabelInPlace::classname(), [
            'label' => 'Título',
            'encodeLabel' => false,
            'pluginOptions' => [
                'labelPosition' => 'down',
                'labelArrowDown' => ' <i class="fas fa-chevron-down"></i>',
                'labelArrowUp' => ' <i class="fas fa-chevron-up"></i>',
                'labelArrowRight' => ' <i class="fas fa-chevron-right"></i>',
            ]
        ]); ?>
        <?= $isUpdated ? Html::button('Actualizar', ['class' => 'btn btn-primary', 'onclick' => "onChangeTextValues('rec_nombre')"]) : '' ?>
    </div>

    <div class="d-flex flex-column mb-3">
        <?= $form->field($model, 'rec_resumen', $config)->widget(LabelInPlace::classname(), [
            'type' => LabelInPlace::TYPE_TEXTAREA,
            'label' => 'Resumen',
            'encodeLabel' => false,
            'options' => ['rows' => 8],
            'pluginOptions' => [
                'labelPosition' => 'down',
                'labelArrowDown' => ' <i class="fas fa-chevron-down"></i>',
                'labelArrowUp' => ' <i class="fas fa-chevron-up"></i>',
                'labelArrowRight' => ' <i class="fas fa-chevron-right"></i>',
            ]
        ]); ?>
        <?= $isUpdated ? Html::button('Actualizar', ['class' => 'btn btn-primary ml-auto', 'onclick' => "onChangeTextValues('rec_resumen')"]) : '' ?>
    </div>

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
            'language' => 'es',
            'widgetOptions' => [
                'pluginEvents' => $isUpdated ? [
                    "changeDate" => "e => window.onDateChanged(e, 'rec_registro')",
                ] : []
            ]
        ]); ?>
    <?php } ?>

    <div class="row">
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'rec_fkrecursotipo')->widget(Select2::classname(), [
                'data' => RecursoTipo::map(),
                'options' => [
                    'placeholder' => 'Seleccione un tipo',
                ],
                'pluginEvents' => $isUpdated ? [
                    "select2:select" => "function(e){ window.onChangeSelectValues(this, e, 'UPDATE') }",
                    "select2:unselect" => "function(e){ window.onChangeSelectValues(this, e, 'DELETE') }"
                ] : []
            ])->label('Tipo'); ?>
        </div>
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'rec_fknivel')->widget(Select2::classname(), [
                'data' => Nivel::map(),
                'options' => [
                    'placeholder' => 'Seleccione un nivel',
                ],
                'pluginEvents' => $isUpdated ? [
                    "select2:select" => "function(e){ window.onChangeSelectValues(this, e, 'UPDATE') }",
                    "select2:unselect" => "function(e){ window.onChangeSelectValues(this, e, 'DELETE') }"
                ] : []
            ])->label('Nivel'); ?>
        </div>
    </div>

    <?php if (User::hasRole(['admon', false])) { ?>
        <?= $form->field($model, 'autores')->widget(Select2::classname(), [
            'options' => ['placeholder' => 'Selecciona una autor...', 'multiple' => true, 'value' => $model->autor],
            'toggleAllSettings' => [
                'unselectLabel' => 'Deseleccionar todo',
                'selectOptions' => ['class' => 'd-none'],
                'unselectOptions' => ['class' => 'text-danger'],
            ],
            'pluginOptions' => [
                'tags' => true,
                'tokenSeparators' => [',', ' '],
                'maximumInputLength' => 20
            ],
            'pluginEvents' => $isUpdated ? [
                "select2:select" => "function(e){ window.onChangeSelectValues(this, e, 'UPDATE') }",
                "select2:unselect" => "function(e){ window.onChangeSelectValues(this, e, 'DELETE') }"
            ] : []
        ]); ?>
    <?php } ?>

    <?= $form->field($model, 'recursoCarrera')->widget(Select2::classname(), [
        'data' => Carrera::map(),
        'options' => ['placeholder' => 'Selecciona una carrera...', 'multiple' => true, 'value' => $model->CarreraId],
        'toggleAllSettings' => [
            'selectLabel' => '',
            'unselectLabel' => '',
            'selectOptions' => ['class' => 'd-none'],
            'unselectOptions' => ['class' => 'd-none'],
        ],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 20
        ],
        'pluginEvents' => $isUpdated ? [
            "select2:select" => "function(e){ window.onChangeSelectValues(this, e, 'UPDATE') }",
            "select2:unselect" => "function(e){ window.onChangeSelectValues(this, e, 'DELETE') }"
        ] : []
    ])->label('Carreras'); ?>

    <?= $form->field($model, 'palabrasc')->widget(Select2::classname(), [
        'id' => 'test',
        'data' => Palabra::mapById($model->PalabraId),
        'value' => $model->PalabraId,
        'options' => ['placeholder' => 'Ingrese las palabras clave...', 'multiple' => true, 'value' => $model->PalabraId],
        'toggleAllSettings' => [
            'selectLabel' => '',
            'unselectLabel' => '',
            'selectOptions' => ['class' => 'd-none'],
            'unselectOptions' => ['class' => 'd-none'],
        ],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 15,
        ],
        'pluginEvents' => $isUpdated ? [
            "select2:select" => "function(e){ window.onChangeSelectValues(this, e, 'UPDATE') }",
            "select2:unselect" => "function(e){ window.onChangeSelectValues(this, e, 'DELETE') }"
        ] : []
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
                    'showRemove' => false,
                    'initialPreviewAsData' => true,
                    'initialPreviewConfig' => $files,

                ]
            ]);
            ?>
        </div>
    </div>

    <div class="d-flex justify-content-end form-group mt-5">
        <?= !$isUpdated ? Html::a('Regresar <img src="/images/regresar.png"> ', Yii::$app->request->referrer, ['class' => 'btn btn-warning btn-lg px-5']) : '' ?>
        <?= !$isUpdated ? Html::submitButton('Guardar', ['class' => 'btn btn-success btn-lg px-5']) : '' ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.0.1/luxon.js" integrity="sha512-AnTc8fanq1DBVgUrXeDtXwe48bl9JHb8v/DW4bRBsIaiU1V8xaeeWuz7psOWTIfn9Uf6okk59Iy45eo0Lc930Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.onload = () => {
        const URL = {
            UPDATE: '/recurso/update-recurso-field?rec_id=<?= $model->rec_id ?>',
            DELETE: '/recurso/delete-recurso-field?rec_id=<?= $model->rec_id ?>'
        }

        const updateProperty = ({
            key,
            value,
            url,
            onSuccess = (data) => {},
            onError = (error) => {}
        }) => {
            $.notify("Cambiando informacion...", "info");
            $.ajax(url, {
                type: 'POST', // http method
                data: {
                    [key]: value
                },
                // data to submit
                success: function(data, status, xhr) {
                    $.notify("Realizado con exito", "success");
                    onSuccess(data)
                },
                error: function(jqXhr, textStatus, errorMessage) {
                    $.notify("A ocurrido un error, intente de nuevo", "error");
                    onError(errorMessage)
                }
            });
        }

        window.onChangeSelectValues = (element, event, type = 'UPDATE') => {
            const modelPropertyName = event.target.id.split('recurso-').pop()
            switch (modelPropertyName) {
                case 'recursocarrera': {
                    const modelPropertyValue = event.params.data.id
                    updateProperty({
                        key: modelPropertyName,
                        value: modelPropertyValue,
                        url: URL[type]
                    })
                    break;
                }
                case 'palabrasc': {
                    const modelPropertyValue = type === 'DELETE' ? event.params.data.id : event.params.data.text
                    if (type === 'DELETE') {
                        updateProperty({
                            key: modelPropertyName,
                            value: modelPropertyValue,
                            url: URL[type],
                            onSuccess(pal_id) {
                                $(`#recurso-palabrasc option[value="${modelPropertyValue}"]`).remove().trigger('change');
                            }
                        })
                    } else if (type === 'UPDATE') {
                        updateProperty({
                            key: modelPropertyName,
                            value: modelPropertyValue,
                            url: URL[type],
                            onSuccess(pal_id) {
                                $(`#recurso-palabrasc option[value="${modelPropertyValue}"]`).remove().trigger('change');
                                var data = {
                                    id: pal_id,
                                    text: modelPropertyValue
                                };
                                var newOption = new Option(data.text, data.id, true, true);
                                $('#recurso-palabrasc').append(newOption).trigger('change');
                            }
                        })
                    }
                    break;
                }
                default: {
                    const modelPropertyValue = event.target.value
                    updateProperty({
                        key: modelPropertyName,
                        value: modelPropertyValue,
                        url: URL[type]
                    })
                    break;
                }
            }
        }

        window.onChangeTextValues = (modelPropertyName) => {
            const elementId = `recurso-${modelPropertyName}`
            const element = document.getElementById(elementId)
            updateProperty({
                key: modelPropertyName,
                value: element.value,
                url: URL.UPDATE
            })
        }

        window.onDateChanged = (event, modelPropertyName) => {
            const elementId = `recurso-${modelPropertyName}`
            var DateTime = luxon.DateTime;
            const newDate = DateTime.fromJSDate(new Date(event.date)).toFormat('yyyy-MM-dd hh:mm:ss')
            updateProperty({
                key: modelPropertyName,
                value: newDate,
                url: URL.UPDATE
            })
        }
    }
</script>