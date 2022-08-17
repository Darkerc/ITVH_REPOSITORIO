<?php

use app\models\AutorTipo;
use yii\helpers\Html;
use app\models\Carrera;
use app\models\Departamento;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use kartik\label\LabelInPlace;
use kartik\icons\FontAwesomeAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Autor */
/* @var $form yii\widgets\ActiveForm */

$config = ['template' => "{input}\n{error}\n{hint}"];
FontAwesomeAsset::register($this);
?>

<div class="autor-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="d-flex flex-column mb-3">
        <?= $form->field($model, 'aut_nombre', $config)->widget(LabelInPlace::classname(), [
            'type' => LabelInPlace::TYPE_TEXTAREA,
            'label' => 'Nombre',
            'encodeLabel' => false,
            'options' => ['rows' => 1],
            'pluginOptions' => [
                'labelPosition' => 'down',
                'labelArrowDown' => ' <i class="fas fa-chevron-down"></i>',
                'labelArrowUp' => ' <i class="fas fa-chevron-up"></i>',
                'labelArrowRight' => ' <i class="fas fa-chevron-right"></i>',
            ]
        ]); ?>
    </div>

    <div class="row">
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'aut_paterno', $config)->widget(LabelInPlace::classname(), [
                'type' => LabelInPlace::TYPE_TEXTAREA,
                'label' => 'Apellido Paterno',
                'encodeLabel' => false,
                'options' => ['rows' => 1],
                'pluginOptions' => [
                    'labelPosition' => 'down',
                    'labelArrowDown' => ' <i class="fas fa-chevron-down"></i>',
                    'labelArrowUp' => ' <i class="fas fa-chevron-up"></i>',
                    'labelArrowRight' => ' <i class="fas fa-chevron-right"></i>',
                ]
            ]); ?>
        </div>
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'aut_materno', $config)->widget(LabelInPlace::classname(), [
                'type' => LabelInPlace::TYPE_TEXTAREA,
                'label' => 'Apellido Materno',
                'encodeLabel' => false,
                'options' => ['rows' => 1],
                'pluginOptions' => [
                    'labelPosition' => 'down',
                    'labelArrowDown' => ' <i class="fas fa-chevron-down"></i>',
                    'labelArrowUp' => ' <i class="fas fa-chevron-up"></i>',
                    'labelArrowRight' => ' <i class="fas fa-chevron-right"></i>',
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'aut_correo', $config)->widget(LabelInPlace::classname(), [
                'type' => LabelInPlace::TYPE_TEXTAREA,
                'options' => ['rows' => 3]
            ]);
            ?>
        </div>
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'aut_semestre')->widget(Select2::classname(), [
                'data' => [1 => "Primero", 2 => "Segundo", 3 => "Tercero", 4 => "Cuarto", 5 => "Quinto", 6 => "Sexto", 7 => "Septimo", 8 => "Octavo", 9 => "Noveno", 10 => "Decimo"],
                'options' => [
                    'placeholder' => 'Seleccione un semestre',
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'aut_fkcarrera')->widget(Select2::classname(), [
                'data' => Carrera::map(),
                'options' => [
                    'placeholder' => 'Seleccione una carrera',
                ]
            ])->label('Carrera'); ?>
        </div>
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'aut_fkautortipo')->widget(Select2::classname(), [
                'data' => AutorTipo::map(),
                'options' => [
                    'placeholder' => 'Seleccione un tipo de Autor',
                ]
            ])->label('Tipo de Autor'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'aut_fkdepartamento')->widget(Select2::classname(), [
                'data' => Departamento::map(),
                'options' => [
                    'placeholder' => 'Seleccione el departamento',
                ]
            ])->label('Departmento'); ?>
        </div>
        <div class="col col-12 col-md-6 form-group">
            <?= $form->field($model, 'aut_fkuser')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>