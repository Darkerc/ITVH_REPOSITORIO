<?php

use webvimark\modules\UserManagement\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (User::hasRole(['admon', false])) { ?>

    <?= $this->render('_form/_formadmon', [
        'model' => $model,
    ]); ?>

<?php } else if (User::hasRole(['aut', false])) { ?>

    <?= $this->render('_form/_formaut', [
        'model' => $model,
    ]); ?>

<?php } ?>