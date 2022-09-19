<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioHistorialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-historial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usuhis_id') ?>

    <?= $form->field($model, 'usuhis_fecha') ?>

    <?= $form->field($model, 'fk_user') ?>

    <?= $form->field($model, 'fk_recurso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
