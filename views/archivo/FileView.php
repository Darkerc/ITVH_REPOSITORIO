<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Archivo */

$this->title = $model->arc_nombre;
\yii\web\YiiAsset::register($this);
?>

<div class="d-flex py-3">
    <?= Html::a('Regresar <img src="/images/regresar.png"> ', Yii::$app->request->referrer, ['class' => 'btn btn-warning btn-lg px-5']) ?>
</div>

<div class="archivo-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?
    switch ($model->arc_extension) {
        case 'pdf':
            $data = $model->renderPDFBook();
            echo $data['book'];
            $this->registerJs($data['js']);
            break;
        case 'jpg':
            break;

        case 'png':
            break;

        case 'jpeg':
            break;

        case 'gif':
            break;
    }
    ?>

    <?php
    $data = $model->renderPDFBook();
    echo $data['book'];
    $this->registerJs($data['js']);
    ?>
</div>