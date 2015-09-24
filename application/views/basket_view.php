<h2 class="h3">Ваша корзина</h2>
<table class="table">
    <tr>
        <th>Код товара</th>
        <th>Название</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Сумма</th>
        <th>Действие</th>
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
            <td width=150>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" class="btn btn-default"
                                onclick="addBasket(<?php echo $data->products[$i]->Id; ?>)">+</button>

                        <button  type="button" class="btn btn-default"
                                 onclick="minusBasket(<?php echo $data->products[$i]->Id; ?>)">-</button>

                        <button  type="button" class="btn btn-default"
                                 onclick="removeBasket(<?php echo $data->products[$i]->Id; ?>)">x</button>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="4"></td>
        <td>Всего</td>
        <td><?php echo $data->SumPrice(); ?> грн.</td>
    </tr>
    <tr>
        <td colspan="6" class="text-right">
            <button class="btn btn-default" onclick="Order()">Оформить заказ</button>
        </td>
    </tr>
</table>
