<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group" role="group" aria-label="...">

        <button type="button" class="btn btn-default" onclick="window.location.href
            ='/Attribute/CreateFloat'"
        >Добавить обычный атрибут</button>

        <button type="button" class="btn btn-default" onclick="window.location.href
            ='/Attribute/CreateList'"
        >Добавить атрибут со списком значений</button>
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
                    <?php if($value->type == "Обычный") { ?>
                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Attribute/EditFloat?id=<?php echo $value->id; ?>'"
                        >Изменить
                        </button>
                        <?php
                    }else{
                        ?>
                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Attribute/EditList?id=<?php echo $value->id; ?>'"
                        >Изменить
                        </button>
                        <?php
                    }?>

                    <button  type="button" class="btn btn-default" onclick="window.location.href
            ='/Attribute/Remove?id=<?php echo $value->id; ?>'"
                    >Удалить</button>
                    <?php if($value->type == "Обычный") { ?>
                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Attribute/DetailFloat?id=<?php echo $value->id; ?>'"
                        >Подробнее
                        </button>
                        <?php
                    }else{
                        ?>
                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Attribute/DetailList?id=<?php echo $value->id; ?>'"
                        >Подробнее
                        </button>
                        <?php
                    }?>
                </div>
            </div>
        </td>
    </tr>
    <?php
    }
    ?>
</table>