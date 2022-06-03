<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div>

    <?php $form = ActiveForm::begin([
        'action' => ['busqueda'],
        'method' => 'get',
        'class' => 'row'
    ]); ?>

    <div class="row">
        <div class="col col-12">
            <?= $form->field($model, 'rec_nombre') ?>
        </div>

        <div class="col col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">Autor</label>
                <input class="form-control">
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <?= $form->field($model, 'tipo') ?>
        </div>

        <div class="col col-12 col-md-6">
            <?= $form->field($model, 'nivel') ?>
        </div>

        <div class="col col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">Palabras clave</label>
                <input class="form-control">
            </div>
        </div>

        <div class="col col-12">
            <div class="form-group">
                <label class="control-label">Intervalo</label>
                <input class="form-control">
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