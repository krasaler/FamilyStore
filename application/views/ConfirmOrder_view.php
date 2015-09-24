<h2 class="h2">Потверждение заказа</h2>
<table class="table">
    <tr>
        <th>Код товара</th>
        <th>Название</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Сумма</th>
    </tr>
    <?php
    for ($i = 0; $i < $data->getCount(); $i++) {
        ?>
        <tr >
            <?php
            echo '<td>' . $data->products[$i]->Id . '</td>';
            echo '<td>' . $data->products[$i]->name . '</td>';
            echo '<td>' . $data->counts[$i] . '</td>';
            echo '<td>' . $data->products[$i]->price . ' грн.</td>';
            echo '<td>' . ($data->products[$i]->price * $data->counts[$i]) . ' грн.</td>';
            ?>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="3"></td>
        <td>Всего</td>
        <td><?php echo $data->SumPrice(); ?> грн.</td>
    </tr>
    <tr>
        <td>Аддрес доставки</td>
        <td colspan="4"><?php echo $data->address; ?></td>
    </tr>
    <tr>
        <td colspan="5" class="text-right">
            <button class="btn btn-default" onclick="newOrder()">Подтвердить заказ</button>
        </td>
    </tr>
</table>
