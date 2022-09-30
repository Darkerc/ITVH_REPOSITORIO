<?php

use app\models\Archivo;
use app\models\Recurso;

$cantidadRecursosTipo = Recurso::getCountByType($year);
$cantidadVisitasArchivos = Archivo::getAllVisits();
?>

<div>
    <div>
        Por este medio se presenta el reporte general, con los siguientes datos:
    </div>
    <div style="margin-top: 20px;">
        <caption style="font-size: 17px;">
            <strong>
                Cantidad de repositorios por tipo
            </strong>
        </caption>
        <table border="1" style="width: 100%;" cellpadding="5px">
            <tr>
                <th>
                    Tipo de repositorios
                </th>
                <th>
                    Cantidad de repositorios
                </th>
            </tr>
            <?php foreach ($cantidadRecursosTipo as $cantidadTipo) { ?>
                <tr>
                    <td> <?= $cantidadTipo->tipo ?> </td>
                    <td> <?= $cantidadTipo->cantidad ?> </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div style="margin-top: 20px;">
        <caption style="font-size: 17px;">
            <strong>
                Total de visitas a repositorios
            </strong>
        </caption>
        <table border="1" style="width: 100%;" cellpadding="5px">
                <tr>
                    <td> Visitas </td>
                    <td> <?= $cantidadVisitasArchivos ?> </td>
                </tr>
        </table>
    </div>
</div>