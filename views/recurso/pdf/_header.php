<?php

use app\models\Archivo;

$logoHeader64 = Archivo::imageToBase64(Yii::getAlias('@webroot') . '/images/' . 'logo_largo_header.png');
?>

<div>
    <div>
        <img src="<?= $logoHeader64 ?>" width="450px">
    </div>
    <div style="margin-top: 30px;">
        <div style="text-align: right;">
            <strong>
                Instituto Tecnologico de Villahermosa
            </strong>
        </div>
        <div style="text-align: right;">Centro de informacion</div>
    </div>
    <div style="margin-top: 30px;">
        <div style="text-align: right;">Villahermosa, Tabasco <?= date_format(new DateTime(), 'd/m/Y') ?></div>
    </div>
</div>