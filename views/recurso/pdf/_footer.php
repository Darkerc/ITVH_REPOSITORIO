<?php

use app\models\Archivo;
$logoITVH = Archivo::imageToBase64(Yii::getAlias('@webroot') . '/membretes/' . 'DQlKNeBy5yT3OIl0rPBoZN1HkxZ2iFuk.jpg');
?>


<div>
    <img src="<?= $logoITVH ?>" height="900px">
</div>