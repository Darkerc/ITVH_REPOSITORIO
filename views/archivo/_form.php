<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Archivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'arc_nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'arc_extencion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'arc_nombreOri')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'arc_visitas')->textInput() ?>

    <?= $form->field($model, 'arc_descargas')->textInput() ?>

    <?= $form->field($model, 'arc_mimetype')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
