<?php

use app\models\Archivo;
$logoITVH = Archivo::imageToBase64(Yii::getAlias('@webroot') . '/images/' . 'logo.png');
?>


<div>
    <div>
        <img src="<?= $logoITVH ?>" height="75px">
    </div>
    <div style="color: #9dab05; font-size: 12px; padding-top: 20px;">
        <div>Carretera Villahermosa-F rontera Km. 3.5 Cd. Industrial C.P. 86010 Villahermosa, Tab. México </div>
        <div>Tel. (993) 3530259, Ext. 101 e-mail: dir_villaherm osa@tecnm.mx tecnm.mx | villahermosa.tecnm.mx</div>
    </div>
</div>