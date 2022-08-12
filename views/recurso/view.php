<?php

use app\models\Autor;
use yii\helpers\Html;
use kartik\dialog\Dialog;
use webvimark\modules\UserManagement\models\User;


/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = $model->rec_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

echo Dialog::widget(['overrideYiiConfirm' => true]);
?>
<div class="recurso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Autor::isAllowedToEdit(Yii::$app->user->identity->id, $model->rec_id)) { ?>
            <?= Html::a('Actualizar', ['update', 'rec_id' => $model->rec_id], ['class' => 'btn btn-primary']) ?>
        <?php } ?>

        <?php if (User::hasRole(['admon', false])) { ?>
            <?= Html::a('Eliminar', ['delete', 'rec_id' => $model->rec_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Estás seguro de eliminar este recurso? <h3>' . $model->rec_nombre . '</h3>',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= $this->render('_card', [
        'model' => $model,
    ]);
    ?>
</div>