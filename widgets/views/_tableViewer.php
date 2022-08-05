<table class="table table-hover">
    <?php foreach ($this->context->data as $item) { ?>
        <?php if ($item['hide']) continue; ?>
        <tr class="tr_item">
            <td class="td_header">
                <?= $item['header'] ?>
            </td>
            <td class="td_value">
                <?php if (is_array($item['values'])) { ?>
                    <?php if (count($item['values']) > 0) { ?>
                        <?php foreach ($item['values'] as $value) { ?>
                            <li class="list-group-item list-group-item-action">
                                <?= $value ?>
                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="list-group-item list-group-item-action">
                            Sin resultados
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <?= $item['values'] ?>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>