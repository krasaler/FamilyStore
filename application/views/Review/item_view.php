<table class="table table-bordered">
    <tr>
        <th>Имя пользователь</th>
        <th>Название товара</th>
        <th>Коментрий</th>
        <th>Операции</th>
    </tr>
    <?php
    foreach($data as $value)
    {
        ?>
        <tr>
            <td width=150><?php echo $value->account->name; ?></td>
            <td width=300><?php echo $value->product->name; ?></td>
            <td><?php echo $value->value; ?></td>
            <td width=100>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button  type="button" class="btn btn-default" onclick="window.location.href
                            ='/Review/remove?id=<?php echo $value->id; ?>'"
                        >Удалить</button>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>