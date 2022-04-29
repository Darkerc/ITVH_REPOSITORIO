<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AutorTipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autor-tipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'autt_nombre')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
