<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group" role="group" aria-label="...">
        <button  type="button" class="btn btn-default"
                 onclick="window.location.href='/Product/SelectCatalog'">Добавить Товар</button>
    </div>
</div>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Каталог</th>
        <th>Операции</th>
    </tr>
    <?php
    foreach($data as $value)
    {
        ?>
        <tr>
            <td><?php echo $value->name; ?>
            <td width="200"><?php echo $value->catalogueName; ?></td>
            <td width="300">
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/product/edit?id=<?php echo $value->Id; ?>'"
                        >Изменить</button>

                        <button  type="button" class="btn btn-default" onclick="window.location.href
                            ='/Product/remove?tovarId=<?php echo $value->Id; ?>'"
                        >Удалить</button>

                        <button  type="button" class="btn btn-default" onclick="window.location.href
                            ='/Product/detail?tovarId=<?php echo $value->Id; ?>'"
                        >Подробнее</button>

                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>