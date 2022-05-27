<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AutorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'aut_id') ?>

    <?= $form->field($model, 'aut_nombre') ?>

    <?= $form->field($model, 'aut_paterno') ?>

    <?= $form->field($model, 'aut_marterno') ?>

    <?= $form->field($model, 'aut_correo') ?>

    <?php // echo $form->field($model, 'aut_semestre') ?>

    <?php // echo $form->field($model, 'aut_fkcarrera') ?>

    <?php // echo $form->field($model, 'aut_fktipo') ?>

    <?php // echo $form->field($model, 'aut_fkdepartamento') ?>

    <?php // echo $form->field($model, 'aut_fkencargado') ?>

    <?php // echo $form->field($model, 'aut_fkuser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
