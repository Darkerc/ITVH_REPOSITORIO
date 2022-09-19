<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioHistorial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-historial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuhis_id')->textInput() ?>

    <?= $form->field($model, 'usuhis_fecha')->textInput() ?>

    <?= $form->field($model, 'fk_user')->textInput() ?>

    <?= $form->field($model, 'fk_recurso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
