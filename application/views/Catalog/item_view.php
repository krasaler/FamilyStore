<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group" role="group" aria-label="...">

        <button type="button" class="btn btn-default" onclick="CreateCatalog()"
        >Добавить каталог</button>
    </div>
</div>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Раздел</th>
        <th>Количество товаров в каталоге</th>
        <th>Операции</th>
    </tr>
    <?php
    foreach($data as $value)
    {
        ?>
        <tr>
            <td><?php echo $value->name; ?></td>
            <td><?php echo $value->section; ?></td>
            <td><?php echo count($value->products); ?></td>
            <td width=300>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Catalog/edit?id=<?php echo $value->id; ?>'"
                                >Изменить</button>

                        <button  type="button" class="btn btn-default" onclick="window.location.href
                            ='/Catalog/remove?id=<?php echo $value->id; ?>'"
                                >Удалить</button>

                        <button  type="button" class="btn btn-default" onclick="window.location.href
                        ='/Catalog/detail?id=<?php echo $value->id; ?>'"
                                >Подробнее</button>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>