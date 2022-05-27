<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArchivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'arc_id') ?>

    <?= $form->field($model, 'arc_nombre') ?>

    <?= $form->field($model, 'arc_extension') ?>

    <?= $form->field($model, 'arc_original') ?>

    <?= $form->field($model, 'arc_visitas') ?>

    <?php // echo $form->field($model, 'arc_descargas') ?>

    <?php // echo $form->field($model, 'arc_mimetype') ?>

    <?php // echo $form->field($model, 'arc_fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
