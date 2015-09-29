<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group" role="group" aria-label="...">

        <button type="button" class="btn btn-default" onclick="window.location.href
            ='/Attribute/CreateFloat'"
        >Добавить обычный атрибут</button>

        <button  type="button" class="btn btn-default" onclick="window.location.href
            ='/Attribute/CreateList'"
        >Добавить списочный атрибут</button>
    </div>
</div>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Група аттрибута</th>
        <th>Тип</th>
        <th>Ед. изм</th>
        <th>Статус</th>
        <th>Операции</th>
    </tr>
    <?php
        foreach($data as $value)
        {
    ?>
    <tr>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->attributeGroupName; ?></td>
        <td><?php echo $value->type; ?></td>
        <td><?php echo $value->unit; ?></td>
        <td><?php echo $value->status; ?></td>
        <td width=300>
            <div class="btn-toolbar" role="toolbar" aria-label="...">
                <div class="btn-group" role="group" aria-label="...">

                    <button type="button" class="btn btn-default" onclick="window.location.href
            ='/Attribute/EditFloat?name=<?php echo $value->name; ?>'"
                    >Изменить</button>

                    <button  type="button" class="btn btn-default" onclick="window.location.href
            ='/Attribute/CreateFloat'"
                    >Удалить</button>

                    <button  type="button" class="btn btn-default" onclick="window.location.href
            ='/Attribute/CreateFloat'"
                    >Подробнее</button>
                </div>
            </div>
        </td>
    </tr>
    <?php
    }
    ?>
</table>