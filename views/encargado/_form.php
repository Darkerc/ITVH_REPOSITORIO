<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Encargado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encargado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enc_nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'enc_paterno')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'enc_materno')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'enc_fkdepartamento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
