<?php

use app\models\Recurso;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Archivo */

$recurso = new Recurso();

$this->title = $model->arc_nombre;
\yii\web\YiiAsset::register($this);
?>

<div class="d-flex py-3">
    <?= Html::a('Regresar <img src="/images/regresar.png"> ', Yii::$app->request->referrer, ['class' => 'btn btn-warning btn-lg px-5']) ?>
</div>

<div class="archivo-view">
    <?php
    switch ($model->arc_extension) {
        case 'pdf':
            $data = $model->renderPDFBook();
            echo
            '<div class="cont">
            <p><h2>' . $model->recursoNombre . '</h2></p></div>
            <div class="imagick">'
                . $data['book'];
            $this->registerJs($data['js']) . 
            '</div>';
            break;
        case 'jpg' || 'png' || 'jpeg' || 'gif':
            echo
            '<div class="polaroid">
            <div class="cont">
            <p><h2>' . $model->recursoNombre . '</h2></p></div>'
                . Html::img($model->getArchivoURL(), ['class' => 'img-view']) .
                '</div>';
            break;
    }
    ?>

</div>