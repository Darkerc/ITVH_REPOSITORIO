<?php

use yii\helpers\Html;
?>
<div class="col-md-4" style="padding: 5px;">
    <div class="panel panel-info" style="border-radius: 50px;">
        <div class="panel-heading" style="border-top-left-radius: 50px;border-top-right-radius: 50px;">
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
            <div class="col-md-12">
                <div class="row" style="background-color: #fafafa;">
                    <div class="col-md-12">
                        <?= str_replace("\n", "<br>", $model->con_direccion) ?><br>
                        <b><?= $model->con_telefono ?></b><br>
                        <?= $model->con_nacimiento ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footing" style="background-color: #ccc;border-bottom-left-radius: 50px;border-bottom-right-radius: 50px;">
            <b><?= $model->con_correo ?></b>
        </div>
    </div>
</div>