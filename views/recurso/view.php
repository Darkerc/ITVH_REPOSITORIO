<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;


/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = $model->rec_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recurso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (User::hasRole(['admon', 'aut', false])) { ?>
            <?= Html::a('Actualizar', ['update', 'rec_id' => $model->rec_id], ['class' => 'btn btn-primary']) ?>
        <?php } ?>

        <?php if (User::hasRole(['admon', false])) { ?>
            <?= Html::a('Eliminar', ['delete', 'rec_id' => $model->rec_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
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