<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group" role="group" aria-label="...">
        <button  type="button" class="btn btn-default"  onclick="window.location.href
            ='/Role/Create'"
        >Добавить роль</button>
    </div>
</div>
<table class="table table-bordered">
    <tr>
        <th>Имя пользователь</th>
        <th>Роль</th>
        <th>Операции</th>
    </tr>
    <?php
    foreach($data as $value)
    {
        ?>
        <tr>
            <td width=150><?php echo $value->account->user_name; ?></td>
            <td width=300><?php echo $value->role->role_name; ?></td>
            <td width=50>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <div class="btn-group" role="group" aria-label="...">
                        <button  type="button" class="btn btn-default" onclick="window.location.href
                            ='/Role/edit?id=<?php echo $value->id; ?>'"
                        >Изменить</button>
                        <button  type="button" class="btn btn-default" onclick="window.location.href
                            ='/Role/remove?id=<?php echo $value->id; ?>'"
                        >Удалить</button>
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>