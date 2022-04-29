<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EncargadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encargado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'enc_id') ?>

    <?= $form->field($model, 'enc_nombre') ?>

    <?= $form->field($model, 'enc_apellidoMaterno') ?>

    <?= $form->field($model, 'enc_apellidoPaterno') ?>

    <?= $form->field($model, 'enc_fkdepartamento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
