<?php
use app\models\Archivo;
$logoHeader64 = Archivo::imageToBase64(Yii::getAlias('@webroot') . '/membretes/' . 'pXZ5EV121gbMi1kPcZ_nPPU5HU5AN6Yj.jpg');
?>

<div>
    <img src="<?= $logoHeader64 ?>" width="900x">
</div>