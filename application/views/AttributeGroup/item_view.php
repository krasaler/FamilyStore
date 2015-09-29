<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group" role="group" aria-label="...">

        <button type="button" class="btn btn-default" onclick="window.location.href
            ='/AttributeGroup/Create'"
        >Добавить новую группу атрибутов</button>

    </div>
</div>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Количество аттрибутов</th>
        <th>Операции</th>
    </tr>
    <?php
    foreach($data as $value)
    {
        ?>
        <tr>
            <td><?php echo $value->name; ?></td>
            <td><?php echo count($value->attributes); ?></td>
            <td width=300>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/AttributeGroup/Edit?id=<?php echo $value->id; ?>'"
                        >Изменить</button>

                        <button  type="button" class="btn btn-default" onclick="window.location.href
            ='/AttributeGroup/Remove?id=<?php echo $value->id; ?>'"
                        >Удалить</button>

                        <button  type="button" class="btn btn-default" onclick="window.location.href
            ='/AttributeGroup/Detail?id=<?php echo $value->id; ?>'"
                        >Подробнее</button>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>