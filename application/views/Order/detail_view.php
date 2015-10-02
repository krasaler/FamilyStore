<h3>Номер заказа</h3>
<p><?=$data->id?></p>
<h3>Место получения</h3>
<p><?=$data->branch_name?></p>
<h3>Дата закза</h3>
<p><?=$data->date_order?></p>
<h3>Статус заказа</h3>
<p><?=$data->status_name?></p>

<table class="table table-bordered">
    <tr>
        <th>Номер товара</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Каталог</th>
        <th>Операции</th>
    </tr>
    <?php
    for($i=0;$i<count($data->products);$i++)
    {
        ?>
        <tr>
            <td><?= $data->products[$i]->Id ?></td>
            <td><?= $data->products[$i]->name ?></td>
            <td><?= $data->products[$i]->price ?></td>
            <td><?= $data->products[$i]->catalogueName ?></td>
            <td width="300">
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Product/detail?tovarId=<?=$data->products[$i]->Id ?>'"
                        >Подробнее
                        </button>
                        <?php
                        if ($value->status_id != "Отменен" && $value->status_id != "Получен") { ?>
                            <button type="button" class="btn btn-default" onclick="window.location.href
                                ='/Order/removeproduct?productId=<?=$data->products[$i]->Id ?>&orderId=<?=$data->id?>'"
                            >Убрать из заказа
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