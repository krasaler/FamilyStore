<table class="table table-bordered">
    <tr>
        <th>Номер заказа</th>
        <th>Дата заказа</th>
        <th>Место получения</th>
        <th>Сумма заказа</th>
        <th>Статус</th>
        <th>Операции</th>
    </tr>
    <?php
    foreach ($data as $value) {
        ?>
        <tr>
            <td><?= $value->id ?></td>
            <td><?= $value->date_order ?></td>
            <td><?= $value->branch_name ?></td>
            <td><?= $value->getSumm() ?> грн.</td>
            <td><?= $status_name ?></td>
            <td width="300">
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Order/detail?id=<?= $value->id ?>'"
                        >Подробнее
                        </button>
                        <?php
                        if ($value->v != "Отменен" && $value->status_name != "Получен") { ?>
                            <button type="button" class="btn btn-default" onclick="window.location.href
                                ='/Order/cancel?id=<?= $value->id ?>'"
                            >Отменить
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>