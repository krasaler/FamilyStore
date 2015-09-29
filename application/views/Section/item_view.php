<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group" role="group" aria-label="...">
        <button  type="button" class="btn btn-default" onclick="CreateSection()"
        >Добавить раздел</button>
    </div>
</div>
<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Количество каталогов</th>
        <th>Операции</th>
    </tr>
    <?php
    foreach($data as $value)
    {
        ?>
        <tr>
            <td><?php echo $value->name; ?>
            <td width="200"><?php echo count($value->catalogues); ?></td>
            <td width="300">
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">

                        <button type="button" class="btn btn-default" onclick="window.location.href
                            ='/Section/edit?id=<?php echo $value->id; ?>'"
                        >Изменить</button>

                        <button  type="button" class="btn btn-default" onclick="window.location.href
                            ='/Section/remove?id=<?php echo $value->id; ?>'"
                        >Удалить</button>

                        <button  type="button" class="btn btn-default" onclick="window.location.href
                            ='/Section/detail?id=<?php echo $value->id; ?>'"
                        >Подробнее</button>

                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>