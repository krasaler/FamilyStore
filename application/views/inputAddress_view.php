<h2 class="h2">Оформление доставки</h2>
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
        <td colspan="5" class="text-right">
            <form class="form-horizontal">
                <div class="form-group">
                    <p class="col-sm-2"></p>
                    <p class="col-sm-10 text-left" id="error" style="color: red"></p>
                </div>
                <div class="form-group">
                    <label for="inputAddress" class="col-sm-2 control-label">Аддрес доставки</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputAddress" placeholder="Адрес доставки">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="ConfirmOrder(this)" class="btn btn-default">Продолжить</button>
                    </div>
                </div>
            </form>
        </td>
    </tr>
</table>
