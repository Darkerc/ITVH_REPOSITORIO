<?php

use yii\helpers\Html;
?>
<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h1><?= $model->con_id ?> <font size="+1"><?= $model->completo ?></font>
            </h1>
        </div>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->con_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->con_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <div class="panel-body" style="padding: 0px;">
            <?= yii\widgets\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'con_id',
                    'con_nombre',
                    'con_paterno',
                    'con_materno',
                    'con_genero',
                    'con_direccion:ntext',
                    'con_telefono',
                    'con_nacimiento',
                ],
            ]) ?>
        </div>
        <div class="panel-footing">Correo: <b><?= $model->con_correo ?></b></div>
    </div>
</div>