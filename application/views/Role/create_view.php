<form class="form-horizontal" action="/Role/New" method="post">
    <input type="hidden" name="id" value="<?=$data->id?>">
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Пользователь</label>
        <div class="col-sm-10">
            <select  class="form-control"  name="userName">
                <?php
                for($i=0;$i<count($data->users);$i++)
                {
                    echo '<option>' . $data->users[$i]->user_name . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Роль</label>
        <div class="col-sm-10">
            <select  class="form-control"  name="roleName">
                <?php
                for($i=0;$i<count($data->roles);$i++)
                {
                    echo '<option>' . $data->roles[$i]->role_name . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Создать</button>
        </div>
    </div>
</form>