<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recurso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rec_nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rec_resumen')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rec_registro')->textInput() ?>

    <?= $form->field($model, 'rec_descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rec_fkrecursotipo')->textInput() ?>

    <?= $form->field($model, 'rec_fknivel')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
