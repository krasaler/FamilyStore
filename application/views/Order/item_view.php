<table class="table table-bordered">
    <tr>
        <th>Номер заказа</th>
        <th>Имя ползователя</th>
        <th>Дата заказа</th>
        <th>Место получения</th>
        <th>Сумма заказа</th>
        <?php
        if ($_GET['id'] != 5 && $_GET['id'] != 2) { ?>
        <th>Операции</th>
        <?php } ?>
    </tr>
    <?php
    for($i=0;$i<count($data);$i++){
    $value = $data[$i];
        ?>
        <tr>
            <td><?= $value->id ?></td>
            <td><?= $value->account_name ?></td>
            <td><?= $value->date_order ?></td>
            <td><?= $value->branch_name ?></td>
            <td><?= $value->getSumm() ?> грн.</td>
            <?php
            if ($value->status_name != "Отменен" && $value->status_name != "Получен") { ?>
            <td width="250">
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Order/detail?id=<?= $value->id ?>'"
                        >Подробнее
                        </button>

                            <button type="button" class="btn btn-default" onclick="window.location.href
                                ='/Order/EditStatus?id=<?= $value->id ?>'"
                            >Изменить статус
                            </button>

                    </div>
                </div>
            </td>
            <?php } ?>
        </tr>
        <?php
    }
    ?>
</table>